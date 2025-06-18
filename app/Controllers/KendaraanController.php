<?php

namespace App\Controllers;

use App\Models\M_Kendaraan;
use App\Models\M_Log;

class KendaraanController extends BaseController
{

    public function antri()
    {
        $kendaraanModel = new M_Kendaraan();

        $data = [
            'kendaraan' => $kendaraanModel->getKendaraanWaitingRepair()
        ];

        return view('proses/view_antri', $data);
    }

    public function create_antri()
    {

        $kendaraanModel = new M_Kendaraan();
        $data = [
            'wo' => $this->request->getPost('wo'),
            'nopol' => $this->request->getPost('nopol'),
            'progres' => $this->request->getPost('progres'),
            'mobil' => $this->request->getPost('mobil'),
            'tgl_masuk' => $this->request->getPost('tgl_masuk'),
            'est_keluar' => $this->request->getPost('est_keluar'),
            'warna' => $this->request->getPost('warna'),
            'asuransi' => $this->request->getPost('asuransi'),
            'bengkel' => $this->request->getPost('bengkel'),
            'keterangan' => $this->request->getPost('keterangan'),

        ];

        // Insert data into the database
        $kendaraanModel->insert($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }


    public function bongkar()
    {
        $kendaraanModel = new M_Kendaraan();

        $data = [
            'title' => 'Bongkar',
            'kendaraan' => $kendaraanModel->getKendaraanBongkar()
        ];

        return view('proses/view_bongkar', $data);
    }


    public function mulaiBongkar($id_kendaraan = null)
    {
        if ($id_kendaraan === null) {
            return redirect()->back()->with('error', 'ID kendaraan tidak ditemukan.');
        }

        $kendaraanModel = new M_Kendaraan();
        $logModel = new M_Log();

        // Ambil data kendaraan
        $kendaraan = $kendaraanModel->find($id_kendaraan);
        if (!$kendaraan) {
            return redirect()->back()->with('error', 'Data kendaraan tidak ditemukan.');
        }

        // Update kolom progres menjadi BONGKAR
        $kendaraanModel->update($id_kendaraan, ['progres' => 'BONGKAR']);

        // Simpan log manual
        $now = date('Y-m-d H:i:s');
        $dataLog = [
            'wo'        => $kendaraan['wo'],
            'nopol'     => $kendaraan['nopol'],
            'mobil'     => $kendaraan['mobil'], // sesuaikan field
            'warna'     => $kendaraan['warna'],
            'progres'   => 'BONGKAR',
            'action'    => 'Unit mobil sedang dalam proses bongkar',
            'create_at' => $now,
            'update_at' => $now,
        ];

        $logModel->insert($dataLog);

        return redirect()->back()->with('success', 'Proses bongkar dimulai dan log dicatat.');
    }









    public function dempul()
    {
        $kendaraanModel = new M_Kendaraan();

        $data = [
            'title' => 'dempul',
            'kendaraan' => $kendaraanModel->getKendaraanDempul()
        ];

        return view('proses/view_dempul', $data);
    }


    public function mulaiDempul($id_kendaraan = null)
    {
        if ($id_kendaraan === null) {
            return redirect()->back()->with('error', 'ID kendaraan tidak ditemukan.');
        }

        $kendaraanModel = new M_Kendaraan();
        $logModel = new M_Log();

        // Ambil data kendaraan
        $kendaraan = $kendaraanModel->find($id_kendaraan);
        if (!$kendaraan) {
            return redirect()->back()->with('error', 'Data kendaraan tidak ditemukan.');
        }

        // Update kolom progres menjadi BONGKAR
        $kendaraanModel->update($id_kendaraan, ['progres' => 'DEMPUL']);

        // Simpan log manual
        $now = date('Y-m-d H:i:s');
        $dataLog = [
            'wo'        => $kendaraan['wo'],
            'nopol'     => $kendaraan['nopol'],
            'mobil'     => $kendaraan['mobil'], // sesuaikan field
            'warna'     => $kendaraan['warna'],
            'progres'   => 'DEMPUL',
            'action'    => 'Unit mobil sedang dalam proses dempul',
            'create_at' => $now,
            'update_at' => $now,
        ];

        $logModel->insert($dataLog);

        return redirect()->back()->with('success', 'Proses dempul dimulai dan log dicatat.');
    }

    public function cat()
    {
        $kendaraanModel = new M_Kendaraan();

        $data = [
            'title' => 'Cat',
            'kendaraan' => $kendaraanModel->getKendaraanCat()
        ];

        return view('proses/view_cat', $data);
    }

    public function mulaiCat($id_kendaraan = null)
    {
        if ($id_kendaraan === null) {
            return redirect()->back()->with('error', 'ID kendaraan tidak ditemukan.');
        }

        $kendaraanModel = new M_Kendaraan();
        $logModel = new M_Log();

        // Ambil data kendaraan
        $kendaraan = $kendaraanModel->find($id_kendaraan);
        if (!$kendaraan) {
            return redirect()->back()->with('error', 'Data kendaraan tidak ditemukan.');
        }

        // Update kolom progres menjadi BONGKAR
        $kendaraanModel->update($id_kendaraan, ['progres' => 'CAT']);

        // Simpan log manual
        $now = date('Y-m-d H:i:s');
        $dataLog = [
            'wo'        => $kendaraan['wo'],
            'nopol'     => $kendaraan['nopol'],
            'mobil'     => $kendaraan['mobil'], // sesuaikan field
            'warna'     => $kendaraan['warna'],
            'progres'   => 'CAT',
            'action'    => 'Unit mobil sedang dalam proses cat',
            'create_at' => $now,
            'update_at' => $now,
        ];

        $logModel->insert($dataLog);

        return redirect()->back()->with('success', 'Proses cat dimulai dan log dicatat.');
    }


    public function poles()
    {
        $kendaraanModel = new M_Kendaraan();

        $data = [
            'title' => 'Poles',
            'kendaraan' => $kendaraanModel->getKendaraanPoles()
        ];

        return view('proses/view_poles', $data);
    }

    public function mulaiPoles($id_kendaraan = null)
    {
        if ($id_kendaraan === null) {
            return redirect()->back()->with('error', 'ID kendaraan tidak ditemukan.');
        }

        $kendaraanModel = new M_Kendaraan();
        $logModel = new M_Log();

        // Ambil data kendaraan
        $kendaraan = $kendaraanModel->find($id_kendaraan);
        if (!$kendaraan) {
            return redirect()->back()->with('error', 'Data kendaraan tidak ditemukan.');
        }

        // Update kolom progres menjadi BONGKAR
        $kendaraanModel->update($id_kendaraan, ['progres' => 'POLES']);

        // Simpan log manual
        $now = date('Y-m-d H:i:s');
        $dataLog = [
            'wo'        => $kendaraan['wo'],
            'nopol'     => $kendaraan['nopol'],
            'mobil'     => $kendaraan['mobil'], // sesuaikan field
            'warna'     => $kendaraan['warna'],
            'progres'   => 'POLES',
            'action'    => 'Unit mobil sedang dalam proses poles',
            'create_at' => $now,
            'update_at' => $now,
        ];

        $logModel->insert($dataLog);

        return redirect()->back()->with('success', 'Proses poles dimulai dan log dicatat.');
    }

    public function finish()
    {
        $kendaraanModel = new M_Kendaraan();

        $data = [
            'title' => 'Finising',
            'kendaraan' => $kendaraanModel->getKendaraanQC()
        ];

        return view('proses/view_finish', $data);
    }

    public function mulaiFinish($id_kendaraan = null)
    {
        if ($id_kendaraan === null) {
            return redirect()->back()->with('error', 'ID kendaraan tidak ditemukan.');
        }

        $kendaraanModel = new M_Kendaraan();
        $logModel = new M_Log();

        // Ambil data kendaraan
        $kendaraan = $kendaraanModel->find($id_kendaraan);
        if (!$kendaraan) {
            return redirect()->back()->with('error', 'Data kendaraan tidak ditemukan.');
        }

        // Update kolom progres menjadi BONGKAR
        $kendaraanModel->update($id_kendaraan, ['progres' => 'FINISHING']);

        // Simpan log manual
        $now = date('Y-m-d H:i:s');
        $dataLog = [
            'wo'        => $kendaraan['wo'],
            'nopol'     => $kendaraan['nopol'],
            'mobil'     => $kendaraan['mobil'], // sesuaikan field
            'warna'     => $kendaraan['warna'],
            'progres'   => 'FINISHING',
            'action'    => 'Unit mobil sedang dalam proses Finishing',
            'create_at' => $now,
            'update_at' => $now,
        ];

        $logModel->insert($dataLog);

        return redirect()->back()->with('success', 'Proses Finishing dan log dicatat.');
    }

    public function SiapKeluar()
    {
        $kendaraanModel = new M_Kendaraan();

        $data = [
            'title' => 'SIAP KELUAR',
            'kendaraan' => $kendaraanModel->getKendaraanSiapKeluar()
        ];

        return view('proses/view_siapkeluar', $data);
    }

    public function mulaiSiapKeluar($id_kendaraan = null)
    {
        if ($id_kendaraan === null) {
            return redirect()->back()->with('error', 'ID kendaraan tidak ditemukan.');
        }

        $kendaraanModel = new M_Kendaraan();
        $logModel = new M_Log();

        // Ambil data kendaraan
        $kendaraan = $kendaraanModel->find($id_kendaraan);
        if (!$kendaraan) {
            return redirect()->back()->with('error', 'Data kendaraan tidak ditemukan.');
        }

        // Update kolom progres menjadi SIAP KELUAR
        $kendaraanModel->update($id_kendaraan, ['progres' => 'SIAP KELUAR']);

        // Simpan log manual
        $now = date('Y-m-d H:i:s');
        $dataLog = [
            'wo'        => $kendaraan['wo'],
            'nopol'     => $kendaraan['nopol'],
            'mobil'     => $kendaraan['mobil'], // sesuaikan field
            'warna'     => $kendaraan['warna'],
            'progres'   => 'SIAP KELUAR',
            'action'    => 'Unit mobil sedang dalam proses bongkar',
            'create_at' => $now,
            'update_at' => $now,
        ];

        $logModel->insert($dataLog);

        return redirect()->back()->with('success', 'SIAP KELUAR dan log dicatat.');
    }

    public function Keluar()
    {
        $kendaraanModel = new M_Kendaraan();

        $data = [
            'title' => 'SIAP KELUAR',
            'kendaraan' => $kendaraanModel->getKendaraanKeluar()
        ];

        return view('proses/view_keluar', $data);
    }

    public function mulaiKeluar($id_kendaraan = null)
    {
        if ($id_kendaraan === null) {
            return redirect()->back()->with('error', 'ID kendaraan tidak ditemukan.');
        }

        $kendaraanModel = new M_Kendaraan();
        $logModel = new M_Log();

        // Ambil data kendaraan
        $kendaraan = $kendaraanModel->find($id_kendaraan);
        if (!$kendaraan) {
            return redirect()->back()->with('error', 'Data kendaraan tidak ditemukan.');
        }

        // Waktu sekarang
        $now = date('Y-m-d H:i:s');

        // Update kolom progres dan tanggal_keluar
        $kendaraanModel->update($id_kendaraan, [
            'progres'        => 'KELUAR',
            'tanggal_keluar' => $now
        ]);

        // Simpan log manual
        $dataLog = [
            'wo'        => $kendaraan['wo'],
            'nopol'     => $kendaraan['nopol'],
            'mobil'     => $kendaraan['mobil'],
            'warna'     => $kendaraan['warna'],
            'progres'   => 'KELUAR',
            'action'    => 'Unit mobil sedang dalam proses bongkar',
            'create_at' => $now,
            'update_at' => $now,
        ];

        $logModel->insert($dataLog);

        return redirect()->back()->with('success', 'Unit ditandai SIAP KELUAR dan log dicatat.');
    }


    public function stop()
    {
        $kendaraanModel = new M_Kendaraan();

        $data = [
            'title' => 'Stop',
        ];

        return view('proses/view_stop', $data);
    }
}
