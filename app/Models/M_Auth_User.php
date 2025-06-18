<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth_User extends Model
{
    protected $table            = 'auth_user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'username',
        'password',
        'nama_user',
        'email',
        'status',
        'role',
        'foto'
    ];

    protected $useTimestamps = false; // aktifkan jika ada kolom waktu (created_at, updated_at)
}
