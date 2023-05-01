<?php

namespace App\Models;

use CodeIgniter\Model;

class GudangModel extends Model
{
    protected $table = 'gudang';
    protected $primaryKey    = 'id_gudang';
    protected $allowedFields = ['nama_gudang', 'alamat_gudang', 'luas_gudang', 'no_gudang', 'tgl_terdaftar', 'jumlah', 'jenis_barang', 'pemilik_gudang', 'user_id'];
}
