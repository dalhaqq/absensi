<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<!-- Content -->
<?php if (!has_role(['SPA'])) : ?>
<div class="p-6">
    <?php if (!has_role(['SPV'])) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $hakCuti ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Hak Cuti Tahunan</div>
                </div>
            </div>

            
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $cutiApproved ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Approved</div>
                </div>
            </div>
            
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="text-2xl font-semibold mb-1"><?= $sisaCuti ?></div>
                    <div class="text-sm font-medium text-gray-400">Sisa</div>
                </div>
            </div>
            
        </div>
    </div>
    <?php endif; ?>
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Data Pribadi</div>
                    </div>
                </div>
            </div>
            <table class="items-center w-full bg-transparent border-collapse">
                <tr class="px-4 text-gray-800 dark:text-gray-200 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    <td class="p-1 font-bold">NIP</td>
                    <td class="p-1"><?= $user->code ?></td>
                </tr>
                <tr class="px-4 text-gray-800 dark:text-gray-200 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    <td class="p-1 font-bold">Nama Lengkap</td>
                    <td class="p-1"><?= $user->name ?></td>
                </tr>
                <tr class="px-4 text-gray-800 dark:text-gray-200 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    <td class="p-1 font-bold">Jabatan</td>
                    <td class="p-1"><?= $user->role->name ?></td>
                </tr>
                <tr class="px-4 text-gray-800 dark:text-gray-200 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    <td class="p-1 font-bold">Position</td>
                    <td class="p-1"><?= $user->position ?></td>
                </tr>
                <tr class="px-4 text-gray-800 dark:text-gray-200 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    <td class="p-1 font-bold">Department</td>
                    <td class="p-1"><?= $user->department->name ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php if ($user->isAdmin()) : ?>
    <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $leaveCount ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Izin Cuti</div>
                </div>
            </div>

            
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold"><?= $lateCount ?></div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Izin Terlambat</div>
                </div>
            </div>
            
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="text-2xl font-semibold mb-1"><?= $visitCount ?></div>
                    <div class="text-sm font-medium text-gray-400">Izin Kunjungan</div>
                </div>
            </div>
            
        </div>
    </div> -->
    <?php endif; ?>
</div>
<?php endif; ?>
<?= $this->endSection() ?>