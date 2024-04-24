<?php

namespace App\Controllers;

use App\Models\MUsers;

class Home extends BaseController
{

    protected $users;

    public function __construct()
    {
        $this->users = new MUsers();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT `users_id`, `users_name`, `users_password`, `role_nama` FROM `users`
                            JOIN `role` ON `users_role` = `role_id`")->getResultArray();
        $data = [
            'title' => "Home",
            'users' => $query
        ];
        return view('index', $data);
    }
}
