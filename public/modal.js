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