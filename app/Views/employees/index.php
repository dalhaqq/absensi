<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Employees</div>
                    </div>
                </div>
                <div>
                    <a href="<?= route_to('employees.create') ?>" class="btn bg-myorange text-white">Create</a>
                </div>
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
        if (confirm('Are you sure?')) {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = '<?= route_to('employees.destroy', 0) ?>'.replace('0', id);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
<?= $this->endSection() ?>