<div class="container container pt-5rem">
  <div class="row">
    <div class="col-md-12">
      <h2>More Information</h2>
      <p class="text-justify">Untuk mendapatkan informasi lebih lanjut & Lengkap tentang Kinderton.id dan layanan yang Kami tawarkan. Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami. Bisa klik tombol dibawah
      </p>
        <div class="row">
            <div class="text-center col-lg-6">
                <a href="<?php echo base_url('dashboard'); ?>">
                    <div class="col-12 btn-more-info p-2 mb-3">
                        <h6 class="mb-1 mt-1">Website Kinderton</h6>
                    </div>
                </a>
            </div>
            <div class="text-center col-lg-6">
                <a href="https://shopee.co.id/kinderton.id">
                    <div class="col-12 btn-more-info p-2 mb-3">
                        <h6 class="mb-1 mt-1">Shopee</h6>
                    </div>
                </a>
            </div>
            <div class="text-center col-lg-6">
                <a href="https://www.tiktok.com/@kinderton.id">
                    <div class="col-12 btn-more-info p-2 mb-3">
                        <h6 class="mb-1 mt-1">Tiktok Shop</h6>
                    </div>
                </a>
            </div>
            <div class="text-center col-lg-6">
                <a href="https://www.instagram.com/kinderton.id/">
                    <div class="col-12 btn-more-info p-2 mb-3">
                        <h6 class="mb-1 mt-1">Instagram</h6>
                    </div>
                </a>
            </div>
            <div class="text-center col-lg-6">
                <a href="#">
                    <div id="btn-wa" class="col-12 btn-more-info p-2 mb-3">
                        <h6 class="mb-1 mt-1">Whatsapp</h6>
                    </div>
                </a>
            </div>
    </div>
  </div>
</div>


<script>
    $('#btn-wa').click(function(e) {
        $("body").each(function() {

            var nohp = $('#no-admin').val();
            var pesan = 'Hallo Kinderton..';
            var $minWidth = 900;
            if ($(this).width() < $minWidth) {
                var linkWA = 'https://api.whatsapp.com/send?phone='+nohp+'&text='+pesan;
                window.location = linkWA;
            } else {
                var linkWA = 'https://web.whatsapp.com/send?phone='+nohp+'&text='+pesan;
                window.location = linkWA;
            }
        });
    });
</script>