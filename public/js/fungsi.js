function notif(pesan)
{
    $.jGrowl(pesan, {
        position: 'top-center',
        theme: 'bg-danger alert-styled-left alert-styled-custom',
        header: 'Informasi',
        speed: 500,
        life: 3000,
    });
    
}

function addview(table,id)
{
    alert(url)
}

function detail(id,judul) {
    $.ajax({
        url: url+'/api/berita-view',
        method: 'POST',
        data: { id: id },
        success: function (a) {
            location.href = url + '/articles/' + judul
            //    alert(a);
        }
    });
}
function addviewberita(table, id) {
    $.ajax({
        url: url+'/api/berita-view',
        method: 'POST',
        data: { id: id },
        success: function (a) {
            location.href = url + '/berita/' + a
            //    alert(a);
        }
    });
}
function addviewfile(table, id) {
    $.ajax({
        url: url+'/api/file-view',
        method: 'POST',
        data: { id: id },
        success: function (a) {
            //location.href = url + '/file/' + a
            //    alert(a);
        }
    });
}
function addviewfiledetail(id) {
    $.ajax({
        url: url+'/api/file-view-detail',
        method: 'POST',
        data: { id: id },
        success: function (a) {
            location.href = url + '/informasi/' + a
            //    alert(a);
        }
    });
}

function pilihsubkat(val)
{
    $('#subkat').load(url +'/subbykat/'+val);
    // $.ajax({
    //     url: url + '/api/json-sub-by-kat/'+val,
    //     success: function (a) {
    //         $().
    //     }
    // });
}

function simpanperorangan()
{
    var nama = $('#nama').val();
    var alamat = $('#alamat').val();
    var telepon = $('#telepon').val();
    var email = $('#email').val();
    var jenis_identitas = $('#jenis_identitas').val();
    var nomor_identitas = $('#nomor_identitas').val();
    var foto_identitas = $('#foto_identitas').val();
    var rincian_informasi = $('#rincian_informasi').val();
    var tujuan_penggunaan = $('#tujuan_penggunaan').val();
    var cara_peroleh = $('#cara_peroleh').val();
    var format_bahan = $('#format_bahan').val();
    var kategori_id = $('#kategori_id').val();
    var kategori_sub_id = $('#jenis').val();
    var dinas_id = $('#dinas_id').val();

    if(nama=='')
    {
        $('#nama_error').css('display','inline');
        $('#nama_error').text('Nama Harus Diisi');
        setTimeout(function(){
            $('#nama_error').css('display','none');
        },2500)
    }
    else if(alamat=='')
    {
        $('#alamat_error').css('display', 'inline');
        $('#alamat_error').text('Alamat Harus Diisi');
        setTimeout(function () {
            $('#alamat_error').css('display', 'none');
        }, 2500)
    }
    else if(telepon=='')
    {
        $('#telepon_error').css('display', 'inline');
        $('#telepon_error').text('Telepon Harus Diisi');
        setTimeout(function () {
            $('#telepon_error').css('display', 'none');
        }, 2500)
    }
    else if(email=='')
    {
        $('#email_error').css('display', 'inline');
        $('#email_error').text('Email Harus Diisi');
        setTimeout(function () {
            $('#email_error').css('display', 'none');
        }, 2500)
    }
    else if(jenis_identitas=='')
    {
        $('#jenis_identitas_error').css('display', 'inline');
        $('#jenis_identitas_error').text('Jenis Identitas Harus Dipilih');
        setTimeout(function () {
            $('#jenis_identitas_error').css('display', 'none');
        }, 2500)
    }
    else if(nomor_identitas=='')
    {
        $('#nomor_identitas_error').css('display', 'inline');
        $('#nomor_identitas_error').text('Nomor Identitas Harus Diisi');
        setTimeout(function () {
            $('#nomor_identitas_error').css('display', 'none');
        }, 2500)
    }
    else if(foto_identitas=='')
    {
        $('#foto_identitas_error').css('display', 'inline');
        $('#foto_identitas_error').text('Foto Identitas Harus Diisi');
        setTimeout(function () {
            $('#foto_identitas_error').css('display', 'none');
        }, 2500)
    }
    else if (kategori_id == '') {
        $('#kategori_id_error').css('display', 'inline');
        $('#kategori_id_error').text('Kategori Harus Di Pilih');
        setTimeout(function () {
            $('#kategori_id_error').css('display', 'none');
        }, 2500)
    }
    else if (kategori_sub_id == '') {
        $('#kategori_sub_id_error').css('display', 'inline');
        $('#kategori_sub_id_error').text('Jenis Harus Di Pilih');
        setTimeout(function () {
            $('#kategori_sub_id_error').css('display', 'none');
        }, 2500)
    }
    else if (dinas_id == '') {
        $('#dinas_id_error').css('display', 'inline');
        $('#dinas_id_error').text('Dinas Harus Di Pilih');
        setTimeout(function () {
            $('#dinas_id_error').css('display', 'none');
        }, 2500)
    }
    else if(rincian_informasi=='')
    {
        $('#rincian_informasi_error').css('display', 'inline');
        $('#rincian_informasi_error').text('Rincian Informasi Harus Diisi');
        setTimeout(function () {
            $('#rincian_informasi_error').css('display', 'none');
        }, 2500)
    }
    else if(tujuan_penggunaan=='')
    {
        $('#tujuan_penggunaan_error').css('display', 'inline');
        $('#tujuan_penggunaan_error').text('Tujuan Penggunaan Harus Diisi');
        setTimeout(function () {
            $('#tujuan_penggunaan_error').css('display', 'none');
        }, 2500)
    }
    else if(cara_peroleh=='')
    {
        $('#cara_peroleh_error').css('display', 'inline');
        $('#cara_peroleh_error').text('Cara Memperoleh Informasi Harus Di Pilih');
        setTimeout(function () {
            $('#cara_peroleh_error').css('display', 'none');
        }, 2500)
    }
    else if(format_bahan=='')
    {
        $('#format_bahan_error').css('display', 'inline');
        $('#format_bahan_error').text('Format Bahan Informasi Harus Di Pilih');
        setTimeout(function () {
            $('#format_bahan_error').css('display', 'none');
        }, 2500)
    }
    else
    {
        $('#peringatan').modal('show');
        $('#simpan-data').on('click',function(){
            $('#contact-form').submit();
        });
    }
    
}

function hideerror()
{
    var nama = $('#nama_error');
    var alamat = $('#alamat_error');
    var telepon = $('#telepon_error');
    var email = $('#email_error');
    var jenis_identitas = $('#jenis_identitas_error');
    var nomor_identitas = $('#nomor_identitas_error');
    var foto_identitas = $('#foto_identitas_error');
    var rincian_informasi = $('#rincian_informasi_error');
    var tujuan_penggunaan = $('#tujuan_penggunaan_error');
    var cara_peroleh = $('#cara_peroleh_error');
    var format_bahan = $('#format_bahan_error');
    var kategori_id = $('#kategori_id_error');
    var kategori_sub_id = $('#jenis_error');
    var dinas_id = $('#dinas_id_error');

    setTimeout(function(){
        nama.css('display','none');
        alamat.css('display','none');
        telepon.css('display','none');
        email.css('display','none');
        jenis_identitas.css('display','none');
        nomor_identitas.css('display','none');
        foto_identitas.css('display','none');
        rincian_informasi.css('display','none');
        tujuan_penggunaan.css('display','none');
        cara_peroleh.css('display','none');
        format_bahan.css('display','none');
        kategori_id.css('display','none');
        kategori_sub_id.css('display','none');
        dinas_id.css('display','none');
    },3000);
}