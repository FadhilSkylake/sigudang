<?php

namespace App\Controllers;

use App\Models\StokModel;
use App\Controllers\BaseController;

class StokController extends BaseController
{
    protected $stokModel;

    public function __construct()
    {
        $this->stokModel = new StokModel();
    }

    public function index()
    {
        if (session('id_gudang')) {
            $data = [
                'validation' => \Config\Services::validation(),
                'stok' => $this->stokModel->getJoinStok(session('id_gudang')),
                'id' => session('id_gudang')
            ];
            return view('stok/index', $data);
        } else {
            $data = [
                'validation' => \Config\Services::validation(),
                'stok' => $this->stokModel->getJoinStok()
            ];
            return view('stok/index', $data);
        }
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('stok/create', $data);
    }

    public function save()
    {
        $validated = $this->validate([
            'nama_barang' => 'required'

        ], [
            'nama_barang' => [
                'required' => '{field} nama_barang harus di isi.'
            ]
        ]);

        if (!$validated) {
            return redirect()->to("/stok/create/")->withInput();
        }

        // Save data in database
        $stokData = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'gudang_id' => session('id_gudang')
        ];
        $this->stokModel->save($stokData);


        session()->setFlashdata('pesan', 'Data Berhasil Disimpan.');
        return redirect()->to('/stok');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Barang',
            'validation' => \Config\Services::validation(),
            'stok' => $this->stokModel->find($id),
            'id' => $id,
        ];
        return view('stok/edit', $data);
    }

    public function update($id)
    {
        $validated = $this->validate([
            'nama_barang' => 'required'

        ], [
            'nama_barang' => [
                'required' => '{field} nama_barang harus di isi.'
            ]
        ]);

        if (!$validated) {
            return redirect()->to("/stok/update/$id")->withInput();
        }

        // Update data in database
        $stokData = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'gudang_id' => session('id_gudang')
        ];
        $this->stokModel->update($id, $stokData);


        session()->setFlashdata('pesan', 'Data Berhasil Disimpan.');
        return redirect()->to('/stok');
    }

    public function delete($id)
    {

        $this->stokModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/stok');
    }
}
