<?php

namespace App\Controllers;

use App\Models\M_Kendaraan;
use App\Models\M_Log;

class Home extends BaseController
{
    public function index()
    {
        $kendaraanModel = new M_Kendaraan();
        $logModel = new M_Log();

        $kendaraans = $kendaraanModel->findAll();
        $logs = $logModel->findAll();
        $logMap = [];
        foreach ($logs as $log) {
            $key = strtoupper($log['nopol']);
            $step = strtoupper($log['progres']);
            $logMap[$key][$step] = $log['update_at'];
        }

        $data = [
            'title' => 'Dashboard',
            'subtitle' => 'Selamat Datang di Aplikasi Bengkel',
            'description' => 'Pantau progres kendaraan secara real-time.',
            'kendaraans' => $kendaraans,
            'logMap' => $logMap
        ];

        return view('home/index', $data);
    }
}