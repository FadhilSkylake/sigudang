<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey    = 'id_laporan';
    protected $allowedFields = ['gudang_id', 'stok_id', 'transaksi_id'];

    function getJoinAll()
    {
        $db     = \Config\Database::connect();
        $builder = $db->table('laporan');
        $builder->select('laporan.*, gudang.nama_gudang, gudang.pemilik_gudang, stok.nama_barang, transaksi.status');
        $builder->join('gudang', 'gudang.id_gudang = laporan.gudang_id');
        $builder->join('stok', 'stok.id_stok = laporan.stok_id');
        $builder->join('transaksi', 'transaksi.id_transaksi = laporan.transaksi_id');
        // if ($id) {
        //     $builder->where('gudang_id', $id);
        // }
        $kueri = $builder->get();
        // dd($kueri);
        return $kueri->getResultArray();
    }
}
