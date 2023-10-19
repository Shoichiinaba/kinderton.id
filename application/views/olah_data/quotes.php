<style>
@media only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px) {

    /* Force table to not be like tables anymore */
    table,
    thead,
    tbody,
    th,
    td,
    tr {
        display: block !important;
    }

    /* Hide table headers (but not display: none !important;, for accessibility) */
    thead tr {
        position: absolute !important;
        top: -9999px !important;
        left: -9999px !important;
    }

    tr {
        margin: 0 0 1rem 0 !important;
    }

    td {
        /* Behave  like a "row" */
        border: none !important;
        border-bottom: 1px solid #eee !important;
        position: relative !important;
        padding-left: 40% !important;
    }

    td:before {
        /* Now like a table header */
        position: absolute !important;
        /* Top/left values mimic padding */
        top: 0 !important;
        left: 6px !important;
        /* width: 45% !important; */
        /* padding-right: 0px !important; */
        white-space: nowrap !important;
    }

    /*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/

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
<div id="form-foto-quote" class="min-height box_account ">
    <div class="form_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h5>Data Quotes</h5>
            </div>
        </div>
        <!-- <div class="row"> -->
        <div class="card-body table-responsive p-0" style="height: 330px;">
            <table role="table" class="table table-head-fixed  table-striped text-nowrap table-hover">
                <thead role="rowgroup">
                    <tr role="row">
                        <th scope="col" role="columnheader">NO</th>
                        <th scope="col" role="columnheader">QUOTES</th>
                        <th scope="col" role="columnheader">BECKROUND</th>
                        <th scope="col" role="columnheader">ACTION</th>
                    </tr>
                </thead>
                <tbody id="data-foto">
                    <?php $no= 0; foreach ($quote as $data ): $no++;?>

                    <tr id="" class="tr-foto-quots tr-foto-<?php echo $data->id; ?>">
                        <td><?php echo $no; ?></td>
                        <td role="cell" scope="col"><?php echo $data->judul_quots; ?></td>
                        <td role="cell" scope="col"><img
                                src="<?php echo base_url('upload'); ?>/quots/<?php echo $data->gambar; ?>" id=""
                                class="img-thumbnail max-height-5rem">
                        </td>
                        <td role="cell" scope="col">
                            <a href="#page">
                                <button type="button" class="btn btn-xs bg-gradient-info elevation-3 btn-edit-quote"
                                    id="" data-id="<?php echo $data->id; ?>"
                                    data-judul_quots="<?php echo $data->judul_quots; ?>"
                                    data-gambar="<?php echo $data->gambar; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <hr>
    </div>
    <!-- /form_container -->
</div>

<script>
$(document).ready(function() {
    $('#select-nm-quote').change(function(e) {
        var id = $("#select-nm-quote").find(':selected').val();
        if (id == '0') {
            $('.tr-foto-quote').show();

        } else {
            $('.tr-foto-quote').hide();
            $('.tr-foto-' + id).show();
        }
    });

    $('.btn-edit-quote').click(function(e) {
        $('#form-foto-quote').removeAttr('hidden', true);
        $('#ceklis-ubah-gambar').removeAttr('hidden', true);
        $('#gambar, .pilih-quote').attr('disabled', true);

        var id = $(this).data('id');
        var gambar = $(this).data('gambar');
        var judul_quots = $(this).data('judul_quots');

        $('#id').val($(this).data('id'));
        $('#judul_quots').val($(this).data('judul_quots'));
        $('#preview-fot-quote').attr({
            src: "<?php echo base_url('upload'); ?>/quots/" + gambar + ""
        });

        $('#fotold').val(gambar);
    });


    $('#btn-form-foto-quote').click(function(e) {
        $('#form-foto-quote').removeAttr('hidden', true);
        $("#btn-simpan-foto-quote").val('simpan-foto-produk');
        $('#gambar, .pilih-quote').removeAttr('disabled', true);
        $('#preview-fot-quote').attr({
            src: "<?php echo base_url('assets'); ?>/img/80x80.png"
        });
        $('#ceklis-ubah-gambar').attr('hidden', true);

        // alert('yaa')
    });

    $('#btn-batal-quote').click(function(e) {
        $('#form-foto-quote').attr('hidden', true);
    });

});
</script>