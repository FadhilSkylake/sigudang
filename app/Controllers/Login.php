<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('login/index');
    }

    public function cekLogin()
    {
        $udin = $this->request->getPost('username');
        $password = MD5($this->request->getPost('password'));
        $mLogin = new UserModel();
        $user = $mLogin->getData($udin);

        if (empty($user)) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/');
        }
        if ($user['password'] != $password) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/');
        }
        session()->set('username', $user['username']);
        session()->set('id', $user['id']);
        // camat
        if ($user['role'] == 'Kepala Dinas') {
            session()->set('role', $user['role']);
            return redirect()->to('/dashboard');
            // admin camat
        } else if ($user['role'] == 'Kepala Bidang') {
            session()->set('role', $user['role']);
            return redirect()->to('/dashboard');
            // kepala desa
        } else if ($user['role'] == 'Admin Bidang') {
            session()->set('role', $user['role']);
            return redirect()->to('/dashboard');
            // admin desa
        } else if ($user['role'] == 'Pemilik Gudang') {
            $role = $mLogin->validasi($user['role'], $user['username']);
            session()->set('role', $user['role']);
            session()->set('id_gudang', $role['id_gudang']);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
