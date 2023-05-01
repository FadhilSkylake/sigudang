<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\GudangModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    protected $userModel;
    protected $gudangModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->gudangModel = new GudangModel();
        if (session()->has('role') && (session('role') === 'Pemilik Gudang' || session('role') === 'Kepala Bidang' || session('role') === 'Kepala Dinas')) {
            return redirect()->back();
        }
    }

    public function index()
    {
        $data = [
            'user' => $this->userModel->findAll()
        ];

        return view('user/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        if (session()->has('role') && (session('role') === 'Pemilik Gudang' || session('role') === 'Kepala Bidang' || session('role') === 'Kepala Dinas')) {
            return redirect()->back();
        }

        return view('user/create', $data);
    }

    public function save()
    {
        $validated = $this->validate([
            'email' => 'required',
            'username' => 'required',
        ], [
            'username' => [
                'required' => '{field} username harus di isi.'
            ],
        ]);

        if (!$validated) {
            return redirect()->to("/user/create/")->withInput();
        }

        // Save data in database
        $userData = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => MD5($this->request->getPost('password')),
            'role' => $this->request->getPost('role'),
        ];
        // dd($userData['role']);
        $this->userModel->save($userData);

        if ($userData['role'] == '4') {
            $id_user = $this->userModel->select('id')->orderBy('id', 'DESC')->limit(1)->get()->getRow();
            $gudangData = [
                'user_id' => $id_user->id
            ];
            $this->gudangModel->save($gudangData);
        }


        // Set flash data and redirect
        session()->setFlashdata('pesan', 'Data Berhasil Disave.');
        return redirect()->to('/user');
    }
    public function update($id)
    {
        $validated = $this->validate([
            'email' => 'required',
            'username' => 'required',
        ], [
            'username' => [
                'required' => '{field} username harus di isi.'
            ],
        ]);

        if (!$validated) {
            return redirect()->to("/user/edit/$id")->withInput();
        }

        // Update data in database
        $userData = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => MD5($this->request->getVar('password'))
        ];
        $this->userModel->update($id, $userData);

        // $userData = [
        //     'email' => $this->request->getVar('email'),
        //     'username' => $this->request->getVar('username'),
        //     'password' => MD5($this->request->getVar('password')),
        // ];
        // $this->userModel->where('id', $id)->update($userData);

        // Set flash data and redirect
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate.');
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data user',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->find($id),
            'id' => $id,
        ];
        if (session()->has('role') && (session('role') === 'Pemilik Gudang' || session('role') === 'Kepala Bidang' || session('role') === 'Kepala Dinas')) {
            return redirect()->back();
        }
        return view('user/edit', $data);
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        if (session()->has('role') && (session('role') === 'Pemilik Gudang' || session('role') === 'Kepala Bidang' || session('role') === 'Kepala Dinas')) {
            return redirect()->back();
        }
        return redirect()->to('/user');
    }
}
