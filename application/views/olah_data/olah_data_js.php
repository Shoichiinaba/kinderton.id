<script>
// const Toast = new FireToast();

$(document).ready(function() {
    $('.notif-pesanan').load('<?php echo site_url('chekout/notif_vali_pesanan'); ?>');
    $('.notif-pesanan_dikirim').load('<?php echo site_url('chekout/notif_pesanan_dikirim'); ?>');

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.form-data').load('<?php echo site_url('Olah_data/jenis_produk'); ?>');
    $('#btn-jenis-produk').click(function(e) {
        $('.form-data').load('<?php echo site_url('Olah_data/jenis_produk'); ?>');
        $('#form-harga-produk').attr('hidden', true);
        $('#form-foto-produk').attr('hidden', true);
        $('#form-foto-banner').attr('hidden', true);
        $('#detail-pesanan').attr('hidden', true);
        $('#form-pengaturan').attr('hidden', true);
    });
    $('#btn-harga-produk').click(function(e) {
        $('.form-data').load('<?php echo site_url('Olah_data/harga_produk'); ?>');
        let formData = new FormData();
        formData.append('select', 'harga');
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('olah_data/form_select_data_jenis_produk'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.form-select-data-jenis-produk-harga').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
        $('.form-select-data-jenis-produk').load(
            '<?php echo site_url('Olah_data/form_select_data_jenis_produk'); ?>');
        $('#form-foto-produk').attr('hidden', true);
        $('#form-foto-banner').attr('hidden', true);
        $('#form-jenis-produk').attr('hidden', true);
        $('#detail-pesanan').attr('hidden', true);
        $('#form-pengaturan').attr('hidden', true);
        form_harga_produk();
    });

    $('#btn-foto-produk').click(function(e) {
        $('.form-data').load('<?php echo site_url('Olah_data/foto_produk'); ?>');
        let formData = new FormData();
        formData.append('select', 'foto');
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('olah_data/form_select_data_jenis_produk'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.form-select-data-jenis-produk-foto').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
        $('#form-harga-produk').attr('hidden', true);
        $('#form-jenis-produk').attr('hidden', true);
        $('#detail-pesanan').attr('hidden', true);
        $('#form-pengaturan').attr('hidden', true);
        form_jenis_produk();
    });

    // upload banner
    $('#btn-foto-banner').click(function(e) {
        $('.form-data').load('<?php echo site_url('Olah_data/foto_banner'); ?>');
        $('#form-harga-produk').attr('hidden', true);
        $('#form-jenis-produk').attr('hidden', true);
        $('#detail-pesanan').attr('hidden', true);
        $('#form-pengaturan').attr('hidden', true);
    });

    $('#btn-pengaturan').click(function() {
        $('.form-data').load('<?php echo site_url('Olah_data/pengaturan'); ?>');
        $('#form-foto-produk').attr('hidden', true);
        $('#form-foto-banner').attr('hidden', true);
        $('#form-harga-produk').attr('hidden', true);
        $('#form-jenis-produk').attr('hidden', true);
        $('#detail-pesanan').attr('hidden', true);
    });

    $('#btn-quotes').click(function() {
        $('.form-data').load('<?php echo site_url('Olah_data/quots'); ?>');
        $('#form-foto-produk').attr('hidden', true);
        $('#form-foto-banner').attr('hidden', true);
        $('#form-harga-produk').attr('hidden', true);
        $('#form-jenis-produk').attr('hidden', true);
        $('#detail-pesanan').attr('hidden', true);
    });

    $('#btn-vali-pesanan').click(function(e) {
        $('.form-data').load('<?php echo site_url('Chekout/vali_pesanan'); ?>');
        $('#detail-pesanan').attr('hidden', true);
        $('#form-foto-produk').attr('hidden', true);
        $('#form-foto-banner').attr('hidden', true);
        $('#form-jenis-produk').attr('hidden', true);
        $('#form-harga-produk').attr('hidden', true);
        $('#form-pengaturan').attr('hidden', true);
    });
    $('#btn-pesanan-dikirim').click(function(e) {
        $('.form-data').load('<?php echo site_url('Chekout/pesanan_dikirim'); ?>');
        $('#detail-pesanan').attr('hidden', true);
        $('#form-foto-banner').attr('hidden', true);
        $('#form-foto-produk').attr('hidden', true);
        $('#form-jenis-produk').attr('hidden', true);
        $('#form-harga-produk').attr('hidden', true);
        $('#form-pengaturan').attr('hidden', true);
    });
    $('#btn-riwayat-pesanan').click(function(e) {
        $('.form-data').load('<?php echo site_url('Chekout/riwayat_pesanan'); ?>');
        $('#detail-pesanan').attr('hidden', true);
        $('#form-foto-produk').attr('hidden', true);
        $('#form-foto-banner').attr('hidden', true);
        $('#form-jenis-produk').attr('hidden', true);
        $('#form-harga-produk').attr('hidden', true);
        $('#form-pengaturan').attr('hidden', true);
    });

    // JENIS PRODUK JS
    $("#btn-simpan-jenis-produk").click(function(e) {
        e.preventDefault();
        var val_simpan_jp = $("#btn-simpan-jenis-produk").val();
        var kategori = $("#kategori").find(':selected').val();
        var gender = $("#gender").find(':selected').val();
        let formData = new FormData();
        formData.append('id-jp', $('#id-jp').val());
        formData.append('nm-jp', $('#nm-jp').val());
        formData.append('kategori', kategori);
        formData.append('gender', gender);
        formData.append('desk', $('#desk').val());
        if (val_simpan_jp == 'simpan-jenis-produk') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('olah_data/simpan_jenis_produk'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    // alert(msg);
                    alert("Data jenis produk berhasil di simpan.");
                    $('#form-jenis-produk').attr('hidden', true);
                    $('.form-data').load(
                        '<?php echo site_url('Olah_data/jenis_produk'); ?>');
                    form_jenis_produk();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('olah_data/edit_jenis_produk') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert(msg);
                    alert("Edit data jenis produk berhasil di simpan.");
                    $('#form-jenis-produk').attr('hidden', true);
                    $('.form-data').load(
                        '<?php echo site_url('Olah_data/jenis_produk'); ?>');
                    form_jenis_produk();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    // END JENIS PRODUK JS

    $(document).on("input", "#diskon,#hrg-awal", function(e) {
        // alert('ya');
        hrg = parseFloat(removeCommas($("#hrg-awal").val())) * parseFloat($('#diskon').val()) / 100;
        hrg_diskon = parseFloat(removeCommas($("#hrg-awal").val())) - hrg;
        $('#hrg-diskon').val((hrg_diskon));
        // alert(parseFloat(removeCommas($("#hrg-awal").val())));
    });


    $('#cheklis-al').click(function(e) {
        if ($(this).is(":checked")) {
            // profesi.push($(this).val());
            $('#all-size').val('All Size');
        } else {
            $('#all-size').val('');
        }
    });
    $('#cheklis-s').click(function(e) {
        if ($(this).is(":checked")) {
            // profesi.push($(this).val());
            $('#small').val('S');
        } else {
            $('#small').val('');
        }
    });
    $('#cheklis-m').click(function(e) {
        if ($(this).is(":checked")) {
            // profesi.push($(this).val());
            $('#medium').val('M');
        } else {
            $('#medium').val('');
        }
    });
    $('#cheklis-l').click(function(e) {
        if ($(this).is(":checked")) {
            // profesi.push($(this).val());
            $('#large').val('L');
        } else {
            $('#large').val('');
        }
    });
    $('#cheklis-xl').click(function(e) {
        if ($(this).is(":checked")) {
            // profesi.push($(this).val());
            $('#extra-large').val('XL');
        } else {
            $('#extra-large').val('');
        }
    });
    $('#cheklis-xxl').click(function(e) {
        if ($(this).is(":checked")) {
            // profesi.push($(this).val());
            $('#extra2-large').val('XXL');
        } else {
            $('#extra2-large').val('');
        }
    });

    if ($("#status-produk").find(':selected').val() == 'PROMO') {
        $('#tgl-akhir').val(tgl);
        $('#jam-akhir').val(jam);
    } else {
        $('#tgl-akhir').val('');
        $('#jam-akhir').val('');
    }

    $('#status-produk').change(function(e) {
        var status = $("#status-produk").find(':selected').val();
        if (status == 'PROMO') {
            $('#diskon').removeAttr('readonly', true).removeClass('input_disabled');
            $('#tgl-akhir-promo').removeAttr('disabled', true).removeClass('input_disabled');
            $('#jam-akhir-promo').removeAttr('disabled', true).removeClass('input_disabled');

        } else {
            $('#diskon').attr('readonly', true).addClass('input_disabled').val('');
            $('#hrg-diskon').attr('readonly', true).addClass('input_disabled').val('');
            $('#tgl-akhir-promo').attr('disabled', true).addClass('input_disabled');
            $('#jam-akhir-promo').attr('disabled', true).addClass('input_disabled').val('');
        }
    });

    $("#btn-simpan-harga-produk").click(function(e) {
        e.preventDefault();
        var status = $("#status-produk").find(':selected').val();
        var tgl = $('#tgl-akhir-promo').val();
        var jam = $('#jam-akhir-promo').val();
        if (status == 'PROMO') {
            $('#tgl-akhir').val(tgl);
            $('#jam-akhir').val(jam);
        } else {
            $('#tgl-akhir').val('');
            $('#jam-akhir').val('');
        }
        var val_simpan_hrg_produk = $("#btn-simpan-harga-produk").val();
        var id_hrg_produk = $("#id-jenis-produk-harga").find(':selected').val();
        var status = $("#status-produk").find(':selected').val();
        let formData = new FormData();
        formData.append('id-hrg', $('#id-hrg').val());
        formData.append('id-hrg-produk', id_hrg_produk);
        formData.append('status-produk', status);
        formData.append('hrg-awal', $('#hrg-awal').val());
        formData.append('diskon', $('#diskon').val());
        formData.append('hrg-diskon', $('#hrg-diskon').val());
        formData.append('all-size', $('#all-size').val());
        formData.append('small', $('#small').val());
        formData.append('medium', $('#medium').val());
        formData.append('large', $('#large').val());
        formData.append('extra-large', $('#extra-large').val());
        formData.append('extra2-large', $('#extra2-large').val());
        formData.append('tgl-akhir-promo', $('#tgl-akhir').val());
        formData.append('jam-akhir-promo', $('#jam-akhir').val());
        if (val_simpan_hrg_produk == 'simpan-harga-produk') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('olah_data/simpan_harga_produk'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    // alert(msg);
                    alert("Data harga produk berhasil di simpan.");
                    $('#form-harga-produk').attr('hidden', true);
                    $('.form-data').load(
                        '<?php echo site_url('Olah_data/harga_produk'); ?>');
                    form_harga_produk();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('olah_data/edit_harga_produk') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert(msg);
                    alert("Edit data harga produk berhasil di simpan.");
                    $('#form-harga-produk').attr('hidden', true);
                    $('.form-data').load(
                        '<?php echo site_url('Olah_data/harga_produk'); ?>');
                    form_harga_produk();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });

    $('.loader-insert-foto').hide();
    $("#btn-simpan-foto-produk").submit(function(e) {
        // alert('ya');
        e.preventDefault();
        var val_simpan = $("#btn-simpan-foto-produk").val();
        var val_ceklis_ubah = $('#val-ceklis-ubah').val();
        var id_fotjp = $("#id-jenis-produk-foto").find(':selected').val();
        var status_foto = $("#status-foto").find(':selected').val();
        var id_status_foto = $("#status-foto").find(':selected').data('id');
        const foto_produk = $('#fot_produk').prop('files')[0];
        if (id_fotjp == '0') {
            Toast.fire({
                type: 'error',
                title: 'Jenis produk tidak boleh kosong!!'
            })
        } else {
            $("#submit-simpan-foto").attr('disabled', true);
            $('.loader-insert-foto').show();

            let formData = new FormData();
            formData.append('id-fotpro', $('#id-fotpro').val());
            formData.append('id-fotjp', id_fotjp);
            formData.append('fot_produk', foto_produk);
            formData.append('texture', $('#texture').val());
            formData.append('status-foto', status_foto);
            formData.append('id-status-foto', id_status_foto);
            formData.append('fotlama', $('#fotlama').val());
            if (val_simpan == 'simpan-foto-produk') {
                //alert('tess')
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('olah_data/simpan_foto_produk'); ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        Toast.fire({
                            type: 'success',
                            title: 'Foto produk berhasil di simpan'
                        })
                        $("#submit-simpan-foto").removeAttr('disabled', true)
                        $('.loader-insert-foto').hide();
                        $('#form-foto-produk').attr('hidden', true);
                        load_data_foto();

                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    },
                });
                setInterval(function() { //setInterval() metode mengeksekusi pada setiap interval sampai disebut clearInterval()
                    $('#load_tweets').load("fetch.php").fadeIn("slow");
                    //load() metode mengambil data dari halaman fetch.php
                }, 1000);
                return false;
            } else {
                if (val_ceklis_ubah == 'edit-foto') {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('olah_data/edit_foto_produk') ?>",
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(msg) {
                            Toast.fire({
                                type: 'success',
                                title: 'Foto berhasil di update'
                            });
                            $("#submit-simpan-foto").removeAttr('disabled', true)
                            $('.loader-insert-foto').hide();
                            $('#ceklis-ubah-fotpro').prop('checked', false);
                            $('#form-foto-produk').attr('hidden', true);
                            load_data_foto();
                        },
                        error: function() {
                            alert("Data Gagal Diupload");
                        }
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('olah_data/edit_fotoproduk') ?>",
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(msg) {
                            Toast.fire({
                                type: 'success',
                                title: 'Foto berhasil di update'
                            });
                            $("#submit-simpan-foto").removeAttr('disabled', true)
                            $('.loader-insert-foto').hide();
                            $('#form-foto-produk').attr('hidden', true);
                            load_data_foto();
                        },
                        error: function() {
                            alert("Data Gagal Diupload");
                        }
                    });
                }

            }
        }

    });

    $('.btn-batal').click(function(e) {
        $('#form-pengaturan').attr('hidden', true);
        $('#form-edit-pengaturan #name').val('');
        $('#form-edit-pengaturan #value').val('');
    });

    $('#btn-batal-pengaturan').click(function() {
        event.preventDefault();
        $('#form-pengaturan').attr('hidden', true);
    })

    $('#submit-simpan-pengaturan').click(function() {
        event.preventDefault();
        var formData = new FormData($("#form-edit-pengaturan")[0]);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('olah_data/update_pengaturan') ?>",
            data: formData,
            processData: false,
            contentType: false,
            success: function(msg) {
                if (msg.status) {
                    $('#form-pengaturan').attr('hidden', true);
                    $('.form-data').load('<?php echo site_url('Olah_data/pengaturan'); ?>');
                    alert(msg.message);
                } else {
                    alert(msg.message);
                }
                return;
            },
            error: function() {
                alert("Data Gagal Diupdate");
            }
        });
    });

    $(document).on("click", ".pilih-fot-produk", function() {
        var file = $(this).parents().find(".file-produk");
        file.trigger("click");
    });

    $('#fot_produk').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-fot-produk").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-fot-produk").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $('#ceklis-ubah-fotpro').click(function(e) {
        if ($(this).is(":checked")) {
            // profesi.push($(this).val());
            $('#fot_produk, .pilih-fot-produk').removeAttr('disabled');
            $('#val-ceklis-ubah').val('edit-foto');
            // alert($('#id-fotpro').val());
        } else {
            $('#fot_produk, .pilih-fot-produk').attr('disabled', true);
            $('#val-ceklis-ubah').val('');
        }
    });

    function load_data_foto() {
        var select_produk = $("#select-nm-produk").find(':selected').val();
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('Olah_data/foto_produk') ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.form-data').html(data);
                $('#select-nm-produk').val(select_produk);
                if (select_produk == '0') {
                    $('.tr-foto-produk').show();

                } else {
                    $('.tr-foto-produk').hide();
                    $('.tr-foto-' + select_produk).show();
                }
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function form_jenis_produk() {
        var id_jp = $('#id-jp').val('');
        var nm_jp = $('#nm-jp').val('');
        var desk = $('#desk').val('');
        $("#kategori, option[value='0']").attr("selected", "selected");
        $('#status-produk').prop('checked', false);

    }

    function form_harga_produk() {
        var hrg_awal = $('#hrg-awal').val('');
        var diskon = $('#diskon').val('');
        var hrg_diskon = $('#hrg-diskon').val('');
        var all_size = $('#all-size').val('').prop('checked', false);
        var small = $('#small').val('').prop('checked', false);
        var medium = $('#medium').val('').prop('checked', false);
        var large = $('#large').val('').prop('checked', false);
        var extra_large = $('#extra-large').val('').prop('checked', false);
        $('.cheklis-size').prop('checked', false);
    }

    var header = document.getElementById("menu-admin");
    var btns = header.getElementsByClassName("btn_1");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("btn-menu-active");
            current[0].className = current[0].className.replace(" btn-menu-active", "");
            this.className += " btn-menu-active";
        });
    }
});

// foto bannerr select //////////////////////////////////////////////////////////////////////////////////////////////////
$('#klik-ke').hide();
$('#produk').hide();
$('#produkLabel').hide();
$('#kategoriLabel').hide();
$('#kategory').hide();
$('#klikkelabel').hide();

$('#layout').change(function() {
    var selectedValue = $(this).val();
    var kategoriLabel = $('#kategoriLabel');
    var kategoriSelect = $('#kategory');
    var kategorike = $('#klik-ke');
    var produk = $('#produk');
    var produklabel = $('#produkLabel');
    var kategoriLabel = $('#kategoriLabel');
    var klikkelabel = $('#klikkelabel');

    if (selectedValue === 'Banner') {
        kategoriLabel.text('Kategori Banner');
        $('#klik-ke').html('<option value="">Pilih Banner*</option>' +
            '<option value="kategori">Kategori*</option>' +
            '<option value="produk">Produk</option>');

        klikkelabel.show();
        kategorike.show();
        kategoriLabel.hide();
        kategoriSelect.hide();
        produklabel.hide();
        produk.hide();

    } else if (selectedValue === 'Etalase') {
        kategoriLabel.text('Kategori Etalase');
        $('#kategory').html('<option value="">Pilih Kategori Etalase*</option>' +
            '<option value="girl">Girl</option>' +
            '<option value="boy">Boys</option>' +
            '<option value="adult">Adult</option>');

        kategoriLabel.show();
        kategoriSelect.show();
        klikkelabel.hide();
        kategorike.hide();
        produklabel.hide();
        produk.hide();
    } else {

    }
});

$('#klik-ke').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue === 'kategori') {
        $.ajax({
            url: "<?php echo site_url('Olah_data/select_categori'); ?>",
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#kategory').html(data)
                $('#kategoriLabel').show();
                $('#kategory').show();
                $('#produkLabel').hide();
                $('#produk').hide();
            },
            error: function() {
                alert("Data Gagal Diupload");
            },
        });

    } else if (selectedValue === 'produk') {
        $.ajax({
            url: "<?php echo site_url('Olah_data/select_prod'); ?>",
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#produk').html(data)
                $('#produkLabel').show();
                $('#produk').show();
                $('#kategoriLabel').hide();
                $('#kategory').hide();
            },

            error: function() {
                alert("Data Gagal Diupload");
            },
        });
    }
});

// akhir foto bannerr select //////////////////////////////////////////////////////////////////////////////////////////////////

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

// Simpan data banner

$('.loader-insert-foto').hide();
$("#btn-simpan-foto-banner").submit(function(e) {
    e.preventDefault();

    var val_submit = $("#btn-simpan-foto-banner").val();
    var id_banner = $("#id-banner").find(':selected').val();
    var layout = $("#layout").find(':selected').val();
    var kategori = $("#kategory").find(':selected').val();
    var klik_ke = $("#klik-ke").find(':selected').val();
    var produk = $("#produk").find(':selected').val();
    const foto_ban = $('#foto').prop('files')[0];

    if (id_banner == '0') {
        Toast.fire({
            type: 'error',
            title: 'Jenis produk tidak boleh kosong!!'
        })
    } else {
        $("#submit-simpan-banner").attr('disabled', true);
        $('.loader-insert-foto').show();

        let formData = new FormData();

        formData.append('id_banner', id_banner);
        formData.append('layout', $('#layout').val());
        formData.append('foto_banner', foto_ban);
        formData.append('kategory', kategori);
        formData.append('klik_ke', klik_ke);
        formData.append('id_produk', produk);
        formData.append('fotolama', $('#fotolama').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Olah_data/simpan_foto_banner'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
                var data = JSON.parse(response);

                if (data.success) {
                    Toast.fire({
                        type: 'success',
                        title: 'Foto Banner Berhasil di Simpan'
                    })
                    $("#submit-simpan-banner").removeAttr('disabled', true);
                    $('.loader-insert-foto').hide();
                    $('#form-foto-banner').attr('hidden', true);
                    load_data_fotban();
                } else {
                    Toast.fire({
                        type: 'success',
                        title: 'Foto Banner Berhasil di Simpan'
                    })
                }
            },
            error: function() {
                alert("Data Gagal Diupload");
            },
        });
    }
});


// edit banner
// $('.loader-insert-foto').hide();
// $("#btn-simpan-foto-banner").on('submit', function(e) {
//     e.preventDefault();
//     var id_banner = $("#id_banner").val();
//     var val_ceklis_banner = $('#val-ceklis-banner').val();
//     var kategori = $("#kategory").find(':selected').val();
//     var layout = $("#layout").find(':selected').val();
//     var foto = $('#foto')[0].files[0];

//     if (id_banner == '0') {
//         Toast.fire({
//             type: 'error',
//             title: 'Jenis produk tidak boleh kosong!!'
//         });
//     } else {
//         $("#submit-simpan-banner").attr('disabled', true);
//         $('.loader-insert-foto').show();

//         var formData = new FormData();
//         formData.append('id_banner', id_banner);
//         formData.append('kategori', $('#kategory').val());
//         formData.append('foto_banner', foto);
//         formData.append('layout', $('#layout').val());
//         formData.append('fotolama', $('#fotolama').val());

//         if (val_ceklis_banner == 'edit-fotben') {
//             $.ajax({
//                 type: 'POST',
//                 url: "<?php echo site_url('Olah_data/edit_foto_banner'); ?>",
//                 data: formData,
//                 cache: false,
//                 processData: false,
//                 contentType: false,
//                 success: function(msg) {
//                     Toast.fire({
//                         type: 'success',
//                         title: 'Banner berhasil di update'
//                     });
//                     $("#submit-simpan-banner").removeAttr('disabled', true);
//                     $('.loader-insert-foto').hide();
//                     $('#ceklis-ubah-fotban').prop('checked', false);
//                     $('#form-foto-banner').attr('hidden', true);
//                     load_data_fotban();
//                 },
//                 error: function() {
//                     alert("Data Gagal Simpan");
//                 }
//             });
//         } else {
//             $.ajax({
//                 type: 'POST',
//                 url: "<?php echo site_url('Olah_data/edit_fotobanner'); ?>",
//                 data: formData,
//                 cache: false,
//                 processData: false,
//                 contentType: false,
//                 success: function(response) {
//                     Toast.fire({
//                         type: 'success',
//                         title: 'Foto berhasil di update'
//                     });
//                     $("#submit-simpan-banner").removeAttr('disabled', true);
//                     $('.loader-insert-foto').hide();
//                     $('#form-foto-banner').attr('hidden', true);
//                     load_data_fotban();
//                 },
//                 error: function() {
//                     alert("Data Gagal UPdate");
//                 }
//             });
//         }
//     }
// });
// akhir edit bannerr

$(document).on("click", ".pilih-fot-banner", function() {
    var file = $(this).parents().find(".file-banner");
    file.trigger("click");
});

$('#foto').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#nm-foto").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById("preview-fot-banner").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
});

$('#ceklis-ubah-fotban').click(function(e) {
    if ($(this).is(":checked")) {
        $('#foto, .pilih-fot-banner').removeAttr('disabled');
        $('#val-ceklis-banner').val('edit-fotben');
    } else {
        $('#foto, .pilih-fot-banner').attr('disabled', true);
        $('#val-ceklis-banner').val('');
    }
});

function load_data_fotban() {
    var select_produk = $("#select-nm-banner").find(':selected').val();
    $.ajax({
        url: "<?php echo site_url('Olah_data/foto_banner') ?>",
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
            $('.form-data').html(data);
            $('#select-nm-banner').val(select_produk);
            if (select_produk == '0') {
                $('.tr-foto-banner').show();

            } else {
                $('.tr-foto-banner').hide();
                $('.tr-foto-' + select_produk).show();
            }
        },
        error: function() {
            alert("Data Gagal Diupload");
        }
    });
}


$(function() {
    $('.select2').select2()
});


// Quotes edit

$('.loader-insert-foto').hide();
$("#btn-simpan-foto-quote").on('submit', function(e) {
    e.preventDefault();
    var id = $("#id").val();
    var val_ceklis_quote = $('#val-ceklis-quote').val();
    var gambar = $('#gambar')[0].files[0];

    if (id === '0') {
        Toast.fire({
            type: 'error',
            title: 'Quote tidak boleh kosong!!'
        });
    } else {
        $("#submit-simpan-quote").attr('disabled', true);
        $('.loader-insert-foto').show();

        var formData = new FormData();
        formData.append('id', id);
        formData.append('judul_quots', $('#judul_quots').val());
        formData.append('gambar', gambar);
        formData.append('fotold', $('#fotold').val());

        if (val_ceklis_quote == 'edit-gambar') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Olah_data/edit_foto_quote') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    Toast.fire({
                        type: 'success',
                        title: 'Gambar berhasil diupdate'
                    });
                    $("#submit-simpan-quote").removeAttr('disabled');
                    $('.loader-insert-foto').hide();
                    $('#ceklis-ubah-quote').prop('checked', false);
                    $('#form-foto-quote').attr('hidden', true);
                    load_data_quots();
                },
                error: function() {
                    alert("Data Gagal Simpan");
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Olah_data/edit_fotoquote') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    Toast.fire({
                        type: 'success',
                        title: 'Data berhasil diupdate'
                    });
                    $("#submit-simpan-quote").removeAttr('disabled');
                    $('.loader-insert-foto').hide();
                    $('#form-foto-quote').attr('hidden', true);
                    load_data_quots();
                },
                error: function() {
                    alert("Data Gagal Simpan");
                }
            });
        }
    }
});


$(document).on("click", ".pilih-quote", function() {
    var file = $(this).parents().find(".file-quote");
    file.trigger("click");
});


$('#gambar').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#nm-fot-quote").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById("preview-fot-quote").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
});

$('#ceklis-ubah-quote').click(function(e) {
    if ($(this).is(":checked")) {
        $('#gambar, .pilih-quote').removeAttr('disabled');
        $('#val-ceklis-quote').val('edit-gambar');
    } else {
        $('#gambar, .pilih-quote').attr('disabled', true);
        $('#val-ceklis-quote').val('');
    }
});

function load_data_quots() {
    var select_quote = $("#select-nm-quote").find(':selected').val();
    $.ajax({
        url: "<?php echo site_url('Olah_data/quots') ?>",
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
            $('.form-data').html(data);
            $('#select-nm-quote').val(select_quote);
            if (select_quote == '0') {
                $('.tr-foto-quote').show();

            } else {
                $('.tr-foto-quote').hide();
                $('.tr-foto-' + select_quote).show();
            }
        },
        error: function() {
            alert("Data Gagal Ditampilkan");
        }
    });
    // Akhir quotes edit
}
</script>