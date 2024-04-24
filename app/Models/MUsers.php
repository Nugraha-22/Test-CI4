<?php

namespace App\Models;

use CodeIgniter\Model;

class MUsers extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'users_id';
    protected $allowedFields    = [
        'users_name',
        'users_password',
        'users_role'
    ];
}
