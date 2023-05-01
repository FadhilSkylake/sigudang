<?php

namespace App\Controllers;

use App\Models\GudangModel;
use App\Controllers\BaseController;

class GudangController extends BaseController
{
    protected $gudangModel;

    public function __construct()
    {
        $this->gudangModel = new GudangModel();
    }

    public function index()
    {
        if (session('id_gudang')) {
            $data = [
                'validation' => \Config\Services::validation(),
                'gudang' => $this->gudangModel->find(session('id_gudang')),
                'id' => session('id_gudang')
            ];
            return view('gudang/detail', $data);
        } else {
            $data = [
                'gudang' => $this->gudangModel->find()
            ];
            return view('gudang/index', $data);
        }
    }


    public function detail($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'gudang' => $this->gudangModel->find($id),
            'id' => $id
        ];

        //jika data enggak ada
        if (empty($data['gudang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('gudang'   . $id .  ' tidak ditemukan.');
        }
        // dd($data);
        return view('gudang/detail', $data);
    }

    public function update($id)
    {
        $validated = $this->validate([
            'nama_gudang' => 'required',
            'alamat_gudang' => 'required',
            'luas_gudang' => 'required'
        ], [
            'alamat_gudang' => [
                'required' => '{field} alamat_gudang harus di isi.'
            ],
            'luas_gudang' => [
                'required' => '{field} luas_gudang harus di isi.'
            ]
        ]);

        if (!$validated) {
            return redirect()->to("/gudang/detail/$id")->withInput();
        }

        // Save data in database
        $gudangData = [
            'nama_gudang' => $this->request->getVar('nama_gudang'),
            'alamat_gudang' => $this->request->getVar('alamat_gudang'),
            'luas_gudang' => $this->request->getVar('luas_gudang'),
            'no_gudang' => $this->request->getVar('no_gudang'),
            'tgl_terdaftar' => $this->request->getVar('tgl_terdaftar'),
            'jumlah' => $this->request->getVar('jumlah'),
            'jenis_barang' => $this->request->getVar('jenis_barang'),
            'pemilik_gudang' => $this->request->getVar('pemilik_gudang'),
        ];
        $this->gudangModel->update($id, $gudangData);

        // $gudangData = [
        //     'nama_gudang' => $this->request->getVar('nama_gudang'),
        //     'alamat_gudang' => $this->request->getVar('alamat_gudang'),
        //     'password' => MD5($this->request->getVar('password')),
        // ];
        // $this->gudangModel->where('id', $id)->save($gudangData);

        // Set flash data and redirect
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan.');
        return redirect()->to('/gudang');
    }

    public function delete($id)
    {
        $this->gudangModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/gudang');
    }
}
