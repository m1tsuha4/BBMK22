   <!-- ===== BERANDA ===== -->
   <section id="beranda">
       <div class="container">
           <div class="row">
               <div class="col-md-6 me-2 col-beranda">
                   <!-- <div class="be-bg">
              <img src="assets/img/bg.png" class="element" alt="" />
            </div> -->
                   <div class="be-text" data-anijs="if: scroll, on: window, do: bounceInLeft animated, before: scrollReveal repeat, after: scrollReveal">
                       <h1>BBMK</h1>
                       <h2>2021</h2>
                   </div>
                   <a href="<?= base_url(); ?>/main/daftar">
                       <button class="btn btnBeranda" type="button">
                           Daftar Segera!
                       </button>
                   </a>
               </div>
               <div class="col-auto beranda" data-anijs="if: scroll, on: window, do: bounceInRight animated, before: scrollReveal repeat, after: scrollReveal">
                   <img src="<?= base_url(); ?>assets3/img/beranda.png" alt="BERANDA" />
               </div>
           </div>
       </div>
       <div class="row beranda-arrow">
           <a href="#pengenalan"> <i class="uil uil-angle-down"></i></a>
       </div>
   </section>

   <!-- Apa itu BBMK? -->
   <section id="pengenalan">
       <div class="container">
           <div class="row mt-5">
               <div class="col-md-6 pengenalanBBMK" data-anijs="if: scroll, on: window, do: bounceInDown animated, before: scrollReveal repeat, after: scrollReveal">
                   <p>#BBMK2021</p>
                   <h2>Bina Bakat Minat Kepemimpinan</h2>
                   <p>
                       <b>BBMK</b> merupakan salah satu <b>rangkaian dari proses</b> Bimbingan Aktivitas Kehidupan Kampus dan Tradisi Ilmiah <b>(BAKTI)</b> yang <b>wajib</b> diikuti oleh <b>setiap mahasiswa baru</b> di Universitas Andalas, guna
                       melengkapi <b>SAPS</b> (Student Actifity and Performance System).
                   </p>
                   <p>
                       Sebuah rangkaian model <b>pembentukan karakter</b> yang didesain oleh Rektorat dalam membentuk pribadi-pribadi <b>cerdas secara akademik dan sosial-emosional</b> yang diharapkan mampu menciptakan
                       <b>Civitas Academica berkualitas.</b>
                   </p>
               </div>
               <div class="col-md-6 pengenalanBBMK-head" data-anijs="if: scroll, on: window, do: bounceInUp animated, before: scrollReveal repeat, after: scrollReveal">
                   <h2>APA ITU</h2>
                   <h1>BBMK?</h1>
               </div>
           </div>
       </div>
   </section>

   <!-- Dokumentasi -->
   <section id="dokumentasi">
       <div class="container">
           <div class="row">
               <div class="col-md-6 dokum" data-anijs="if: scroll, on: window, do: rotateInDownLeft animated, before: scrollReveal repeat, after: scrollReveal">
                   <h1>DOKUMENTASI</h1>
               </div>
               <div class="col-md-6 dokumFoto">
                   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                       <div class="carousel-indicators">
                           <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                           <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                           <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                       </div>
                       <div class="carousel-inner" data-anijs="if: scroll, on: window, do: fadeInRight animated, before: scrollReveal repeat, after: scrollReveal">
                           <div class="carousel-item active">
                               <img src="<?= base_url(); ?>assets3/img/dokum1.jpeg" class="d-block w-100" alt="Dokumentasi BBMK" />
                           </div>
                           <div class="carousel-item">
                               <img src="<?= base_url(); ?>assets3/img/dokum2.jpg" class="d-block w-100" alt="Dokumentasi BBMK" />
                           </div>
                           <div class="carousel-item">
                               <img src="<?= base_url(); ?>assets3/img/dokum3.png" class="d-block w-100" alt="Dokumentasi BBMK" />
                           </div>
                       </div>
                       <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Previous</span>
                       </button>
                       <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Next</span>
                       </button>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- ===== AKHIR BERANDA ===== -->

   <!-- ===== ALUR PENDAFTARAN ===== -->
   <section id="alur">
       <div class="container">
           <div class="row">
               <div class="col-md-6 alurnya" data-anijs="if: scroll, on: window, do: zoomInLeft animated, before: scrollReveal repeat, after: scrollReveal">
                   <div class="row mt-5">
                       <div class="col-1 gambar-alur">
                           <i class="uil uil-monitor icon-alur"></i>
                           <div class="ver-line"></div>
                       </div>
                       <div class="col text-alur">
                           <h4>Daftar di Website</h4>
                           <p>Peserta mendaftar di halaman</p>
                           <p id="linkBBMK">www.bbmk.kemahasiswaan.unand.ac.id</p>
                           <p>1 - 4 November 2021</p>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-1">
                           <i class="uil uil-sign-alt icon-alur"></i>
                           <div class="ver-line"></div>
                       </div>
                       <div class="col text-alur">
                           <h4>Pilih UKM</h4>
                           <p>Pilih UKM yang ingin kamu ikuti!</p>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-1">
                           <i class="uil uil-user-plus icon-alur"></i>
                           <div class="ver-line"></div>
                       </div>
                       <div class="col text-alur">
                           <h4>Input Data</h4>
                           <p>Lengkapi data diri dan darta verifikasi kamu!</p>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-1">
                           <i class="uil uil-user-check icon-alur"></i>
                       </div>
                       <div class="col text-alur">
                           <h4>Verifikasi Data</h4>
                           <p>Tunggu informasi terverifikasi sebagai peserta</p>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 alurPen" data-anijs="if: scroll, on: window, do: rotateInDownRight animated, before: scrollReveal repeat, after: scrollReveal">
                   <h2>ALUR</h2>
                   <h1>PENDAFTARAN</h1>
               </div>
           </div>
       </div>
   </section>
   <!-- ===== AKHIR ALUR ===== -->

   <!-- ===== LINIMASA ===== -->
   <section id="linimasa">
       <div class="container">
           <div class="row mt-5">
               <div class="col-md-6 linimasa" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal repeat, after: scrollReveal">
                   <h1>LINIMASA</h1>
               </div>
               <div class="col-md-6 linimasaFlow" data-anijs="if: scroll, on: window, do: slideInUp animated, before: scrollReveal repeat, after: scrollReveal">
                   <div class="row row-linimasa">
                       <div class="col-1">
                           <i class="uil uil-clock-three icon-alur"></i>
                           <div class="ver-line"></div>
                       </div>
                       <div class="col text-alur">
                           <h4>Coming Soon</h4>
                           <p>26 - 31 Oktober 2021</p>
                       </div>
                   </div>
                   <div class="row row-linimasa">
                       <div class="col-1">
                           <i class="uil uil-edit-alt icon-alur"></i>
                           <div class="ver-line"></div>
                       </div>
                       <div class="col text-alur">
                           <h4>Pendaftaran</h4>
                           <p>1 - 4 November 2021</p>
                       </div>
                   </div>
                   <div class="row row-linimasa">
                       <div class="col-1">
                           <i class="uil uil-check-circle icon-alur"></i>
                           <div class="ver-line"></div>
                       </div>
                       <div class="col text-alur">
                           <h4>Verifikasi</h4>
                           <p>1 - 5 November 2021</p>
                       </div>
                   </div>
                   <div class="row row-linimasa">
                       <div class="col-1">
                           <i class="uil uil-smile-wink-alt icon-alur"></i>
                       </div>
                       <div class="col text-alur">
                           <h4>Let’s BBMK Yeay!</h4>
                           <p>6 - 28 November 2021</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- ===== AKHIR LINIMASA ===== -->

   <!-- ===== UKM - UKM ===== -->
   <section id="ukm">
       <div class="container">
           <div class="row row-ukm justify-content-center">
               <div class="col ukmUkm text-center" data-anijs="if: scroll, on: window, do: lightSpeedIn animated, before: scrollReveal repeat, after: scrollReveal">
                   <h1>UKM - UKM</h1>
               </div>
           </div>
           <div class="row justify-content-center UKM">
               <?php
                $query = $this->db->query("SELECT * FROM ukm");
                $no_ukm = 1;
                foreach ($query->result() as $ukm) {
                ?>
                   <div class="col-md-4" data-anijs="if: scroll, on: window, do: rollIn animated, before: scrollReveal repeat, after: scrollReveal">
                       <div class="card">
                           <img src="<?= base_url() ?>assets/img/logo/<?= $ukm->logo ?>" class="card-img-top" alt="Neo Telemetri" />
                           <div class="card-body text-center">
                               <h5 class="card-title"><?= $ukm->nama ?></h5>
                               <a href="<?= base_url(); ?>/main/ukm/<?= $ukm->username ?>" class="btn btnUKM">Lihat</a>
                           </div>
                       </div>
                   </div>
               <?php } ?>

           </div>
       </div>
   </section>
   <!-- AKHIR UKM -->