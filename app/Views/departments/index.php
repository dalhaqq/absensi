<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Divisi/Cabang</div>
                    </div>
                </div>
                <div>
                    <a href="<?= route_to('departments.create') ?>" class="btn bg-myorange text-white">Tambah</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($departments as $department) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $department->code ?></td>
                                <td><?= $department->name ?></td>
                                <td><?= ucfirst($department->type) ?></td>
                                <td class="py-2 flex justify-center gap-2">
                                    <div>
                                        <a href="<?= route_to('departments.edit', $department->id) ?>" class="btn text-white bg-mygreen">Edit</a>
                                    </div>
                                    <div>
                                        <a onclick="deleteDepartment(<?= $department->id ?>)" class="btn text-black bg-mygrey">Hapus</a>
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
    function deleteDepartment(id) {
        if (confirm('Apakah Anda yakin?')) {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = '<?= route_to('departments.destroy', 0) ?>'.replace('0', id);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
<?= $this->endSection() ?>