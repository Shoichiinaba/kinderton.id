<style>
@media only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px) {

    table,
    thead,
    tbody,
    th,
    td,
    tr {
        display: block !important;
    }

    thead tr {
        position: absolute !important;
        top: -9999px !important;
        left: -9999px !important;
    }

    tr {
        margin: 0 0 1rem 0 !important;
    }

    td {
        border: none !important;
        border-bottom: 1px solid #eee !important;
        position: relative !important;
        padding-left: 40% !important;
    }

    td:before {
        position: absolute !important;
        top: 0 !important;
        left: 6px !important;
        white-space: nowrap !important;
    }

    td:nth-of-type(1):before {
        padding-top: 12px;
        font-weight: bolder;
        content: "PRODUK";
    }

    td:nth-of-type(2):before {
        padding-top: 12px;
        font-weight: bolder;
        content: "FOTO";
    }

    td:nth-of-type(3):before {
        padding-top: 12px;
        font-weight: bolder;
        content: "TEXTURE";
    }

    td:nth-of-type(4):before {
        padding-top: 12px;
        font-weight: bolder;
        content: "LAYOUT";
    }

    td:nth-of-type(5):before {
        padding-top: 12px;
        font-weight: bolder;
        content: "ACTION";
    }

}
</style>
<div id="form-foto-banner" class="min-height box_account ">
    <div class="form_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h5>Data Foto Banner</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <select class="form-control select2 height-2rem p-2px" id="select-nm-banner">
                                <option value="0">Filter Layout</option>
                                <?php
                                foreach ($lay_etalase as $lay) :
                                ?>
                                <option value="<?php echo $lay->layout; ?>"><?php echo $lay->layout; ?>
                                </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                        <button type="button" id="btn-form-foto-banner"
                            class="btn btn-sm bg-info float-right col-12">Tambah Banner</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row"> -->
        <div class="card-body table-responsive p-0" style="height: 330px;">
            <table role="table" class="table table-head-fixed  table-striped text-nowrap table-hover">
                <thead role="rowgroup">
                    <tr role="row">
                        <th scope="col" role="columnheader">LAYOUT</th>
                        <th scope="col" role="columnheader">KATEGORI</th>
                        <th scope="col" role="columnheader">FOTO</th>
                        <th scope="col" role="columnheader">ACTION</th>
                    </tr>
                </thead>
                <tbody id="data-foto">
                    <?php
                    foreach ($foto_banner as $ban) {
                    ?>
                    <tr id="" class="tr-foto-banner tr-foto-<?php echo $ban->layout; ?>">

                        <td role="cell" scope="col"><?php echo $ban->layout; ?></td>
                        <td role="cell" scope="col"><?php echo $ban->kategori; ?></td>
                        <td role="cell" scope="col"><img
                                src="<?php echo base_url('upload'); ?>/banner/<?php echo $ban->foto; ?>" id=""
                                class="img-thumbnail max-height-5rem">
                        </td>
                        <td role="cell" scope="col">
                            <!-- tombol -->
                            <a href="#page">
                                <button type="button"
                                    class="btn btn-xs bg-gradient-info elevation-3 btn-edit-foto-banner" id=""
                                    data-id-banner="<?php echo $ban->id_banner; ?>"
                                    data-layout="<?php echo $ban->layout; ?>"
                                    data-kategori="<?php echo $ban->kategori; ?>" data-foto="<?php echo $ban->foto; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                            </a>

                            <button type="button" data-id=""
                                class="btn btn-xs bg-gradient-danger elevation-3 hapus-foto-banner"
                                data-id-banner="<?php echo $ban->id_banner; ?>"
                                data-fotolama="<?php echo $ban->foto; ?>">
                                <i class="fas fa-trash-alt mr-1"></i>Delete
                            </button>
                            <!-- akhir tombol -->
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
    </div>
    <!-- /form_container -->
</div>

<script>
$(document).ready(function() {
    $('#select-nm-banner').change(function(e) {
        var id = $("#select-nm-banner").find(':selected').val();
        if (id == '0') {
            $('.tr-foto-banner').show();

        } else {
            $('.tr-foto-banner').hide();
            $('.tr-foto-' + id).show();
        }
    });

    $('.btn-edit-foto-banner').click(function(e) {
        $('#form-foto-banner').removeAttr('hidden', true);
        $('#ceklis-ubah-banner').removeAttr('hidden', true);
        $('#foto_banner, .pilih-foto-banner').attr('disabled', true);

        var id_banner = $(this).data('id-banner');
        var layout = $(this).data('layout');
        var kategori = $(this).data('kategori');
        var foto = $(this).data('foto');
        $("#id-banner, option[value='" + id_banner + "']").attr("selected", "selected");
        $("#layout, option[value='" + layout + "']").attr("selected", "selected");
        $("#kategory, option[value='" + kategori + "']").attr("selected", "selected");
        $('#preview-fot-banner').attr({
            src: "<?php echo base_url('upload'); ?>/banner/" + foto + ""
        });

        $('#fotolama').val(foto);
        $('#id-banner').val($(this).data('id-banner'));
    });

    $('.hapus-foto-banner').click(function(e) {
        var el = this;

        // Delete id
        var id_banner = $(this).data('id-banner');
        var fotolama = $(this).data('fotolama');
        $('#id-banner').val(id_banner);
        var confirmalert = confirm("Yakin Untuk Hapus?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-banner', id_banner);
            formData.append('fotolama', fotolama);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('olah_data/hapus_foto_banner') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                    });
                }
            });
        }
    });

    $('#btn-form-foto-banner').click(function(e) {
        $('#form-foto-banner').removeAttr('hidden', true);
        $("#btn-simpan-foto-banner").val('simpan-foto-produk');
        $('#foto_banner, .pilih-foto-banner').removeAttr('disabled', true);
        $('#preview-fot-banner').attr({
            src: "<?php echo base_url('assets'); ?>/img/80x80.png"
        });
        $('#ceklis-ubah-banner').attr('hidden', true);

        // alert('yaa')
    });
    $('#btn-batal-foto-banner').click(function(e) {
        $('#form-foto-banner').attr('hidden', true);
    });

});
</script>