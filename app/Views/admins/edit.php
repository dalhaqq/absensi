<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Edit Admin</div>
                    </div>
                </div>
                <div>
                    <a onclick="history.back()" class="btn bg-mygrey text-black">Back</a>
                </div>
            </div>
            <div>
                <form action="<?= route_to('admins.update', $admin->employee_id) ?>" method="post">
                    <div class="mb-6 flex justify-center gap-6">
                        <div class="input-group">
                            <label class="label" for="employee_id">Name</label>
                            <input class="input" type="text" name="employee_id" value="<?= $admin->employee->name ?>" disabled>
                        </div>
                        <div class="input-group">
                            <label class="label" for="is_super">Access</label>
                            <select class="select" name="is_super">
                                <option value="0" <?= $admin->is_super == 0 ? 'selected' : '' ?>>Admin</option>
                                <option value="1" <?= $admin->is_super == 1 ? 'selected' : '' ?>>Super Admin</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn bg-myorange text-white">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>