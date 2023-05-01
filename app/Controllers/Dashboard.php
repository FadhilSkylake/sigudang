<?php

namespace App\Controllers;

use App\Models\GudangModel;
use App\Models\StokModel;

class Dashboard extends BaseController
{
    protected $gudangModel;
    protected $stokModel;

    public function __construct()
    {
        $this->gudangModel = new GudangModel();
        $this->stokModel = new StokModel();
    }
    public function index()
    {
        if (session('id_gudang')) {
            $data = [
                'validation' => \Config\Services::validation(),
                'stok_count' => $this->stokModel->where('gudang_id', session('id_gudang'))->countAllResults(),
                'stok_data' => $this->stokModel->getJoinStok(session('id_gudang')),
                'id' => session('id_gudang')
            ];
            return view('dashboard/index', $data);
        } else {
            $data = [
                'gudang' => $this->gudangModel->countAllResults()
            ];
            return view('dashboard/index', $data);
        }
    }
}
