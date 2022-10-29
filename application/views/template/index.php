<!-- Pembuka BBMK  -->

// perbaikan 1
<div class="container-xl">
    <div class="row row-home">
        <div class="col-6">
            <div class="home">
                <p class="h1">BBMK</p>
                <p class="h1 c2021">2021</p>
                <a href="<?= base_url() ?>#about"> <button type="button" class="btn">APA ITU BBMK? <i class="fa fa-arrow-right"></i></button>
                </a>
            </div>
        </div>
        <div class="col-6">
            <div class="blok">
                <div class="block-1"></div>
                <div class="block-2"></div>
                <div class="block-3"></div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup BBMK -->
<div class="batas"></div>
<!-- Pembuka Apa itu BBMK -->
<div class="container-xl" id="about">
    <div class="body">
        <p class="h2">Bina Bakat Minat Kepemimpinan</p>
        <p class="h5">
            BBMK merupakan salah satu rangkaian dari proses Bimbingan Aktivitas Kehidupan Kampus dan Tradisi Ilmiah (BAKTI) yang wajib diikuti oleh setiap mahasiswa baru di Universitas Andalas, guna melengkapi SAPS (Student Actifity and Performance System), sebuah rangkaian model pembentukan karakter yang didesain oleh Rektorat dalam membentuk pribadi-pribadi yang tidak hanya cerdas secara akademik, namun juga dalam segi sosial-emosional yang diharapkan mampu menciptakan Civitas Academica berkualitas
        </p>
        <button class="btn">LIHAT ALUR</button>
    </div>
</div>
<!-- Penutup Apa itu BBMK -->
<div class="batas"></div>
<!-- Pembuka Alur Pendaftaran -->
<div class="container-fluid bg-2" id="alur">
    <div class="alur">
        <p class="h2">ALUR PENDAFTARAN</p>
        <div class="row">
            <div class="col-3">
                <div class="card bg-2">
                    <p class="i">
                        <i class="fa fa-pencil-alt"></i>
                    </p>
                    <div class="card-body">
                        <p class="h4 card-text color-1">BBMK Online</p>
                        <p class="h5 card-text color-4">Kunjungi web BBMK online</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card bg-2">
                    <p class="i">
                        <i class="fa fa-tv"></i>
                    </p>
                    <div class="card-body">
                        <p class="h4 card-text color-1">Registrasi dan Pilih UKM</p>
                        <p class="h5 card-text color-4">Pilih UKM yang kamu ikuti</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card bg-2">
                    <p class="i">
                        <i class="fa fa-mouse-pointer"></i>
                    </p>
                    <div class="card-body">
                        <p class="h4 card-text color-1">Input Data</p>
                        <p class="h5 card-text color-4">Lengakapi data diri dan data verifikasi kamu</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card bg-2">
                    <p class="i">
                        <i class="fa fa-id-card"></i>
                    </p>
                    <div class="card-body">
                        <p class="h4 card-text color-1">Verifikasi Data</p>
                        <p class="h5 card-text color-4">Tunggu informasi terverifikasi sebagai peserta</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Alur Pendaftaran -->
<!-- Pembuka Save Date -->
<div class="container-fluid bg-2">
    <div class="save" id="savedate">
        <p class="h2">SAVE THE DATE</p>
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="card bg-2 text-left">
                    <p class="i">
                        <i class="fa fa-user-plus"></i>
                    </p>
                    <div class="card-body">
                        <p class="h4 card-text color-4">15 - 19 Maret 2021</p>
                        <p class="h5 card-text color-1">Registrasi Online</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card bg-2 text-left">
                    <p class="i">
                        <i class="fa fa-file"></i>
                    </p>
                    <div class="card-body">
                        <p class="h4 card-text color-4">15 - 19 Maret 2021</p>
                        <p class="h5 card-text color-1">Pendaftaran Ulang</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card bg-2">
                    <p class="i">
                        <i class="fab fa-google-play"></i>
                    </p>
                    <div class="card-body">
                        <p class="h4 card-text color-4">20 - 28 Maret 2021</p>
                        <p class="h5 card-text color-1">Progress BBMK</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Save Date -->

<!-- Pembuka UKM -->
<div class="container-fluid">
    <div class="ukm">
        <p class="h1 color-1">UKM-UKM</p>
        <div class="row justify-content-center row-logo">
            <?php
            $query = $this->db->query("SELECT * FROM ukm");
            $no_ukm = 1;
            foreach ($query->result() as $ukm) {



            ?>
                <div class="col-3">
                    <div class="card logo" style="width: 18rem;">
                        <div class="card-body">
                            <img src="<?= base_url() ?>assets/img/logo/<?= $ukm->logo ?>" class="PHP">
                        </div>
                    </div>
                    <div class="card info bg-3" style="width: 18rem;">
                        <div class="card-body">
                            <p class="h6 card-text color-4" style="font-weight: bold;"><?= $ukm->nama ?><br>"<?= $ukm->motto ?>"</p>
                            <div class="peserta">

                            </div>
                            <a href="<?= base_url() ?>main/ukm/<?= $ukm->username ?>" class="btn bg-1 color-4">Info Profile UKM</a>
                        </div>
                    </div>
                </div>
                <?php
                if ($no_ukm % 3 == 0) {

                ?>
        </div>
        <div class="row justify-content-center row-logo">
    <?php
                }

                $no_ukm = $no_ukm + 1;
            }
    ?>

        </div>

    </div>

    <!-- Penutup UKM -->
    <!-- Pembuka ACCOUNT CHECK -->
    <div class=" container-fluid bg-2">
        <div class="akun" id="cekakun">
            <p class="h1 color-1">ACCOUNT CHECK</p>
            <form class="form-group" action="" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="form-floating mb-3">
                    <input type="number" name="nobp" class="form-control" id="floatingInput" placeholder="NIM">
                    <label for="floatingInput">NIM</label>
                </div>
                <div class="form-floating mb-3">
                    <button class="btn color-4 bg-1" type="submit" name="cek">
                        <p class="h4">Cek Akun</p>
                    </button>
            </form>
        </div>

    </div>
    <?php
    if (isset($_POST["cek"])) {
        $nobp = $this->db->escape_str($this->input->post("nobp", TRUE));

        if (is_numeric($nobp)) {
            if (preg_match("/^19/", $nobp) or preg_match("/^20/", $nobp) or preg_match("/^18/", $nobp)) {
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
    <!-- Penutup ACCOUNT CHECK -->