<a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
    <img src="<?= base_url("site-logo.png") ?>" alt="">
</a>
<ul class="mt-4">
    <li class="mb-1 group">
        <a href="<?= route_to('home') ?>" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-mygrey rounded-md group-[.active]:bg-mygrey group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
            <i class="ri-home-2-line mr-3 text-lg"></i>
            <span class="text-sm">Home</span>
        </a>
    </li>
    <?php if (has_access(['super', 'admin'])) : ?>
        <span class="text-myorange font-bold">ADMIN</span>
        <!-- <li class="mb-1 group">
            <a href="<?= route_to('departments') ?>" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-mygrey rounded-md group-[.active]:bg-mygrey group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-team-line mr-3 text-lg"></i>
                <span class="text-sm">Kelola Departemen</span>
            </a>
        </li> -->
        <li class="mb-1 group">
            <a href="<?= route_to('employees') ?>" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-mygrey rounded-md group-[.active]:bg-mygrey group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-user-line mr-3 text-lg"></i>
                <span class="text-sm">Kelola Pegawai</span>
            </a>
        </li>
        <?php if (has_access(['super'])) : ?>
            <li class="mb-1 group">
                <a href="<?= route_to('admins') ?>" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-mygrey rounded-md group-[.active]:bg-mygrey group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-admin-line mr-3 text-lg"></i>
                    <span class="text-sm">Kelola Admin</span>
                </a>
            </li>
        <?php endif; ?>
    <?php endif; ?>
    <span class="text-myorange font-bold">MAIN MENU</span>
    <?php if (has_role(['SPV'])) : ?>
        <li class="mb-1 group">
            <a href="<?= route_to('approvals.pending') ?>" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-mygrey rounded-md group-[.active]:bg-mygrey group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-file-check-line mr-3 text-lg"></i>
                <span class="text-sm">Kelola Perizinan</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="<?= route_to('approvals.history') ?>" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-mygrey rounded-md group-[.active]:bg-mygrey group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-file-history-line mr-3 text-lg"></i>
                <span class="text-sm">Lihat Riwayat Perizinan</span>
            </a>
        </li>
    <?php else : ?>
        <li class="mb-1 group">
            <a href="<?= route_to('proposals.create') ?>" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-mygrey rounded-md group-[.active]:bg-mygrey group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-file-add-line mr-3 text-lg"></i>
                <span class="text-sm">Ajukan Perizinan</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="<?= route_to('proposals.pending') ?>" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-mygrey rounded-md group-[.active]:bg-mygrey group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-file-unknow-line mr-3 text-lg"></i>
                <span class="text-sm">Lihat Perizinan</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="<?= route_to('proposals.history') ?>" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-mygrey rounded-md group-[.active]:bg-mygrey group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-file-history-line mr-3 text-lg"></i>
                <span class="text-sm">Lihat Riwayat Perizinan</span>
            </a>
        </li>
    <?php endif; ?>
</ul>