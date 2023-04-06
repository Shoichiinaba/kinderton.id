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
            content: "NAMA";
        }

        td:nth-of-type(2):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "VALUE";
        }
    }
</style>

<div id="dtjp" class="min-height box_account ">
    <div class="form_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h5>Data Pengaturan</h5>
            </div>
        </div>
        <!-- <div class="row"> -->
        <div class="card-body table-responsive p-0" style="height: 330px;">
            <table role="table" class="table table-head-fixed  table-striped text-nowrap table-hover">
                <thead role="rowgroup">
                    <tr role="row">
                        <th scope="col" role="columnheader">NAMA</th>
                        <th scope="col" role="columnheader">VALUE</th>
                        <th scope="col" role="columnheader">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pengaturan as $data) :
                    ?>
                        <tr role="row">
                            <td role="cell" scope="col"> <?php echo $data->name; ?></td>
                            <td role="cell" scope="col"> <?php echo $data->value; ?></td>
                            <td role="cell" scope="col">
                                <a href="#page">
                                    <button type="button" class="btn btn-xs bg-gradient-info elevation-3 btn-edit-pengaturan" id="" data-id-p="<?php echo $data->id; ?>" data-nm-p="<?php echo $data->name; ?>" data-val-p="<?php echo $data->value; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i> Lihat & Edit Detail
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach
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

        $('.btn-edit-pengaturan').click(function(e) {
            // $("#btn-simpan-jenis-produk").val('edit-jenis-produk');
            $('#form-pengaturan').removeAttr('hidden', true);
            $('#form-edit-pengaturan #name').val($(this).attr('data-nm-p'));
            $('#form-edit-pengaturan #value').val($(this).attr('data-val-p'));
            $('#form-edit-pengaturan #id').val($(this).attr('data-id-p'));

        });
        
    });
</script>