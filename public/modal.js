function tambah_jadwal_siswa(id) {
    $('#tambah_jadwal_siswa').modal('show');
    $('input[name="id_mapel"]').val(id);

}

function edit_mapel(id, nama) {
    $('#edit_mapel').modal('show');
    $('input[name="id_mapel"]').val(id);
    $('input[name="nama_mapel"]').val(nama);
}

function update_jadwal_siswa(id) {
    $('#update_jadwal_siswas').modal('show');
    $('input[name="id_jadwal"]').val(id);

}

function update_program_siswa(id, nama) {
    $('#update_program_siswas').modal('show');
    $('input[name="id_program"]').val(id);
    $('#nama_program').text(nama);

}

function update_data_users(id) {
    $('#edit_mapel').modal('show');
    $('input[name="id"]').val(id);
}
function hapus_jadwal_siswa(id_siswa, id_jadwal) {
    $('#hapus_data').modal('show');
    $('input[name="id_siswa"]').val(id_siswa);
    $('input[name="id_jadwal"]').val(id_jadwal);

}

function tambah_absen_siswa(id_siswa, id_jadwal) {
    $('#tambah_absensi_siswas').modal('show');
    $('input[name="id_siswa"]').val(id_siswa);
    $('input[name="id_jadwal"]').val(id_jadwal);

}

