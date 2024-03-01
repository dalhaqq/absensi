<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Riwayat Persetujuan</div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Jenis</th>
                            <th>Lokasi Kunjungan</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($proposals as $proposal) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $proposal->employee->name ?></td>
                                <td><?= $proposal->date_start ?></td>
                                <td><?= $proposal->date_end ?></td>
                                <td><?= ucfirst($proposal->type) ?></td>
                                <td><?= $proposal->location ?></td>
                                <td><?= $proposal->description ?></td>
                                <td><?= ucfirst($proposal->action->status) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>