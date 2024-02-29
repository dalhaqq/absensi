<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">History</div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-default">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Type</th>
                            <th>Visit Location</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($proposals as $proposal) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $proposal->date_start ?></td>
                                <td><?= $proposal->date_end ?></td>
                                <td><?= ucfirst($proposal->type) ?></td>
                                <td><?= $proposal->type == 'visit' ? $proposal->visit_long . ',' .  $proposal->visit_lat : '-' ?></td>
                                <td><?= $proposal->description ?></td>
                                <td><?= ucfirst($proposal->action->status) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>