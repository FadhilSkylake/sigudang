<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table = 'stok';
    protected $primaryKey    = 'id_stok';
    protected $allowedFields = ['gudang_id', 'nama_barang', 'jumlah'];

    function getJoinStok($id = null)
    {
        $db     = \Config\Database::connect();
        $builder = $db->table('stok');
        $builder->select('stok.*, gudang.nama_gudang, gudang.pemilik_gudang');
        $builder->join('gudang', 'gudang.id_gudang = stok.gudang_id');
        if ($id) {
            $builder->where('gudang_id', $id);
        }
        $kueri = $builder->get();
        return $kueri->getResultArray();
    }

    public function joinBarang($gudang_id)
    {
        $db     = \Config\Database::connect();
        $builder = $db->table('stok');
        $builder->select('stok.*');
        $builder->where('stok.gudang_id', $gudang_id);
        $kueri = $builder->get();
        return $kueri->getResultArray();
    }
}
