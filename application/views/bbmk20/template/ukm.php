  <?php
    $ukm = $this->db->query("SELECT * FROM ukm WHERE username = '" . $ukmid . "'")->row();
    ?>

  <!-- Pembuka Heroes -->

  <div class="container-fluid">
      <div class="heroes">
          <img class="img-fluid" src="<?= base_url() ?>/assets/img/logo/<?= $ukm->logo ?>">
          <br>
          <button class="btn bg-1"><a href="#timeline" class="color-4">Time Line BBMK</a></button>
          <div class="container-fluid blokP">
              <div class="blokP-1"></div>
              <div class="blokP-2"></div>
          </div>
      </div>
  </div>
  <!-- Penutup Heroes -->
  <!-- Pembuka Pengertian UKM -->
  <div class="container-fluid">
      <div class="definisi">
          <p class="h2 color-1"><?= $ukm->nama ?></p>
          <p class="h5">
              <?= $ukm->deskripsi ?>
          </p>
      </div>
  </div>
  <!-- Penutup Pengertian UKM -->
  <!-- Pembuka VISI/MISI -->
  <div class="container-fluid">
      <div class="visimisi">
          <p class="h2 color-1 text-center">VISI DAN MISI</p>
          <div class="visi">
              <p class="h3 color-1 text-center">Visi</p>
              <p class="h6 text-center">
                  <?= $ukm->visi ?>
              </p>
          </div>
          <div class="misi">
              <p class="h3 color-1 text-center">Misi</p>
              <p class="h6">
                  <?= $ukm->misi ?>
              </p>
          </div>
      </div>
  </div>
  <!-- Penutup VISI/MISI -->

  <!-- Pembuka TIMELINE-->

  <div class="container-fluid bg-2" id="timeline">
      <div class="timeline">
          <p class="h1 text-center color-1">TIMELINE BBMK</p>
          <div class="bodyy">

              <?php
                if ($ukm->timeline1) { ?>
                  <div class="circle bg-1">
                      <p class="h3"><?= $ukm->timeline1 ?></p>
                  </div>
              <?php
                }
                ?>
              <?php
                if ($ukm->timeline2) { ?>
                  <div class="circle bg-1">
                      <p class="h3"><?= $ukm->timeline2 ?></p>
                  </div>
              <?php
                }
                ?>
              <?php
                if ($ukm->timeline3) { ?>
                  <div class="circle bg-1">
                      <p class="h3"><?= $ukm->timeline3 ?></p>
                  </div>
              <?php
                }
                ?>
              <?php
                if ($ukm->timeline4) { ?>
                  <div class="circle bg-1">
                      <p class="h3"><?= $ukm->timeline4 ?></p>
                  </div>
              <?php
                }
                ?>

          </div>
      </div>
  </div>


  <!-- Penutup TIMELINE -->
  <!-- Pembuka Syarat Pendaftaran -->

  <div class="container-fluid">
      <div class="syarat">
          <p class="h1 color-1 text-center">SYARAT PENDAFTARAN</p>
          <div class="syarat-body color-1">
              <ul>
                  <?php
                    if ($ukm->syarat1) { ?>
                      <li class="h3 bg-2">
                          <span class="angka bg-1 color-4">1</span>
                          <p><?= $ukm->syarat1 ?></p>
                      </li>
                  <?php
                    }
                    ?>

                  <?php
                    if ($ukm->syarat2) { ?>
                      <li class="h3 bg-2">
                          <span class="angka bg-1 color-4">2</span>
                          <p> <?= $ukm->syarat2 ?> </p>
                      </li>
                  <?php
                    }
                    ?>
                  <?php
                    if ($ukm->syarat3) { ?>
                      <li class="h3 bg-2">
                          <span class="angka bg-1 color-4">3</span>
                          <p> <?= $ukm->syarat3 ?> /
                          <p>
                      </li>
                  <?php
                    }
                    ?>

                  <?php
                    if ($ukm->syarat4) { ?>
                      <li class="h3 bg-2">
                          <span class="angka bg-1 color-4">4</span>
                          <p> <?= $ukm->syarat4 ?> </p>
                      </li>
                  <?php
                    }
                    ?>
                  <?php
                    if ($ukm->syarat5) { ?>
                      <li class="h3 bg-2">
                          <span class="angka bg-1 color-4">5</span>
                          <p> <?= $ukm->syarat5 ?> </p>
                      </li>
                  <?php
                    }
                    ?>
              </ul>
          </div>
      </div>
  </div>
  <!-- Penutup Syarat Pendaftaran -->

  <!-- Pembuka Materi -->

  <div class="container-fluid bg-2">
      <div class="materi">
          <p class="h1 color-1 text-center">MATERI BBMK</p>
          <div class="materi-body">
              <?php
                $materi = $this->db->query("SELECT * FROM filemateri WHERE id_ukm  = '" . $ukm->id . "'");
                foreach ($materi->result() as $m) {
                ?>
                  <div class="card materi-card">

                      <div class="card-body">
                          <span class="card-logo-ppt"><i class="far fa-file-powerpoint"></i></span>
                          <p class="h6 text-center"><?= $m->namafile ?></p>
                          <a href="<?= base_url() ?>main20/downloadfile/<?= $ukm->id ?>/<?= $m->id ?>"><button class="btn">Download</button></a>
                      </div>
                  </div>
              <?php } ?>
          </div>
      </div>
  </div>
  <!-- Penutup Materi -->


  <!-- Pembuka Dokumentasi -->
  <div class="container-fluid">
      <div class="doc">
          <p class="h1 color-1 text-center">DOKUMENTASI BBMK 2019</p>
          <div class="picture">
              <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto1 ?>" class="p1">
              <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto2 ?>" class="p2">
              <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto3 ?>" class="p3">
              <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto4 ?>" class="p4">
              <img src="<?= base_url() ?>assets/img/web/<?= $ukm->foto5 ?>" class="p5">
          </div>
      </div>
  </div>
  <!-- Penutup Dokumentasi -->
  <!-- Pembuka Video -->
  <div class="container-fluid">
      <div class="video">
          <p class="h1 color-1 text-center">Video Profile</p>
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="<?= $ukm->video ?>" allowfullscreen></iframe>
          </div>
      </div>
  </div>
  <!-- Penutup Video -->
  <!-- Pembuka Footer -->
  <div class="container-fluid bg-2">
      <div class="footer">
          <footer>
              <div class="row justify-content-around">
                  <div class="col-4">
                      <p class="h6">
                          <span class="i">
                              <i class="fab fa-instagram"></i>
                          </span>
                          <?= $ukm->instagram ?>
                      </p>
                  </div>
                  <div class="col-4">
                      <p class="h6">
                          <span class="i">
                              <i class="fab fa-youtube"></i>
                          </span>
                          <?= $ukm->youtube ?>
                      </p>
                  </div>
                  <div class="col-4">
                      <p class="h6">
                          <span class="i">
                              <i class="fas fa-envelope"></i>
                          </span>
                          <?= $ukm->email ?>
                      </p>
                  </div>
              </div>
              <div class="row justify-content-around">
                  <div class="col-4">
                      <p class="h6">
                          <span class="i">
                              <i class="fab fa-twitter"></i>
                          </span>
                          <?= $ukm->twitter ?>
                      </p>
                  </div>
                  <div class="col-4">
                      <p class="h6">
                          <span class="i">
                              <i class="fab fa-facebook-f"></i>
                          </span>
                          <?= $ukm->facebook ?>
                      </p>
                  </div>
                  <div class="col-4">
                      <p class="h6">
                          <span class="i">
                              <i class="fas fa-globe"></i>
                          </span>
                          <?= $ukm->website ?>
                      </p>
                  </div>
              </div>
          </footer>
      </div>
  </div>
  <!-- Penutup Footer -->
  <!-- tambahan -->
  <script>
      // Pembuka Heroes
      // Pembuka Heroes
      let hero = document.querySelector('div.heroes img');
      let heroes = hero.getBoundingClientRect();
      if (heroes.height > 150) {
          hero.style.width = '250px';
      }
      // Penutup Heroes
      // Pembuka syarat
      let p = document.querySelectorAll('div.syarat li p');
      p.forEach(function(ps) {
          let pss = ps.getBoundingClientRect();
          if (pss.width > 700) {
              ps.style.lineHeight = '25px';
              ps.style.textAlign = 'justify';
          }
      });
      // Penutup syarat
  </script>
  <!-- tambahan -->