<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['email', 'username', 'password', 'role'];

    public function getData($username)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('user.username', $username);
        return $builder->get()->getRowArray();
    }

    public function validasi($role, $username)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($role == 'Pemilik Gudang') {
            $builder->join('gudang', 'gudang.user_id = user.id');
        }
        $builder->where('user.username', $username);
        return $builder->get()->getRowArray();
    }
}
