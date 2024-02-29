<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Tambah Admin</div>
                    </div>
                </div>
                <div>
                    <a href="<?= route_to('admins') ?>" class="btn bg-myorange text-white">Kembali</a>
                </div>
            </div>
            <div>
                <form action="<?= route_to('admins.store') ?>" method="post">
                    <div class="gap-6 flex justify-center mb-6">
                        <div class="input-group">
                            <label for="employee_id" class="label">Nama</label>
                            <select name="employee_id" class="select">
                                <?php foreach ($employees as $employee) : ?>
                                    <option value="<?= $employee->id ?>" <?= set_value('employee_id') == $employee->id ? 'selected' : '' ?>><?= $employee->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="is_super" class="label">Akses</label>
                            <select name="is_super" class="select">
                                <option value="0" <?= set_value('is_super') == 0 ? 'selected' : '' ?>>Admin</option>
                                <option value="1" <?= set_value('is_super') == 1 ? 'selected' : '' ?>>Super Admin</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn text-white bg-myorange">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>