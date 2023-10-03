<main>
    <!-- tampilan dekstop -->
    <div class="d-md-block d-none">
        <div id="carousel-home" style="height: 32rem;">
            <div class="owl-carousel owl-theme">
                <?php
                    foreach ($slide as $slides) {
                        $kategoris = preg_replace("![^a-z0-9]+!i", "-", $slides->kategori);
                ?>
                <div class="owl-slide">
                    <img class="slider-image" src="<?php echo base_url('upload/banner'); ?>/<?php echo $slides->foto; ?>"
                        alt="Slider Image">

                    <div class="opacity-mask d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-end">
                                <div class="col-lg-6 static">
                                    <div class="slide-text text-right white">
                                        <h2 class="owl-slide-animated owl-slide-title">
                                            <?php echo $slides->kategori; ?><br>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                            </p>
                                            <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                    href="<?php echo base_url(); ?>produk/category/<?php echo $kategoris; ?>"
                                                    class="img_container" role="button">Shop Now</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
                <?php
                    }
                ?>
            </div>
            <div id="icon_drag_mobile"></div>
        </div>
        <?php
        $get_data = $this->uri->segment(2);
        echo $get_data
        ?>
    </div>
    <!-- akhir tampilan dekstop -->
    <!-- tampilan mobile -->
    <div class="d-md-none">
    <div id="carousel-home" style="height: 11rem;">
            <div class="owl-carousel owl-theme">
                <?php
                    foreach ($slide as $slides) {
                        $kategoris = preg_replace("![^a-z0-9]+!i", "-", $slides->kategori);
                ?>
                <div class="owl-slide mt-5 pt-3">
                    <a href="<?php echo base_url(); ?>produk/category/<?php echo $kategoris; ?>">
                    <img class="slider-image" src="<?php echo base_url('upload/banner'); ?>/<?php echo $slides->foto; ?>"
                        alt="Slider Image">
                    </a>
                </div>
                <!--/owl-slide-->
                <?php
                    }
                ?>
            </div>
            <div id="icon_drag_mobile"></div>
        </div>
        <?php
        $get_data = $this->uri->segment(2);
        echo $get_data
        ?>
    </div>
    <!-- akhir tampilan mobile -->

<!--Etalase -->
<!-- dekstop -->
<div class="d-md-block d-none">
    <ul id="banners_grid" class="clearfix row mt-1 pt-1">
        <?php
    foreach ($etalase as $etalases) {
            ?>
        <li class="col-lg-4 col-md-3 col-sm-12 p-0">
            <a href="<?php echo base_url(); ?>produk/gender/<?php echo $etalases->kategori; ?>" class="img_container"
                style="height: 30rem;">

                <img src=" <?php echo base_url('upload'); ?>/<?php echo $etalases->foto; ?>"
                    data-src="<?php echo base_url('upload/banner'); ?>/<?php echo $etalases->foto; ?>" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0,0,0, 0.2)">
                    <h3><?php echo $etalases->kategori; ?></h3>
                    <div><span class="btn_1">Shop Now</span></div>
                </div>
            </a>
        </li>
        <?php
    }
    ?>
    </ul>
</div>
<!-- dekstop -->

<!-- mobile -->
<div class="d-md-none">
    <div class="mt-0 mb-0" id="carousel-home">
        <ul id="banners_grid">
            <div class="owl-carousel owl-theme">
                <?php
                    foreach ($etalase as $etalases) {
                ?>
                    <li class="col-lg-4 col-md-3 col-sm-12 p-0">
                        <a href="<?php echo base_url(); ?>produk/gender/<?php echo $etalases->kategori; ?>" class="img_container"
                            style="height: 25rem;">

                            <img src=" <?php echo base_url('upload'); ?>/<?php echo $etalases->foto; ?>"
                                data-src="<?php echo base_url('upload/banner'); ?>/<?php echo $etalases->foto; ?>" alt="" class="lazy">
                            <div class="short_info opacity-mask" data-opacity-mask="rgba(0,0,0, 0.2)">
                                <h3><?php echo $etalases->kategori; ?></h3>
                                <div><span class="btn_1">Shop Now</span></div>
                            </div>
                        </a>
                    </li>
                <?php
                    }
                ?>
            </div>
            <div id="icon_drag_mobile"></div>
        </ul>
    </div>
</div>
<!-- akhir mobile -->



    <!--/banners_grid -->
    <div class="container margin_60_35 bg-dashboard pt-3 pb-3">
        <div class="data-dashboard"></div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <?php
    $sql = "SELECT * FROM quots, foto_produk LIMIT 1";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
    ?>
    <div class="featured lazy" data-bg="url(<?php echo base_url('upload/quots'); ?>/<?php echo $row->gambar; ?>)">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(225,129,49, 0.4)">
            <div class="container margin_60">
                <div class="row justify-content-center justify-content-md-start">
                    <div class="col-lg-12 wow text-center" data-wow-offset="150">
                        <h2><img class="img-fluid mb-4 mr-0 pr-1 col-lg-2" src="upload/quots/Petik.png" alt=""
                                                    style="max-height: 20px; width: auto;"><?php echo $row->judul_quots; ?><img class="img-fluid mb-4 pl-1 ml-0 col-lg-2" src="upload/quots/Petikb.png" alt=""
                                                style="max-height: 20px; width: auto;"></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
    <!-- /featured -->
    <div class="bg_gray">
        <div class="container pt-2 pb-2">
            <div id="brands" class="owl-carousel owl-theme">
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/1-03.png"
                            data-src="<?php echo base_url('assets'); ?>/img/1-03.png" alt=""
                            class="owl-lazy size-logo-slide"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/ikon baju-03.png"
                            data-src="<?php echo base_url('assets'); ?>/img/ikon baju-03.png" alt=""
                            class="owl-lazy size-logo-slide"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/ikon baju-04.png"
                            data-src="<?php echo base_url('assets'); ?>/img/ikon baju-04.png" alt=""
                            class="owl-lazy size-logo-slide"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/ikon baju-05.png"
                            data-src="<?php echo base_url('assets'); ?>/img/ikon baju-05.png" alt=""
                            class="owl-lazy size-logo-slide"></a>
                </div>
                <div class="item">
                    <a href="#0"><img src="<?php echo base_url('assets'); ?>/img/ikon baju-06.png"
                            data-src="<?php echo base_url('assets'); ?>/img/ikon baju-06.png" alt=""
                            class="owl-lazy size-logo-slide"></a>
                </div>
            </div><!-- /carousel -->
        </div><!-- /container -->
    </div>
</main>