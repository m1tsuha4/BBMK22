<header class="masthead text-center text-white d-flex">
  <div class="container my-auto">
    <div class="row" id="up">
      <div class="col-lg-10 mx-auto">
        <h1 class="text-uppercase">
          <strong>BBMK 2019</strong>
        </h1>
        <hr>
      </div>
      <div class="col-lg-8 mx-auto">
        <a class="btn btn-info btn-xl js-scroll-trigger" href="#about">Apa itu BBMK ?</a>
      </div>
    </div>
  </div>
</header>

<section class="bg-info" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="section-heading text-white">Bina Bakat Minat Kepemimpinan</h2>
        <hr class="light my-4">
        <p class="text-faded mb-4">BBMK merupakan salah satu rangkaian dari proses Bimbingan Aktifitas Kehidupan Kampus dan Tradisi Ilmiah (BAKTI) yang wajib di ikuti oleh setiap mahasiswa baru di Universitas Andalas, guna melengkapi SAPS (Student Actifity and Peformance System), sebuah rangkaian model pembentukan karakter yang didesain oleh Rektorat dalam membentuk pribadi-pribadi yang tidak hanya cerdas secara akademik, namun juga dalam segi sosial-emosional yang diharapkan mampu menciptakan Civitas Academica berkualitas.</p>
        <a class="btn btn-light btn-xl js-scroll-trigger" href="#alur">Lihat Alur</a>
      </div>
    </div>
  </div>
</section>

<section id="alur">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">Alur Pendaftaran</h2>
        <hr class="my-4">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box mt-5 mx-auto">
          <a href="#up"><i class="fas fa-4x fa-desktop text-danger mb-3 sr-icon-1"></i></a>
          <h3 class="mb-3">BBMK Online</h3>
          <p class="text-muted mb-0">Kunjungi web bbmk online</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box mt-5 mx-auto">
          <a href="#ukm"><i class="fas fa-4x fa-mouse-pointer text-danger mb-3 sr-icon-2"></i></a>
          <h3 class="mb-3">Pilih UKM</h3>
          <p class="text-muted mb-0">Pilih UKM yang akan kamu ikuti</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box mt-5 mx-auto">
          <a href="<?= base_url(); ?>main/daftar" class="text-info"><i class="fas fa-4x fa-pencil-alt text-danger mb-3 sr-icon-3"></i></a>
          <h3 class="mb-3">Daftar</h3>
          <p class="text-muted mb-0">Mendaftar dan isikan data diri</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box mt-5 mx-auto">
          <i class="fas fa-4x fa-id-card text-danger mb-3 sr-icon-4"></i>
          <h3 class="mb-3">Cetak Kartu</h3>
          <p class="text-muted mb-0">Cetak bukti pendaftaran dan lakukan verifikasi ke sekretraiat ukm yang bersangkutan</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="timeline" class="bg-info">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-white">SAVE THE DATE</h2>
        <hr class="my-4">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-center">
        <div class="service-box mt-5 mx-auto">
          <i class="fas fa-4x fa-user-plus text-light mb-3 sr-icon-1"></i>
          <h3 class="mb-3 text-light">14 - 19 Okt 2019</h3>
          <p class="mb-0 text-light">Registrasi Online</p>
        </div>
      </div>
      <div class="col-md-4 text-center">
        <div class="service-box mt-5 mx-auto">
          <i class="fas fa-4x fa-file text-light mb-3 sr-icon-2"></i>
          <h3 class="mb-3 text-light">21 - 23 Okt 2019</h3>
          <p class="mb-0 text-light">Daftar Ulang</p>
        </div>
      </div>
      <div class="col-md-4 text-center">
        <div class="service-box mt-5 mx-auto">
          <i class="fab fa-4x fa-google-play text-light mb-3 sr-icon-3"></i>
          <h3 class="mb-3 text-light">26 Okt - 17 Nov 2019</h3>
          <p class="text-light mb-0">Progress BBMK</p>
        </div>
      </div>
    </div>
  </div>
</section>

</li>
</ul>
</section>
<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>

<script src="js/index.js"></script>

<section class="p-0" id="ukm">
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">UKM - UKM</h2>
        <hr class="my-4">
      </div>
    </div>
    <div class="row no-gutters popup-gallery">
      <?php
      $query = $this->db->query("SELECT * FROM ukm");
      foreach ($query->result() as $key) {
        if ($key->logo == "") {
          $logo = "head-full-color.svg";
        } else {
          $logo = $key->logo;
        } ?>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box text-center" href="<?= base_url(); ?>assets/img/<?= $logo; ?>">
            <img class="img-fluid" src="<?= base_url(); ?>assets/img/<?= $logo; ?>" alt="" width="60%">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  <?= $key->nama; ?>
                </div>
                <div class="project-name">
                  <?= $key->motto; ?>
                </div>
                <div class="project-name">
                  [Kuota : <?= $key->kuota; ?>] | [Terdaftar : <?= $key->total; ?>] | [Tersedia : <?= $key->kuota - $key->total; ?>]
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php
      } ?>
    </div>
  </div>
</section>

<section class="bg-info text-white" id="cek">
  <div class="container text-center">
    <h2 class="mb-4">Cek akunmu disini</h2>
    <form action="" method="post">
      <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
      <style type="text/css">
        .inputx {
          display: block;
          margin: auto;
          width: 50%;
          padding: 5px;
          margin-bottom: 5px;
        }

        .button {
          border-radius: 4px;
          background-color: rgba(170, 35, 223, 0.76);
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 28px;
          padding: 5px;
          width: 150px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 5px;
        }

        .button span {
          cursor: pointer;
          display: inline-block;
          position: relative;
          transition: 0.5s;
        }

        .button span:after {
          content: '\00bb';
          position: absolute;
          opacity: 0;
          top: 0;
          right: -20px;
          transition: 0.5s;
        }

        .button:hover span {
          padding-right: 25px;
        }

        .button:hover span:after {
          opacity: 1;
          right: 0;
        }
      </style>
      <input type="text" name="nobp" placeholder="Masukkan NIM" class="inputx">
      <hr>
      <!-- <input type="submit" name="cek" value="Cek" class="button"> -->
      <button class="button" type="submit" name="cek" value="Cek"><span>Cek </span></button>
    </form>

    //* Cek BP terdaftar (nobp -> peserta)
    <?php
    if (isset($_POST["cek"])) {
      $nobp = $this->db->escape_str($this->input->post("nobp", TRUE));

      if (is_numeric($nobp)) {
        if (preg_match("/^19/", $nobp) or preg_match("/^20/", $nobp)) {
          $uquery = $this->db->query("SELECT * FROM peserta WHERE nobp = '$nobp'");
          if ($uquery->num_rows() == 1) {
            $this->alert->pesan("success", "Selamat", "Akunmu telah terdaftar, silahkan login...", 1, base_url("/main/login"));
          } else {
            $this->alert->pesan("warning", "Oops...", "Akunmu belum terdaftar, silahkan mendaftar segera....", 1, base_url("/main/daftar"));
          }
        } else {
          $this->alert->pesan("error", "Gagal...", "Peserta yang diizinkan hanya BP 19 dan 20");
        }
      } else {
        $this->alert->pesan("error", "Gagal...", "Nomor bp yang anda inputkan bukan angka");
      }
    } ?>
  </div>
</section>