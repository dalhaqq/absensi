<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Tambah Divisi/Cabang</div>
                    </div>
                </div>
                <div>
                    <a onclick="history.back()" class="btn bg-mygrey text-black">Kembali</a>
                </div>
            </div>
            <div>
                <form action="<?= route_to('departments.store') ?>" method="post">
                    <div class="mb-6">
                        <div class="input-group">
                            <label class="label" for="name">Nama</label>
                            <input class="input" type="text" name="name" id="name" value="<?= set_value('name') ?>">
                        </div>
                    </div>
                    <div class="mb-6 flex justify-center gap-6">
                        <div class="input-group">
                            <label class="label" for="code">Kode</label>
                            <input class="input" type="text" name="code" id="code">
                        </div>
                        <div class="input-group">
                            <label class="label" for="type">Jenis</label>
                            <select class="select" name="type" id="type">
                                <?php foreach ($types as $key => $val) : ?>
                                    <option value="<?= $key ?>"><?= $val ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn bg-myorange text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>