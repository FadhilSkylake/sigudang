<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\StokModel;
use App\Controllers\BaseController;

class TransaksiController extends BaseController
{
    protected $transaksiModel;
    protected $stokModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->stokModel = new StokModel();
    }

    public function index()
    {
        if (session('id_gudang')) {
            $data = [
                'validation' => \Config\Services::validation(),
                'transaksi' => $this->transaksiModel->getJoinTransaksi(session('id_gudang')),
                'id' => session('id_gudang')
            ];
            // dd($data['transaksi']);
            return view('transaksi/index', $data);
        } else {
            $data = [
                'transaksi' => $this->transaksiModel->getJoinTransaksi()
            ];
            return view('transaksi/index', $data);
        }

        // $data = [
        //     'validation' => \Config\Services::validation(),
        //     'transaksi' => $this->transaksiModel->getJoinTransaksi()
        // ];
        // return view('transaksi/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'transaksi' => $this->stokModel->joinBarang(session('id_gudang'))
        ];

        return view('transaksi/create', $data);
    }

    public function save()
    {
        // $validated = $this->validate([
        //     'nama_barang' => 'required'

        // ], [
        //     'nama_barang' => [
        //         'required' => '{field} nama_barang harus di isi.'
        //     ]
        // ]);

        // if (!$validated) {
        //     return redirect()->to("/transaksi/create/")->withInput();
        // }

        $stokLama = $this->stokModel->find($this->request->getVar('stok_id'));
        // Save data in database

        if ($this->request->getVar('status') == 1) {
            $jumlah = $stokLama['jumlah'] + $this->request->getVar('jumlah_stok');
            $this->stokModel->update($stokLama['id_stok'], ['jumlah' => $jumlah]);
        } else if ($this->request->getVar('status') == 2) {
            if ($stokLama['jumlah'] < $this->request->getVar('jumlah_stok')) {
                return redirect()->to("/transaksi/create/")->with('pesan', 'Stok tidak cukup')->withInput();
            }
            $jumlah = $stokLama['jumlah'] - $this->request->getVar('jumlah_stok');
            $this->stokModel->update($stokLama['id_stok'], ['jumlah' => $jumlah]);
        }

        $transaksiData = [
            'stok_id' => $this->request->getVar('stok_id'),
            'jumlah_stok' => $this->request->getVar('jumlah_stok'),
            'status' => $this->request->getVar('status'),
            'tgl' => $this->request->getVar('tgl'),
            'gudang_id' => session('id_gudang')
        ];


        $this->transaksiModel->save($transaksiData);

        session()->setFlashdata('pesan', 'Data Berhasil Disimpan.');
        return redirect()->to('/transaksi');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Transaksi',
            'validation' => \Config\Services::validation(),
            'transaksi' => $this->transaksiModel->find($id),
            'stok' => $this->stokModel->joinBarang(session('id_gudang')),
            'id' => $id,
        ];
        // dd($data);
        return view('transaksi/edit', $data);
    }

    public function update($id)
    {
        // $validated = $this->validate([
        //     'nama_barang' => 'required'

        // ], [
        //     'nama_barang' => [
        //         'required' => '{field} nama_barang harus di isi.'
        //     ]
        // ]);

        // if (!$validated) {
        //     return redirect()->to("/transaksi/update/$id")->withInput();
        // }
        $updateJumlah = $this->transaksiModel->find($id);

        if ($this->request->getVar('status') == 1) {
            $stokLama = $this->stokModel->find($this->request->getVar('stok_id'));
            $jumlah = ($stokLama['jumlah'] - $updateJumlah['jumlah_stok']) + $this->request->getVar('jumlah_stok');
        } else if ($this->request->getVar('status') == 2) {
            $stokLama = $this->stokModel->find($this->request->getVar('stok_id'));
            $jumlah = ($stokLama['jumlah'] + $updateJumlah['jumlah_stok']) - $this->request->getVar('jumlah_stok');
        }

        $this->stokModel->update($stokLama['id_stok'], ['jumlah' => $jumlah]);
        // Update data in database
        $transaksiData = [
            'stok_id' => $this->request->getVar('stok_id'),
            'jumlah_stok' => $this->request->getVar('jumlah_stok'),
            'status' => $this->request->getVar('status'),
            'tgl' => $this->request->getVar('tgl'),
            'gudang_id' => session('id_gudang')
        ];
        $this->transaksiModel->update($id, $transaksiData);


        session()->setFlashdata('pesan', 'Data Berhasil Disimpan.');
        return redirect()->to('/transaksi');
    }

    public function delete($id)
    {
        $deleteJumlah = $this->transaksiModel->find($id);

        if ($deleteJumlah['status'] == 'BERTAMBAH') {
            $stokLama = $this->stokModel->find($deleteJumlah['stok_id']);
            $jumlah = ($stokLama['jumlah'] - $deleteJumlah['jumlah_stok']) + $this->request->getVar('jumlah_stok');
        } else if ($deleteJumlah['status'] == 'BERKURANG') {
            $stokLama = $this->stokModel->find($deleteJumlah['stok_id']);
            $jumlah = ($stokLama['jumlah'] + $deleteJumlah['jumlah_stok']) - $this->request->getVar('jumlah_stok');
        }

        $this->stokModel->update($stokLama['id_stok'], ['jumlah' => $jumlah]);
        // Update data in database
        $this->transaksiModel->delete($id);


        session()->setFlashdata('pesan', 'Data Berhasil Disimpan.');
        return redirect()->to('/transaksi');
    }
}
