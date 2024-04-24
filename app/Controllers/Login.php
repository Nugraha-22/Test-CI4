<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MUsers;

class Login extends BaseController
{

    protected $users;

    public function __construct()
    {
        $this->users = new MUsers();
    }

    public function index()
    {
        $data = [
            'title' => "Login"
        ];
        return view('Login', $data);
    }

    public function Auth()
    {
        $users_name = $this->request->getPost('users_name');
        $users_password = $this->request->getPost('users_password');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'users_name' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'users_password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        if (!$valid) {
            $sessError = [
                'error_users_name' => $validation->getError('users_name'),
                'error_users_password' => $validation->getError('users_password'),
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(site_url('Login'));
        } else {
            $M_Users = new MUsers();

            $checkUsersLogin = $M_Users->where('users_name', $users_name)->first();

            if ($checkUsersLogin == null) {
                $sessError = [
                    'error_users_name' => 'Maaf, Email Salah'
                ];

                session()->setFlashdata($sessError);
                return redirect()->to(site_url('Login'));
            } else {
                $password_users = $checkUsersLogin['users_password'];

                if (password_verify($users_password, $password_users)) {
                    $saveSession = [
                        'users_name' => $users_name,
                        'users_password' => $checkUsersLogin['users_password'],
                        'users_role' => $checkUsersLogin['users_role'],
                    ];

                    session()->set($saveSession);
                    return redirect()->to(site_url('Home'));
                } else {
                    $sessError = [
                        'error_users_password' => 'Maaf, password salah'
                    ];
                    session()->setFlashdata($sessError);
                    return redirect()->to(site_url('Login'));
                }
            }
        }
    }



    public function Logout()
    {
        session()->destroy();
        return redirect()->to(site_url('Login'));
    }
}
