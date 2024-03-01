<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="card-container">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl text-mygreen font-semibold">Buat Perizinan</div>
                    </div>
                </div>
                <div>
                    <a onclick="history.back()" class="btn bg-mygrey text-black">Kembali</a>
                </div>
            </div>
            <div>
                <form action="<?= route_to('proposals.store') ?>" method="post">
                    <div class="mb-6 flex justify-center gap-6">
                        <div class="input-group">
                            <label class="label" for="date_start">Tanggal Mulai</label>
                            <input class="input" type="datetime-local" name="date_start" id="date_start" value="<?= set_value('date_start') ?>">
                        </div>
                        <div class="input-group">
                            <label class="label" for="date_end">Tanggal Selesai</label>
                            <input class="input" type="datetime-local" name="date_end" id="date_end" value="<?= set_value('date_end') ?>">
                        </div>
                        <div class="input-group">
                            <label class="label" for="type">Jenis</label>
                            <select class="select" name="type" id="type">
                                <option value="visit" <?= set_value('type') == 'visit' ? 'selected' : '' ?>>Kunjungan Cabang</option>
                                <option value="leave" <?= set_value('type') == 'leave' ? 'selected' : '' ?>>Cuti</option>
                                <option value="late" <?= set_value('type') == 'late' ? 'selected' : '' ?>>Terlambat</option>
                                <option value="sick" <?= set_value('type') == 'sick' ? 'selected' : '' ?>>Sakit</option>
                            </select>
                        </div>
                    </div>
                    <div id="map-container" class="mb-6">
                        <label class="label" for="visit_long">Lokasi Kunjungan</label>
                        <div id="map" style="height: 300px"></div>
                        <input class="input" type="hidden" name="visit_long" id="visit_long" value="<?= set_value('visit_long') ?>">
                        <input class="input" type="hidden" name="visit_lat" id="visit_lat" value="<?= set_value('visit_lat') ?>">
                    </div>
                    <div id="leave-type" class="input-group mb-6">
                        <label class="label" for="leave_type">Jenis Cuti</label>
                        <select class="select" name="leave_type" id="leave_type">
                            <option value="Melangsungkan Pernikahan Untuk Pertama Kali - 3 hari" <?= set_value('leave_type') == 'Melangsungkan Pernikahan Untuk Pertama Kali - 3 hari' ? 'selected' : '' ?>>Melangsungkan Pernikahan Untuk Pertama Kali - 3 hari</option>
                            <option value="Menikahkan Anak - 2 hari" <?= set_value('leave_type') == 'Menikahkan Anak - 2 hari' ? 'selected' : '' ?>>Menikahkan Anak - 2 hari</option>
                            <option value="Istri Sah Karyawan Melahirkan/Keguguran - 2 hari" <?= set_value('leave_type') == 'Istri Sah Karyawan Melahirkan/Keguguran - 2 hari' ? 'selected' : '' ?>>Istri Sah Karyawan Melahirkan/Keguguran - 2 hari</option>
                            <option value="Karyawati Keguguran - 1,5 bulan" <?= set_value('leave_type') == 'Karyawati Keguguran - 1,5 bulan' ? 'selected' : '' ?>>Karyawati Keguguran - 1,5 bulan</option>
                            <option value="Istirahat Haid - 2 hari" <?= set_value('leave_type') == 'Istirahat Haid - 2 hari' ? 'selected' : '' ?>>Istirahat Haid - 2 hari</option>
                            <option value="Khitanan/Baptis Anak - 2 hari" <?= set_value('leave_type') == 'Khitanan/Baptis Anak - 2 hari' ? 'selected' : '' ?>>Khitanan/Baptis Anak - 2 hari</option>
                            <option value="Kematian istri/suami/anak/orang tua/mertua/menantu karyawan - 2 hari" <?= set_value('leave_type') == 'Kematian istri/suami/anak/orang tua/mertua/menantu karyawan - 2 hari' ? 'selected' : '' ?>>Kematian istri/suami/anak/orang tua/mertua/menantu karyawan - 2 hari</option>
                            <option value="Kematian saudara kandung/ipar/orang tinggal serumah - 1 hari" <?= set_value('leave_type') == 'Kematian saudara kandung/ipar/orang tinggal serumah - 1 hari' ? 'selected' : '' ?>>Kematian saudara kandung/ipar/orang tinggal serumah - 1 hari</option>
                            <option value="Pernikahan Saudara Kandung - 1 hari" <?= set_value('leave_type') == 'Pernikahan Saudara Kandung - 1 hari' ? 'selected' : '' ?>>Pernikahan Saudara Kandung - 1 hari</option>
                            <option value="Karyawati Melahirkan - 3 bulan" <?= set_value('leave_type') == 'Karyawati Melahirkan - 3 bulan' ? 'selected' : '' ?>>Karyawati Melahirkan - 3 bulan</option>
                            <option value="Ijin Ibadah Umat Beragama - 35 hari *disesuaikan" <?= set_value('leave_type') == 'Ijin Ibadah Umat Beragama - 35 hari *disesuaikan' ? 'selected' : '' ?>>Ijin Ibadah Umat Beragama - 35 hari *disesuaikan</option>
                            <option value="Karyawan menyambut anak yg terdaftar Pada Perusahaan (umat hindu) - 2 hari" <?= set_value('leave_type') == 'Karyawan
                            menyambut anak yg terdaftar Pada Perusahaan (umat hindu) - 2 hari' ? 'selected' : '' ?>>Karyawan menyambut anak yg terdaftar Pada Perusahaan (umat hindu) - 2 hari</option>
                        </select>
                    </div>
                    <div class="input-group mb-6">
                        <label class="label" for="description">Deskripsi</label>
                        <textarea class="textarea" name="description" id="description"><?= set_value('description') ?></textarea>
                        <small id="ifsick"> Kirim bukti perizinan sakit ke email:
                            <a href="mailto:HCTBNIF@bnifinance.co.id" style="text-decoration: underline; color: blue;">HCTBNIF@bnifinance.co.id</a>
                        </small>
                    </div>
                    <div>
                        <button type="submit" class="btn bg-myorange text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    let map, marker;

    function initMap() {
        map = L.map('map', {
            dragging: false,
            scrollWheelZoom: 'center'
        })
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        setPosition();
    }

    function setPosition() {
        $('#map').css('display', 'block');
        navigator.geolocation.getCurrentPosition(function(position) {
            $('#visit_long').val(position.coords.longitude);
            $('#visit_lat').val(position.coords.latitude);
            map.setView([position.coords.latitude, position.coords.longitude], 13);
            marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        });
    }

    function resetPosition() {
        $('#visit_long').val('');
        $('#visit_lat').val('');
        $('#map').css('display', 'none');
        marker.remove();
    }

    initMap();
    $('#leave-type').hide();

    $('#type').on('change', function() {
        if ($(this).val() == 'visit') {
            $('#map-container').show();
            setPosition();
        } else {
            $('#map-container').hide();
            resetPosition();
        }
        if ($(this).val() == 'leave') {
            $('#leave-type').show();
        } else {
            $('#leave_type').val('');
            $('#leave-type').hide();
        }
        if ($(this).val() == 'sick') {
            $('#ifsick').show();
        } else {
            $('#ifsick').hide();
        }
    });
</script>
<?= $this->endSection() ?>