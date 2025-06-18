<?php
$steps = ['BONGKAR', 'KETOK', 'DEMPUL', 'AMPLAS', 'CAT', 'FINISHING', 'KELUAR'];
$progressList = $steps;

function formatTanggalIndo($datetime)
{
    if (!$datetime) return '-';
    $bulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];
    $tgl = date('d', strtotime($datetime));
    $bln = date('m', strtotime($datetime));
    $thn = date('Y', strtotime($datetime));
    return $tgl . ' ' . $bulan[$bln] . ' ' . $thn;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
    body {
        background-color: #f8f9fa;
    }

    .table-header {
        background: white;
        padding: 15px 20px;
        border-radius: 8px;
        font-weight: bold;
        display: flex;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 12px;
    }

    .vehicle-card {
        background: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
    }

    .vehicle-nopol {
        width: 200px;
        font-weight: bold;
        padding-top: 12px;
    }

    .vehicle-nopol a {
        text-decoration: none;
    }

    .vehicle-nopol i {
        color: #6c757d;
    }

    .stepper-wrapper {
        display: flex;
        justify-content: space-between;
        position: relative;
        flex: 1;
    }

    .stepper-wrapper::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #adb5bd;
        z-index: 0;
    }

    .stepper-item {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
        text-align: center;
        padding: 5px 0;
    }

    .step-counter {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #e0e0e0;
        color: #777;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .stepper-item.completed .step-counter {
        background-color: #198754;
        color: white;
    }

    .stepper-item.active .step-counter {
        background-color: #0d6efd;
        color: white;
    }

    .step-name {
        font-size: 0.9rem;
        font-weight: 500;
    }

    .progress-time {
        font-size: 0.75rem;
        color: #6c757d;
    }

    /* Modal tree */
    .progress-tree {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        padding: 40px 0;
    }

    .progress-tree::before {
        content: '';
        position: absolute;
        top: 105px;
        bottom: 140px;
        left: 50%;
        width: 1px;
        background-color: #000;
        transform: translateX(-50%);
        z-index: 0;
    }

    .tree-row {
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width: 700px;
        padding: 0 20px;
        margin-bottom: 60px;
        position: relative;
        z-index: 1;
    }

    .tree-step-wrapper {
        width: 50%;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .tree-line-horizontal {
        position: absolute;
        top: 50%;
        height: 1px;
        width: 50%;
        background: #000;
        z-index: 0;
        transform: translateY(-50%);
    }

    .tree-line-horizontal.left {
        left: 50%;
    }

    .tree-line-horizontal.right {
        right: 50%;
    }

    .tree-date {
        background: #e0e0e0;
        padding: 4px 10px;
        font-size: 0.75rem;
        border-radius: 12px;
        margin-bottom: 6px;
        font-weight: 500;
        z-index: 1;
    }

    .tree-step {
        background: #f1f1f1;
        padding: 10px 15px;
        border-radius: 8px;
        text-align: center;
        font-weight: bold;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        z-index: 2;
    }

    .tree-step.done {
        background-color: #198754;
        color: #fff;
    }

    .tree-step.active {
        background-color: #0d6efd;
        color: #fff;
    }

    .tree-center-icon {
        background-color: #e0e0e0;
        width: 64px;
        height: 64px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.15);
        border: 2px solid #adb5bd;
        font-size: 1.8rem;
    }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3"><?= esc($subtitle) ?></h2>
        <p><?= esc($description) ?></p>

        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari No Polisi... (cth: B1234ABC)">
            <span class="input-group-text bg-white"><i class="bi bi-search text-secondary"></i></span>
        </div>

        <div class="table-header">
            <div style="flex: 1;">No Polisi</div>
            <div style="flex: 1;">Progress</div>
        </div>

        <?php foreach ($kendaraans as $kendaraan): ?>
        <?php
        $nopol = strtoupper($kendaraan['nopol']);
        $current = strtoupper($kendaraan['progres']);
        $currentIndex = array_search($current, $steps);
        ?>
        <div class="vehicle-card">
            <div class="vehicle-nopol d-flex align-items-center gap-2">
                <i class="bi bi-car-front-fill fs-5"></i>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-<?= $kendaraan['id_kendaraan'] ?>">
                    <?= esc($kendaraan['nopol']) ?>
                </a>
            </div>
            <div class="stepper-wrapper">
                <?php foreach ($steps as $i => $step):
                    $class = '';
                    if ($i < $currentIndex) $class = 'completed';
                    elseif ($i === $currentIndex) $class = 'active';
                    $waktu = $logMap[$nopol][$step] ?? null;
                ?>
                <div class="stepper-item <?= $class ?>">
                    <div class="step-counter">
                        <?= $i < $currentIndex || ($i === $currentIndex && $step === 'KELUAR') ? '✔' : $i + 1 ?>
                    </div>
                    <div class="step-name"><?= ($step === 'KELUAR') ? 'Selesai' : $step ?></div>
                    <?php if ($waktu): ?>
                    <div class="progress-time"><?= formatTanggalIndo($waktu) ?></div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="modal-<?= $kendaraan['id_kendaraan'] ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-4">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title w-100 text-center">Detail Progress - <?= esc($kendaraan['nopol']) ?></h5>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body pt-3">
                        <div class="progress-tree">
                            <div class="tree-center-icon">
                                <i class="bi bi-car-front"></i>
                            </div>
                            <?php
                            $rows = [['KETOK', 'DEMPUL'], ['AMPLAS', 'CAT'], ['FINISHING', 'KELUAR']];
                            $progressIndex = array_search(strtoupper($kendaraan['progres']), $progressList);
                            ?>
                            <?php foreach ($rows as $pair): ?>
                            <div class="tree-row">
                                <?php foreach ($pair as $side => $step):
                                    $stepIndex = array_search($step, $progressList);
                                    $status = '';
                                    if ($stepIndex < $progressIndex) $status = 'done';
                                    elseif ($stepIndex === $progressIndex) $status = ($step === 'KELUAR') ? 'done' : 'active';
                                    $tanggal = isset($logMap[$nopol][$step]) ? formatTanggalIndo($logMap[$nopol][$step]) : '-';
                                ?>
                                <div class="tree-step-wrapper">
                                    <div class="tree-line-horizontal <?= $side === 0 ? 'left' : 'right' ?>"></div>
                                    <div class="tree-date"><?= $tanggal ?></div>
                                    <div class="tree-step <?= $status ?>">
                                        <?= ($step === 'KELUAR') ? 'Selesai' : $step ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const input = document.getElementById("searchInput");
        const cards = document.querySelectorAll(".vehicle-card");

        function normalize(str) {
            return str.toLowerCase().replace(/\s+/g, '').replace(/[^a-z0-9]/gi, '');
        }

        input.addEventListener("input", function() {
            const keyword = normalize(this.value);
            cards.forEach(card => {
                const nopol = normalize(card.querySelector('.vehicle-nopol').textContent);
                const match = nopol.includes(keyword);
                card.style.display = match ? "flex" : "none";
            });
        });
    });
    </script>
</body>

</html>