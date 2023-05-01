<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey    = 'id_transaksi';
    protected $allowedFields = ['gudang_id', 'stok_id', 'jumlah_stok', 'status', 'tgl'];

    public function getJoinTransaksi($id = null)
    {
        $db     = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('transaksi.*, gudang.nama_gudang, gudang.pemilik_gudang, stok.nama_barang');
        $builder->join('gudang', 'gudang.id_gudang = transaksi.gudang_id');
        $builder->join('stok', 'stok.id_stok = transaksi.stok_id');
        if ($id) {
            $builder->where('transaksi.gudang_id', $id);
        }
        $kueri = $builder->get();
        // dd($kueri);
        return $kueri->getResultArray();
    }
}
