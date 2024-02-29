<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Edit Employee</div>
                    </div>
                </div>
                <div>
                    <a onclick="history.back()" class="btn bg-mygrey text-black">Back</a>
                </div>
            </div>
            <div>
                <form action="<?= route_to('employees.update', $employee->id) ?>" method="post">
                    <div class="mb-6 flex justify-center gap-6">
                        <div class="input-group">
                            <label class="label" for="code">Code</label>
                            <input class="input" type="text" name="code" id="code" value="<?= $employee->code ?>">
                        </div>
                        <div class="input-group">
                            <label class="label" for="password">Password</label>
                            <input class="input" type="password" name="password" id="password" placeholder="Leave blank to keep the same password">
                        </div>
                    </div>
                    <div class="input-group mb-6">
                        <label class="label" for="name">Name</label>
                        <input class="input" type="text" name="name" id="name" value="<?= $employee->name ?>">
                    </div>
                    <div class="input-group mb-6">
                        <label class="label" for="position">Position</label>
                        <input class="input" type="text" name="position" id="position" value="<?= $employee->position ?>">
                    </div>
                    <div class="input-group mb-6">
                        <label class="label" for="date_joined">Date Joined</label>
                        <input class="input" type="date" name="date_joined" id="date_joined" value="<?= $employee->date_joined ?>" disabled>
                    </div>
                    <div class="input-group mb-6">
                        <label class="label" for="department_id">Department</label>
                        <select class="select" name="department_id" id="department_id">
                            <?php foreach ($departments as $department) : ?>
                                <option value="<?= $department->id ?> "<?= $department->id == $employee->department_id ? 'selected' : '' ?>><?= $department->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-6">
                        <label class="label" for="role_id">Role</label>
                        <select class="select" name="role_id" id="role_id">
                            <?php foreach ($roles as $role) : ?>
                                <option value="<?= $role->id ?>" <?= $role->id == $employee->role_id ? 'selected' : '' ?>><?= $role->name ?></option>
                            <?php endforeach; ?>
                        </select>
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