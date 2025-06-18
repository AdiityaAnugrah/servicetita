<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kendaraan extends Model
{
    protected $table            = 'kendaraan';
    protected $primaryKey       = 'id_kendaraan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'wo',
        'tgl_masuk',
        'nopol',
        'progres',
        'job_stop',
        'mobil',
        'warna',
        'asuransi',
        'est_keluar',
        'tanggal_keluar',
        'keterangan',
        'bengkel',
        'user_id',
        'create_at',
        'update_at'
    ];
    protected $useTimestamps = false; // aktifkan jika pakai created_at / updated_at


    public function getKendaraanWaitingRepair()
    {
        return $this->where('progres', 'WAITING REPAIR')->findAll();
    }


    public function getKendaraanBongkar()
    {
        return $this->where('progres', 'BONGKAR')->findAll();
    }



    public function getKendaraanDempul()
    {
        return $this->where('progres', 'DEMPUL')->findAll();
    }

    public function getKendaraanCat()
    {
        return $this->where('progres', 'CAT')->findAll();
    }

    public function getKendaraanPoles()
    {
        return $this->where('progres', 'POLES')->findAll();
    }

    public function getKendaraanQC()
    {
        return $this->where('progres', 'FINISHING')->findAll();
    }

    public function getKendaraanSiapKeluar()
    {
        return $this->where('progres', 'SIAP KELUAR')->findAll();
    }

    public function getKendaraanKeluar()
    {
        return $this->where('progres', 'KELUAR')->findAll();
    }
}
