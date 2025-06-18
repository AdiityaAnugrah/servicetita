<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Log extends Model
{
    protected $table            = 'log';
    protected $primaryKey       = 'id_log';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'wo',
        'progres',
        'job_stop',
        'nopol',
        'mobil',
        'warna',
        'action',
        'keterangan',
        'user_id',
        'create_at',
        'update_at'
    ];

    protected $useTimestamps = false;
}
