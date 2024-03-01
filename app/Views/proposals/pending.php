<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Perizinan Menunggu Persetujuan</div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Jenis</th>
                            <th>Keterangan Cuti</th>
                            <th>Lokasi Kunjungan</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($proposals as $proposal) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $proposal->date_start ?></td>
                                <td><?= $proposal->date_end ?></td>
                                <td><?= ucfirst($proposal->type) ?></td>
                                <td><?= $proposal->leave_type ?: '-' ?></td>
                                <td><?= $proposal->location ?></td>
                                <td><?= $proposal->description ?></td>
                                <td>Pending</td>
                                <td>
                                    <a onclick="cancelProposal(<?= $proposal->id ?>)" class="btn bg-mygrey text-black">Cancel</a>
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
        function cancelProposal(id) {
            if (confirm('Apakah Anda yakin?')) {
                const form = document.createElement('form');
                form.method = 'post';
                form.action = '<?= route_to('proposals.cancel', 0) ?>'.replace('0', id);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
<?= $this->endSection() ?>