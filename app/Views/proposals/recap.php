<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $leaveCount ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Izin Cuti</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $visitCount ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Izin Kunjungan</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $lateCount ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Izin Terlambat</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $sickCount ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Izin Sakit</div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Rekapitulasi Perizinan Karyawan</div>
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
                            <th>Keterangan Cuti</th>
                            <th>Lokasi Kunjungan</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($proposals as $proposal) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $proposal->employee->name ?></td>
                                <td><?= $proposal->date_start ?></td>
                                <td><?= $proposal->date_end ?></td>
                                <td><?= ucfirst($proposal->type) ?></td>
                                <td><?= $proposal->leave_type ?: '-' ?></td>
                                <td><?= $proposal->location ?></td>
                                <td><?= $proposal->description ?></td>
                                <td><?= $proposal->action ? ucfirst($proposal->action->status) : 'Pending' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>