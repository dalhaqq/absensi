<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Edit Department</div>
                    </div>
                </div>
                <div>
                    <a onclick="history.back()" class="btn bg-mygrey text-black">Back</a>
                </div>
            </div>
            <div>
                <form action="<?= route_to('departments.update', $department->id) ?>" method="post">
                    <div class="mb-6">
                        <div class="input-group">
                            <label class="label" for="name">Name</label>
                            <input class="input" type="text" name="name" id="name" value="<?= $department->name ?>">
                        </div>
                    </div>
                    <div class="mb-6 flex justify-center gap-6">
                        <div class="input-group">
                            <label class="label" for="code">Code</label>
                            <input class="input" type="text" name="code" id="code" value="<?= $department->code ?>">
                        </div>
                        <div class="input-group">
                            <label class="label" for="type">Type</label>
                            <select class="select" name="type" id="type">
                                <?php foreach ($types as $key => $val) : ?>
                                    <option value="<?= $key ?>" <?= $key == $department->type ? 'selected' : '' ?>><?= $val ?></option>
                                <?php endforeach; ?>
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