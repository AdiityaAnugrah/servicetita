<?= $this->extend('layout/template'); ?>
<?= $this->section('content');  ?>

<div class="pc-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="page-header-title">
                <h5 class="mb-0 font-medium">Waiting Repair</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Waiting Repair</a></li>
                <li class="breadcrumb-item" aria-current="page">Antri</li>
            </ul>
        </div>
    </div>

    <style>
        /* Tabel default (desktop) */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .custom-table th {
            background-color: #f2f2f2;
        }

        /* Card (untuk mobile) */
        .mobile-card-view {
            display: none;
        }

        @media (max-width: 768px) {
            .custom-table {
                display: none;
            }

            .mobile-card-view {
                display: block;
            }

            .card-item {
                border: 1px solid #ccc;
                border-radius: 8px;
                padding: 10px;
                margin-bottom: 12px;
                background-color: #fff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                font-size: 14px;
            }

            .card-item p {
                margin: 4px 0;
            }

            .badge {
                display: inline-block;
                background: #ffc107;
                padding: 2px 8px;
                border-radius: 4px;
                font-size: 12px;
            }

            .btn-small {
                padding: 4px 8px;
                font-size: 12px;
                background: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
            }
        }
    </style>

    <!-- Tombol Add -->
    <div class="mb-3 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
            <i class="ti ti-plus"></i> Add
        </button>
    </div>
    <!-- ======= Tabel (Desktop) ======= -->
    <table class="custom-table">
        <thead>
            <tr>
                <th>No</th>
                <th>WO</th>
                <th>Nopol</th>
                <th>Tanggal Masuk</th>
                <th>EST Keluar</th>
                <th>Progres</th>
                <th>Mobil</th>
                <th>Warna</th>
                <th>Asuransi</th>
                <th>Buttom</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($kendaraan as $item): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($item['wo']) ?></td>
                    <td><?= esc($item['nopol']) ?></td>
                    <td><?= esc($item['tgl_masuk']) ?></td>
                    <td><?= esc($item['est_keluar']) ?></td>
                    <td><span class="badge bg-warning"><?= esc($item['progres']) ?></span></td>
                    <td><?= esc($item['mobil']) ?></td>
                    <td><?= esc($item['warna']) ?></td>
                    <td><?= esc($item['asuransi']) ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalBongkar">BONGKAR</button>
                        <button class="btn btn-warning btn-bongkar" data-id="<?= $item['id_kendaraan']; ?>">
                            Mulai Bongkar
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- ======= Card (Mobile) ======= -->
    <div class="mobile-card-view d-md-none">
        <?php $no = 1;
        foreach ($kendaraan as $item): ?>
            <div class="card-item mb-3 p-3 border rounded shadow-sm">
                <p><strong>No:</strong> <?= $no++ ?></p>
                <p><strong>WO:</strong> <?= esc($item['wo'] ?? '-') ?></p>
                <p><strong>Nopol:</strong> <?= esc($item['nopol']) ?></p>
                <p><strong>Tanggal Masuk:</strong> <?= esc($item['tgl_masuk']) ?></p>
                <p><strong>EST_Keluar:</strong> <?= esc($item['est_keluar']) ?></p>
                <p><strong>Progres:</strong> <span class="badge bg-warning"><?= esc($item['progres']) ?></span></p>
                <p><strong>Mobil:</strong> <?= esc($item['mobil']) ?></p>
                <p><strong>Warna:</strong> <?= esc($item['warna']) ?></p>
                <p><strong>Asuransi:</strong> <?= esc($item['asuransi']) ?></p>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalBongkar">BONGKAR</button>
                <button class="btn btn-warning btn-bongkar" data-id="<?= $item['id_kendaraan']; ?>">
                    Mulai Bongkar
                </button>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.btn-bongkar').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');

            Swal.fire({
                title: 'Mulai Bongkar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#198754',
                cancelButtonColor: '#dc3545'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/proses/mulai-bongkar/' + id;
                }
            });
        });
    });
</script>







<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalAddLabel">Tambah Data</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('proses/create_antri') ?>" method="post">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="wo" class="form-label">WO</label>
                            <input type="text" class="form-control" id="wo" name="wo" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nopol" class="form-label">Nopol</label>
                            <input type="text" class="form-control" id="nopol" name="nopol" required>
                        </div>
                        <div class="col-md-6">
                            <label for="progres" class="form-label">Progres</label>
                            <select class="form-select" id="progres" name="progres">
                                <option value="WAITING REPAIR">Waiting Repair</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="mobil" class="form-label">Mobil</label>
                            <input type="text" class="form-control" id="mobil" name="mobil">
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_masuk" class="form-label">Tgl masuk</label>
                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                        </div>
                        <div class="col-md-6">
                            <label for="est_keluar" class="form-label">Est Keluar</label>
                            <input type="date" class="form-control" id="est_keluar" name="est_keluar">
                        </div>
                        <div class="col-md-6">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna">
                        </div>
                        <div class="col-md-6">
                            <label for="asuransi" class="form-label">Asuransi</label>
                            <input type="text" class="form-control" id="asuransi" name="asuransi">
                        </div>
                        <div class="col-md-6">
                            <label for="bengkel" class="form-label">Bengkel</label>
                            <input type="text" class="form-control" id="bengkel" name="bengkel" value="TITANIUM" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Mulai Bongkar -->
<div class="modal fade" id="modalBongkar" tabindex="-1" aria-labelledby="modalBongkarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBongkarLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <p>Mulai Bongkar?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-success" id="btnKonfirmasiBongkar">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add
<div class="modal fade" id="modalBongkar" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalAddLabel">Mulai Pengerjaan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('update_bongkar') ?>" method="post">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="wo" class="form-label">WO</label>
                            <input type="text" class="form-control" id="wo" name="wo" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nopol" class="form-label">Nopol</label>
                            <input type="text" class="form-control" id="nopol" name="nopol" required>
                        </div>
                        <div class="col-md-6">
                            <label for="progres" class="form-label">Progres</label>
                            <select class="form-select" id="progres" name="progres">
                                <option value="WAITING REPAIR">Waiting Repair</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="mobil" class="form-label">Mobil</label>
                            <input type="text" class="form-control" id="mobil" name="mobil">
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_masuk" class="form-label">Tgl masuk</label>
                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                        </div>
                        <div class="col-md-6">
                            <label for="est_keluar" class="form-label">Est Keluar</label>
                            <input type="date" class="form-control" id="est_keluar" name="est_keluar">
                        </div>
                        <div class="col-md-6">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna">
                        </div>
                        <div class="col-md-6">
                            <label for="asuransi" class="form-label">Asuransi</label>
                            <input type="text" class="form-control" id="asuransi" name="asuransi">
                        </div>
                        <div class="col-md-6">
                            <label for="bengkel" class="form-label">Bengkel</label>
                            <input type="text" class="form-control" id="bengkel" name="bengkel" value="TITANIUM" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div> -->


<?= $this->endSection(); ?>