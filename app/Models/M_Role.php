<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Role extends Model
{
    protected $table            = 'role';
    protected $primaryKey       = 'id_role';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'label',
        'fitur'
    ];

    protected $useTimestamps = false;
}
