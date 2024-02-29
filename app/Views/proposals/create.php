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
                            </select>
                        </div>
                    </div>
                    <div id="map-container" class="mb-6">
                        <label class="label" for="visit_long">Lokasi Kunjungan</label>
                        <div id="map" style="height: 300px"></div>
                        <input class="input" type="hidden" name="visit_long" id="visit_long" value="<?= set_value('visit_long') ?>">
                        <input class="input" type="hidden" name="visit_lat" id="visit_lat" value="<?= set_value('visit_lat') ?>">
                    </div>
                    <div class="input-group mb-6">
                        <label class="label" for="description">Deskripsi</label>
                        <textarea class="textarea" name="description" id="description"><?= set_value('description') ?></textarea>
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

    $('#type').on('change', function() {
        if ($(this).val() == 'visit') {
            $('#map-container').show();
            setPosition();
        } else {
            $('#map-container').hide();
            resetPosition();
        }
    });
</script>
<?= $this->endSection() ?>