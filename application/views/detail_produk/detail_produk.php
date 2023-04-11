<main>
    <div class="container margin_30 pt-5rem">
        <?php
        foreach ($jenis_produk as $data_jp) {
            $id_jp = $data_jp->id_jp;
        ?>
            <?php
            $sql = "SELECT * FROM harga_produk WHERE id_hrg_produk = $id_jp  ORDER BY hrg_awal DESC limit 1";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $promo) {

            ?>
                    <p class="status-produk" hidden><?php echo $data_jp->status_produk; ?></p>
                    <p class="tgl-akhir-promo" hidden><?php echo $data_jp->tgl_akhir_promo; ?></p>
                    <p class="jam-akhir-promo" hidden><?php echo $data_jp->jam_akhir_promo; ?></p>

                    <?php if ($data_jp->status_produk == 'PROMO') { ?>
                        <div class="countdown_inner"><span>-<?php echo $promo->diskon; ?>% This offer ends in <span id="countdown-detail"></span></span>

                        </div>
                    <?php
                    } else {
                    }
                    ?>
            <?php
                }
            }
            ?>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main ">
                            <?php
                            $sql = "SELECT *FROM foto_produk WHERE id_fotjp = $id_jp ORDER BY id_status_foto ASC";
                            $query = $this->db->query($sql);
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $data_foto) :
                            ?>
                                <?php
                                    if ($data_foto->id_status_foto == '1') { ?>
                                       <div style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $data_foto->fotpro; ?>);" class="item-box">
                                        <?php
                                        if ($data_foto->texture == '-') {
                                        } else { ?>
                                            <h4 class="label-texture"><?php echo $data_foto->texture; ?></h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>

                                <?php
                                    if ($data_foto->id_status_foto == '2') { ?>
                                       <div style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $data_foto->fotpro; ?>);" class="item-box">
                                        <?php
                                        if ($data_foto->texture == '-') {
                                        } else { ?>
                                            <h4 class="label-texture"><?php echo $data_foto->texture; ?></h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>

                                <?php
                                    if ($data_foto->id_status_foto == '3') { ?>
                                       <div style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $data_foto->fotpro; ?>);" class="item-box">
                                        <?php
                                        if ($data_foto->texture == '-') {
                                        } else { ?>
                                            <h4 class="label-texture"><?php echo $data_foto->texture; ?></h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>

                                <?php
                                    if ($data_foto->id_status_foto == '4') { ?>
                                       <div style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $data_foto->fotpro; ?>);" class="item-box">
                                        <?php
                                        if ($data_foto->texture == '-') {
                                        } else { ?>
                                            <h4 class="label-texture"><?php echo $data_foto->texture; ?></h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>

                                <?php
                                    if ($data_foto->status_foto == 'keunggulan') { ?>
                                       <div style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $data_foto->fotpro; ?>);" class="item-box">
                                        <?php
                                        if ($data_foto->texture == '-') {
                                        } else { ?>
                                            <h4 class="label-texture"><?php echo $data_foto->texture; ?></h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                            <?php
                                endforeach;
                            }
                            ?>
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            <?php
                            $sql = "SELECT *FROM foto_produk WHERE id_fotjp = $id_jp ORDER BY id_status_foto ASC";
                            $query = $this->db->query($sql);
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $data_foto) {
                            ?>
                                <?php
                                    if ($data_foto->id_status_foto == '1') { ?>
                                        <div id="texture-<?php echo $data_foto->id_fotpro; ?>" style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $data_foto->fotpro; ?>);" class="item active"></div>
                                    <?php } else { ?>
                                <?php } ?>
                                <?php
                                    if ($data_foto->id_status_foto == '2') { ?>
                                        <div id="texture-<?php echo $data_foto->id_fotpro; ?>" style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $data_foto->fotpro; ?>);" class="item active"></div>
                                    <?php } else { ?>
                                <?php } ?>
                                <?php
                                    if ($data_foto->id_status_foto == '3') { ?>
                                        <div id="texture-<?php echo $data_foto->id_fotpro; ?>" style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $data_foto->fotpro; ?>);" class="item active"></div>
                                    <?php } else { ?>
                                <?php } ?>
                                <?php
                                    if ($data_foto->id_status_foto == '4') { ?>
                                        <div id="texture-<?php echo $data_foto->id_fotpro; ?>" style="background-image: url(<?php echo base_url('upload'); ?>/<?php echo $data_foto->fotpro; ?>);" class="item active"></div>
                                    <?php } else { ?>
                                <?php } ?>

                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- /page_header -->
                <div class="prod_info">
                    <?php
                    foreach ($jenis_produk as $data_jp) {
                        $id_jp = $data_jp->id_jp;
                    ?>
                        <h1 id="nm-produk"><?php echo $data_jp->nm_jp; ?></h1>
                        <input type="hidden" id="berat-produk" value="<?php echo $data_jp->berat_produk; ?>">
                        <input type="hidden" id="id-produk-addtocart" value="<?php echo $data_jp->id_jp; ?>">
                        <p><small><?php echo $data_jp->kategori; ?> || <?php echo $data_jp->gender; ?></small><br><?php echo $data_jp->desk; ?></p>
                        <div class="prod_options">
                            <div class="row">
                                <label class="col-lg-5  col-md-6 col-6 pt-0"><strong>Varian</strong></label>
                                <div class="col-lg-5 col-md-6 col-6 mb-1">
                                    <div class="custom-select-form">
                                        <select class="wide" id="select-texture-addtocart">
                                            <?php
                                            $sql = "SELECT * FROM foto_produk WHERE id_fotjp = $id_jp AND status_foto = 'display'";
                                            $query = $this->db->query($sql);
                                            if ($query->num_rows() > 0) {
                                                foreach ($query->result() as $data_texture) {
                                                    if ($data_texture->texture == '-') {
                                                    } else {
                                            ?>
                                                    <option value="<?php echo $data_texture->fotpro; ?>" id="<?php echo $data_texture->id_fotpro; ?>"><?php echo $data_texture->texture; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-5 col-md-6 col-6"><strong>Ukuran</strong>
                                    <a href="#0" data-toggle="modal" data-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                                <div class="col-lg-5 col-md-6 col-6">
                                    <!-- <div class="form-group"> -->
                                    <select class="form-control select2 " id="select-size-addtocart" name="">
                                        <?php
                                        $sql = "SELECT *FROM harga_produk WHERE id_hrg_produk = $id_jp";
                                        $query = $this->db->query($sql);
                                        if ($query->num_rows() > 0) {
                                            foreach ($query->result() as $data_size) {
                                        ?>
                                                <?php
                                                if ($data_size->all_size == 'All Size') { ?>
                                                    <option value="<?php echo $data_size->id_hrg; ?>" data-diskon="<?php echo $data_size->diskon; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->all_size; ?></option>
                                                <?php } else { ?>
                                                <?php } ?>

                                                <?php
                                                if ($data_size->small == 'S') { ?>
                                                    <option value="<?php echo $data_size->id_hrg; ?>" data-diskon="<?php echo $data_size->diskon; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->small; ?></option>
                                                <?php } else { ?>
                                                <?php } ?>

                                                <?php
                                                if ($data_size->medium == 'M') { ?>
                                                    <option value="<?php echo $data_size->id_hrg; ?>" data-diskon="<?php echo $data_size->diskon; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->medium; ?></option>
                                                <?php } else { ?>
                                                <?php } ?>

                                                <?php
                                                if ($data_size->large == 'L') { ?>
                                                    <option value="<?php echo $data_size->id_hrg; ?>" data-diskon="<?php echo $data_size->diskon; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->large; ?></option>
                                                <?php } else { ?>
                                                <?php } ?>

                                                <?php
                                                if ($data_size->extra_large == 'XL') { ?>
                                                    <option value="<?php echo $data_size->id_hrg; ?>" data-diskon="<?php echo $data_size->diskon; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->extra_large; ?></option>
                                                <?php } else { ?>
                                                <?php } ?>
                                                <?php
                                                if ($data_size->extra2_large == 'XXL') { ?>
                                                    <option value="<?php echo $data_size->id_hrg; ?>" data-diskon="<?php echo $data_size->diskon; ?>" data-hrg-diskon="<?php echo $data_size->hrg_diskon; ?>" data-hrg-awal="<?php echo $data_size->hrg_awal; ?>"><?php echo $data_size->extra2_large; ?></option>
                                                <?php } else { ?>
                                                <?php } ?>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-5  col-md-6 col-6"><strong>Jumlah</strong></label>
                                <div class="col-lg-5 col-md-6 col-6">
                                    <div class="number-qty">
                                        <input type="text" class="input-qty quantity" value="1">
                                        <button id="" class="dec decrease-btn-addtocart btn-qty">-</button>
                                        <button id="" class="inc increase-btn-addtocart btn-qty">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-6">
                                <div class="price_main text-left">
                                    <strong class="new_price">Rp. <strong class="new-price-addtocart"></strong></strong>
                                    <span class="percentage percentage-addtocart"></span> <span class="old_price old-price-addtocart"></span>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-6">
                                <?php if (!$this->session->userdata('is_login')) : ?>
                                    <div class=""><a href="#" class="col-12 btn_1" data-toggle="modal" data-target="#modal-login">Beli Sekarang</a></div>
                                <?php else : ?>
                                    <div id="btn-addtocart" class="btn_add_to_cart"><a href="#page" class="btn_1">Beli Sekarang</a></div>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-6">
                        <?php if (!$this->session->userdata('is_login')) : ?>
                            <a href="#" data-toggle="modal" data-target="#modal-login"><i class="ti-heart"></i> <span>Tambah ke favorit</span></a>
                        <?php else : ?>
                            <a href="#" class="btn-favorit-produk" data-id-produk="<?php echo $data_jp->id_jp; ?>" data-foto-produk="<?php echo $data_foto->fotpro; ?>"><i class="ti-heart"></i> <span>Tambah ke favorit</span></a>
                        <?php endif ?>
                    </div>
                </div>
                <!-- /product_actions -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="container margin_60_35">
        <div class="owl-carousel owl-theme products_carousel bg-dashboard">
            <?php
            $sql = "SELECT * FROM jenis_produk WHERE status_produk = 'HOT' OR status_produk = 'NEW' OR status_produk = 'PROMO'";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $id_jp = $row->id_jp;
                    $nm_jp = $row->nm_jp;
                    $nm_produk = preg_replace("![^a-z0-9]+!i", "-", $nm_jp);
                    $sql = "SELECT * FROM favorit WHERE produk= $id_jp AND status_favorit = 'terbeli'";
                    $jumlah = $this->db->query($sql);
            ?>
                    <div class="item">
                        <div class="grid_item bg-white">
                            <?php
                            $sql = "SELECT * FROM harga_produk WHERE id_hrg_produk = $id_jp  ORDER BY hrg_awal DESC limit 1";
                            $query = $this->db->query($sql);
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $harga) {
                            ?>
                                    <figure class="mb-1">
                                        <?php
                                        if ($row->status_produk == 'HOT') { ?>
                                            <span class="ribbon hot"><?php echo $row->status_produk; ?></span>
                                        <?php } else if ($row->status_produk == 'NEW') { ?>
                                            <span class="ribbon new"><?php echo $row->status_produk; ?></span>
                                        <?php } else if ($row->status_produk == 'PROMO') { ?>
                                            <span class="ribbon off"><?php echo $harga->diskon; ?>%</span>
                                        <?php
                                        }
                                        ?>
                                        <!-- <a href="<?php echo base_url('detail_produk'); ?>/<?php echo $row->nm_jp; ?>"> -->
                                        <a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>">
                                            <?php
                                            $sql = "SELECT * FROM foto_produk WHERE id_fotjp = $id_jp AND status_foto = 'display' ORDER BY RAND() LIMIT 1";
                                            $query = $this->db->query($sql);
                                            if ($query->num_rows() > 0) {
                                                foreach ($query->result() as $foto) :
                                            ?>
                                                    <img class="img-fluid lazy" src="<?php echo base_url('upload'); ?>/<?php echo $foto->fotpro; ?>" data-src="<?php echo base_url('upload'); ?>/<?php echo $foto->fotpro; ?>" alt="" data-foto="<?php echo $foto->fotpro; ?>">
                                            <?php
                                                endforeach;
                                            }
                                            ?>
                                            <?php
                                            $sql = "SELECT * FROM foto_produk WHERE id_fotjp = $id_jp AND status_foto = 'display' ORDER BY RAND() LIMIT 1";
                                            $query = $this->db->query($sql);
                                            if ($query->num_rows() > 0) {
                                                foreach ($query->result() as $foto2) {
                                            ?>
                                                    <img class="img-fluid lazy" src="<?php echo base_url('upload'); ?>/<?php echo $foto2->fotpro; ?>" data-src="<?php echo base_url('upload'); ?>/<?php echo $foto2->fotpro; ?>" alt="">
                                            <?php
                                                }
                                            }
                                            ?>
                                        </a>
                                        <?php if ($row->status_produk == 'PROMO') { ?>
                                            <span class="countdown" id="countdown<?php echo $id_jp; ?>"></span>
                                        <?php
                                        } else {
                                        }
                                        ?>
                                    </figure>
                                    <div class="row">
                                        <div class="col text-right">
                                            <span class="font-size-xs pr-2"><?php echo ($jumlah->num_rows()); ?> terjual</span>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>">
                                        <h3><?php echo $row->nm_jp; ?></h3>
                                    </a>
                                    <div class="price_box">
                                        <?php if ($row->status_produk == 'PROMO') { ?>
                                            <span class="new_price">Rp.<?php echo $harga->hrg_diskon; ?></span>
                                            <span class="old_price">Rp.<?php echo $harga->hrg_awal; ?></span>
                                        <?php
                                        } else { ?>
                                            <span class="new_price">Rp.<?php echo $harga->hrg_awal; ?></span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <ul>
                                <?php if (!$this->session->userdata('is_login')) : ?>
                                    <li><a href="#" class="tooltip-1" data-toggle="modal" data-target="#modal-login" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                    <li><a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                                <?php else : ?>
                                    <!-- <li><a href="#" id="" class="tooltip-1 btn-simpan-favorit btn-favorit<?php echo $row->id_jp; ?>" data-user="<?= $this->session->userdata("id_user") ?>" data-produk="<?php echo $row->id_jp; ?>" data-foto="<?php echo $foto->id_fotpro; ?>" data-harga="<?php echo $harga->id_hrg; ?>" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li> -->
                                    <li><a href="#" class="tooltip-1 btn-favorit-produk" data-id-produk="<?php echo $row->id_jp; ?>" data-foto-produk="<?php echo $foto->fotpro; ?>" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                    <li><a href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                    </div>
            <?php
                }
            }
            ?>
            <!-- /item -->
        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->
</main>

<!-- /add_cart_panel -->