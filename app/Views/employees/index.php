<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?php $now = time_now(); ?>
<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $employees->filter(function ($v, $k) use ($now) {
                            $date = Carbon\Carbon::createFromFormat('Y-m-d', $v->date_joined);
                            return $now->month == $date->month && $now->year == $date->year;
                        })->count(); ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">IN</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $employees->filter(function ($v, $k) {
                            return $v->contracts[0]->date_end >= date('Y-m-d');
                        })->count(); ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">EXIST</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $employees->filter(function ($v, $k) {
                            return $v->contracts[0]->date_end < date('Y-m-d');
                        })->count(); ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">OUT</div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $activeEmployees->count() ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Pegawai Aktif</div>
                </div>
            </div>


        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $contractsAboutToExpire->count() ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Pegawai hampir habis kontrak</div>
                </div>
            </div>

        </div>
    </div>
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Pegawai</div>
                    </div>
                </div>
                <div>
                    <a href="<?= route_to('employees.create') ?>" class="btn bg-myorange text-white">Tambah</a>
                </div>
            </div>
            <?php if ($contractsAboutToExpire->count() > 0) : ?>
                <div class="mb-6">
                    <div class="text-myorange font-semibold">Kontrak yang akan segera berakhir</div>
                    <div class="grid grid-cols-1 gap-6 mt-6">
                        <div class="overflow-x-auto">
                            <table class="table-default">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Posisi</th>
                                        <th>Divisi</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal Selesai Kontrak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($contractsAboutToExpire as $employee) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $employee->name ?></td>
                                            <td><?= $employee->position ?></td>
                                            <td><?= $employee->department->name ?></td>
                                            <td><?= $employee->role->name ?></td>
                                            <td class="text-center"><?= $employee->contracts[0]->date_end ?></td>
                                            <td class="py-2 flex justify-center gap-2">
                                                <div>
                                                    <a onclick="updateContract(<?= $employee->id ?>)" class="btn bg-mygrey text-black">Perbarui</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="mb-6">
                <div class="text-mygreen font-semibold">Daftar Pegawai Aktif</div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Divisi</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Mulai Kontrak</th>
                            <th>Tanggal Selesai Kontrak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($employees as $employee) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $employee->code ?></td>
                                <td><?= $employee->name ?></td>
                                <td><?= $employee->position ?></td>
                                <td><?= $employee->department->name ?></td>
                                <td><?= $employee->role->name ?></td>
                                <td><?= $employee->isSuperAdmin() ? 'Super Admin' : ($employee->isAdmin() ? 'Admin' : 'User') ?></td>
                                <td class="text-center"><?= $employee->date_joined ?></td>
                                <td class="text-center"><?= $employee->contracts[0]->date_start ?></td>
                                <td class="text-center"><?= $employee->contracts[0]->date_end ?></td>
                                <td class="py-2 flex justify-center gap-2">
                                    <div>
                                        <a href="<?= route_to('employees.edit', $employee->id) ?>" class="btn bg-mygreen text-white">Edit</a>
                                    </div>
                                    <div>
                                        <a onclick="deleteEmployee(<?= $employee->id ?>)" class="btn bg-mygrey text-black">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteEmployee(id) {
        if (confirm('Apakah Anda yakin?')) {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = '<?= route_to('employees.destroy', 0) ?>'.replace('0', id);
            document.body.appendChild(form);
            form.submit();
        }
    }

    function updateContract(id) {
        if (confirm('Apakah Anda yakin?')) {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = '<?= route_to('employees.updateContract', 0) ?>'.replace('0', id);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
<?= $this->endSection() ?>