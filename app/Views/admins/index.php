<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Admin</div>
                    </div>
                </div>
                <?php if (count($employees) > 0) : ?>
                    <div>
                        <a href="<?= route_to('admins.create') ?>" class="ml-4 bg-myorange text-white px-4 py-2 rounded-md float-right">Tambah</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="overflow-x-auto">
                <table class="table-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($admins as $admin) : ?>
                            <tr class="px-4 text-gray-800 dark:text-gray-200 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $admin->employee->code ?></td>
                                <td><?= $admin->employee->name ?></td>
                                <td><?= $admin->is_super ? 'Super Admin' : 'Admin' ?></td>
                                <td class="py-2 flex justify-center gap-2">
                                    <div><a href="<?= route_to('admins.edit', $admin->employee_id) ?>" class="btn bg-mygreen text-white">Edit</a></div>
                                    <div><a onclick="deleteAdmin(<?= $admin->employee_id ?>)" class="btn bg-mygrey text-black">Hapus</a></div>
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
    function deleteAdmin(id) {
        if (confirm('Apakah Anda yakin?')) {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = '<?= route_to('admins.destroy', 0) ?>'.replace('0', id);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
<?= $this->endSection() ?>