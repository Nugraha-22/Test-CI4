<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MUsers;
use App\Models\Role;

class Users extends BaseController
{

    protected $users;
    protected $role;

    public function __construct()
    {
        $this->users = new MUsers();
        $this->role = new Role();
    }

    public function Tambah()
    {
        $data = [
            'title' => "Tambah",
            'role' => $this->role->findAll()
        ];

        return view('Tambah', $data);
    }

    public function TambahData()
    {
        $users_name = $this->request->getPost('users_name');
        $users_password = password_hash($this->request->getVar('users_password'), PASSWORD_DEFAULT);
        $users_role = $this->request->getPost('users_role');

        $this->users->insert([
            'users_name' => $users_name,
            'users_password' => $users_password,
            'users_role' => $users_role,
        ]);

        return redirect()->to(base_url('Home'));
    }

    public function Update($users_id)
    {
        $query = $this->users->find($users_id);

        $data = [
            'title' => "Update",
            'users_id' => $users_id,
            'users_name' => $query['users_name'],
            'users_password' => $query['users_password'],
            'users_role' => $query['users_role'],
            'role' => $this->role->findAll(),
        ];

        return view('Update', $data);
    }

    public function UpdateData()
    {
        $users_id = $this->request->getPost('users_id');
        $users_name = $this->request->getPost('users_name');
        $users_password = password_hash($this->request->getVar('users_password'), PASSWORD_DEFAULT);
        $users_role = $this->request->getPost('users_role');

        $this->users->update($users_id, [
            'users_name' => $users_name,
            'users_password' => $users_password,
            'users_role' => $users_role,
        ]);

        return redirect()->to(base_url('Home'));
    }

    public function Hapus($users_id)
    {
        $this->users->delete($users_id);

        return redirect()->to('Home');
    }
}
