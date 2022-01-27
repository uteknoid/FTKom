<style type="text/css">
  .cardt {
    height: calc(60vh - 70px);
    position: relative;
    box-sizing: border-box;
    display: flex;
    align-items: flex-end;
    text-decoration: none;
    margin-bottom: 10px;
    background-image: url('<?php echo base_url("assets/img/"); ?>kepala-desa.jpg');
    background-size: cover;
    background-position: center;
    text-align: left;
    margin-left: 1vh;

    @include media {
      height: 200px;
    }
  }

  .inner {
    height: calc(20vh - 40px);
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; 
    background: white;
    box-sizing: border-box;
    padding: 10px;
    opacity: 60%;

    @include media {
      width: 50%;
      height: 100%;
    }
  }

  .title {
    font-size: 16px;
    color: black;  
    text-align: center;
    position: relative;
    margin: 0 0 20px 0px;
    opacity: 100%;
    font-weight: bold;

    @include media {
      font-size: 30px;
    }
  }

  .subtitle {
    color: #5C8D6C;
    text-align: center;
    font-size: 12px;
    font-weight: bold;
  }


  @media (max-width: 992px) {
    .card-main{
      display: none;
    }
    .cardt{
      height: calc(60vh - 30px);
    }
  }
</style>  
<div class="d-lg-flex">
  <div class="col-lg-9 pr-1">
    <section id="hero">
      <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

          <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

          <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url('<?php echo base_url('assets/'); ?>img/slide/slide-0.jpg');">
              <div class="carousel-container">
                <div class="carousel-content container">
                  <h2 class="animate__animated animate__fadeInDown text-center">Selamat Datang<br><h3>Website Kantor Desa Padang Kalua<br>Kabupaten Luwu</h3></h2>
                </div>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url('<?php echo base_url('assets/'); ?>img/slide/slide-1.jpg');">
              <div class="carousel-container">
                <div class="carousel-content container">
                  <h2 class="animate__animated animate__fadeInDown text-center">Selamat Datang<br><h3>Website Kantor Desa Padang Kalua<br>Kabupaten Luwu</h3></h2>
                </div>
              </div>
            </div>

          </div>

          <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
          </a>

        </div>
      </div>
    </section>
  </div>

  <div class="card-main col-lg-3">
    <main>
      <a href="https://google.com" class="cardt">
        <div class="inner">
          <h2 class="title">NAMA KEPALA DESA</h2>
          <time class="subtitle">KEPADA DESA PADANG KALUA</time>
        </div>
      </a>
    </main>
  </div>
</div>


<main id="main">

  <section class="about-lists">
    <div class="container-fluid">

      <div class="section-title">
        <h2>Berita Terbaru</h2>
      </div>

      <div class="col-12 justify-content-center">
        <div class="row d-flex">
          <?php foreach($berita as $u){ ?>

            <div class="col-sm-12 col-md-6 col-xl-3">
              <div class="small">
                <article class="blog-isi">
                  <div class="blog-box">
                    <img src="<?php echo base_url('assets/img/berita/') . $u->tulisan_gambar; ?>"  width="1500" height="1368" alt="" class="img-fluid" style="object-fit: cover;">
                  </div>
                  <div class="blog-content" style="word-wrap: break-word;">
                    <p class="blog-tags">
                      <span class="blog-tag"><?php echo ucwords($u->tulisan_kategori); ?></span>
                    </p>

                    <h1 class="blog-title"><a href="#"><?php echo ucwords($u->tulisan_nama); ?></a></h1>

                    <p class="blog-desc"> <?php  echo mb_strimwidth("$u->tulisan_isi"." asddfd", 0, 100, "..."); ?></p>

                    <button class="btn btn-outline-success btn-block mx-auto" type="button">
                      SELENGKAPNYA
                    </button>

                  </div>
                </article>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="baca text-center pt-5 mt-5 fadeInUp">
        <a href="<?php echo base_url('home/berita/'); ?>" class="btn btn-outline-success btn-lg" style="padding-left: 25%; padding-right: 25%;">Lihat Semua Berita</a>
      </div>

    </div>
  </section>

  <section class="counts section-bg">
    <div class="container">

      <div class="row">

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
          <div class="count-box">
            <i class="bi bi-simple-smile" style="color: #20b38e;"></i>
            <span data-purecounter-start="0" data-purecounter-end="1593" data-purecounter-duration="1" class="purecounter"></span>
            <p>Penduduk</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
          <div class="count-box">
            <i class="bi bi-document-folder" style="color: #c042ff;"></i>
            <span data-purecounter-start="0" data-purecounter-end="127" data-purecounter-duration="1" class="purecounter"></span>
            <p>Keluarga</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
          <div class="count-box">
            <i class="bi bi-live-support" style="color: #46d1ff;"></i>
            <span data-purecounter-start="0" data-purecounter-end="1043" data-purecounter-duration="1" class="purecounter"></span>
            <p>Muslim</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
          <div class="count-box">
            <i class="bi bi-users-alt-5" style="color: #ffb459;"></i>
            <span data-purecounter-start="0" data-purecounter-end="550" data-purecounter-duration="1" class="purecounter"></span>
            <p>Non-Muslim</p>
          </div>
        </div>

      </div>

    </div>
  </section>

  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <?php foreach($sejarah as $u){ ?>
        <div class="section-title">
          <h2><?php echo ucwords($u->sejarah_judul); ?></h2>
        </div>

        <div class="row text-center">
          <div class="col-lg-12 col-md-12" style="text-align: justify;" data-aos="fade-up">
            <?php echo mb_strimwidth("$u->sejarah_isi", 0, 1500, "..."); ?>
            <br>
          </div>
          <?php if(strlen($u->sejarah_isi) > 1500){ ?>
            <a href="<?php echo base_url('home/sejarah'); ?>" class="btn btn-outline-success animate__animated animate__fadeInUp align-self-center">Lihat Semua</a>
          <?php }} ?>
        </div>

      </div>
    </section>

    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kepala Dusun</h2>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url('assets/'); ?>img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Dusun 1</span>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url('assets/'); ?>img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Dusun 2</span>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url('assets/'); ?>img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Dusun 3</span>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url('assets/'); ?>img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Dusun 4</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Visi & Misi</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item" data-aos="fade-up">
            <h4>Non consectetur a erat nam at lectus urna duis?</h4>
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
            <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
            <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
            <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="500">
            <h4>Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor?</h4>
            <p>
              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
            </p>
          </div>

        </div>

      </div>
    </section> -->

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Terhubung Dengan Kami</h2>
        </div>

        <div class="row">

          <div class="col-lg-8 d-flex" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Alamat Kami</h3>
              <p>Jalan Ahmad Tjera, Bosso Timur, Walenrang Utara, Kabupaten Luwu, Sulawesi Selatan 91952</p>
            </div>
          </div>

          <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box ">
              <i class="bx bx-phone-call"></i>
              <h3>Hubungi Kami</h3>
              <p>
                <?php foreach($kontak as $u){ 
                  echo $u->kontak_email.'<br>'.
                  $u->kontak_hp.'<br>
                  FB: '.$u->kontak_fb.'<br>
                  IG: '.$u->kontak_ig; ?><br><br>
                <?php } ?>
              </p>
            </div>
          </div>

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">

            <iframe class="php-email-form" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63760.48871344349!2d120.1073043350767!3d-2.807187423905142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd88991fa8ea5c1ab!2sKantor%20Desa%20Bosso%20Timur!5e0!3m2!1sid!2sid!4v1630590840312!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            <!-- <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-lg-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                </div>
                <div class="col-lg-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek/Judul Pesan" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Isi Pesan" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Pesan Anda Telah Terkirim. Terimakasih!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form> -->
          </div>
        </div>
      </div>
    </section>
  </main>

