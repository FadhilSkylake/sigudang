<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\LaporanModel;
use App\Controllers\BaseController;
use App\Models\GudangModel;
use App\Models\StokModel;
use Dompdf\Dompdf;

class LaporanController extends BaseController
{
    protected $laporanModel;
    protected $transaksiModel;
    protected $gudangModel;
    protected $stokModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
        $this->transaksiModel = new TransaksiModel();
        $this->gudangModel = new GudangModel();
        $this->stokModel = new StokModel();
    }
    public function index()
    {
        if (session('id_gudang')) {
            $gudang = $this->gudangModel->find(session('id_gudang'));
            $data = [
                'validation' => \Config\Services::validation(),
                'laporan' => $gudang,
                'transaksi' => $this->transaksiModel->getJoinTransaksi(session('id_gudang')),
                'id' => session('id_gudang')
            ];
            // dd($data);
            return view('laporan/detail', $data);
        } else {
            $data = [
                'laporan' => $this->gudangModel->find()
            ];
            return view('laporan/index', $data);
        }

        // $data = [
        //     'validation' => \Config\Services::validation(),
        //     'laporan' => $this->gudangModel->findAll()
        // ];
        // // dd('$data');
        // return view('laporan/index', $data);
    }

    public function detail($id)
    {
        $gudang = $this->gudangModel->find($id);

        $data = [
            'validation' => \Config\Services::validation(),
            'laporan' => $gudang,
            'stok' => $this->stokModel->joinBarang($gudang['id_gudang']),
            'transaksi' => $this->transaksiModel->getJoinTransaksi($gudang['id_gudang'])
        ];

        //jika data enggak ada
        // if (empty($data['gudang'])) {
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException('gudang'   . $id .  ' tidak ditemukan.');
        // }
        // dd($data);
        return view('laporan/detail', $data);
    }
    public function cetak($id)
    {
        $gudang = $this->gudangModel->find($id);

        $data = [
            'validation' => \Config\Services::validation(),
            'laporan' => $gudang,
            'stok' => $this->stokModel->joinBarang($gudang['id_gudang']),
            'transaksi' => $this->transaksiModel->getJoinTransaksi($gudang['id_gudang'])
        ];

        $filename = date('y-m-d-H-i-s') . 'Laporan Gudang' . $gudang['nama_gudang'];

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('laporan/cetak', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
