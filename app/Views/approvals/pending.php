<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Approvals Pending</div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Employee Name</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Type</th>
                            <th>Visit Location</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($proposals as $proposal) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $proposal->employee->name ?></td>
                                <td class="text-center"><?= $proposal->date_start ?></td>
                                <td class="text-center"><?= $proposal->date_end ?></td>
                                <td><?= ucfirst($proposal->type) ?></td>
                                <td><?= $proposal->type == 'visit' ? $proposal->visit_long . ',' .  $proposal->visit_lat : '-' ?></td>
                                <td><?= $proposal->description ?></td>
                                <td>Pending</td>
                                <td class="py-2 flex justify-center gap-2">
                                    <div>
                                        <a onclick="approveProposal(<?= $proposal->id ?>)" class="btn bg-mygreen text-white">Approve</a>
                                    </div>
                                    <div>
                                        <a onclick="rejectProposal(<?= $proposal->id ?>)" class="btn bg-mygrey text-black">Reject</a>
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
    function approveProposal(id) {
        if (confirm('Are you sure?')) {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = '<?= route_to('approvals.approve', 0) ?>'.replace('0', id);
            document.body.appendChild(form);
            form.submit();
        }
    }

    function rejectProposal(id) {
        if (confirm('Are you sure?')) {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = '<?= route_to('approvals.reject', 0) ?>'.replace('0', id);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
<?= $this->endSection() ?>