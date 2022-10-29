<?php
class Superadmin20 extends CI_Controller
{

    public function list()
    {

        if (@$this->session->userdata("superadmin")) {
            $data['peserta'] = $this->Smodel->get_data_all()->result();

            $this->load->view('bbmk20/superadmin/template/header');
            $this->load->view('bbmk20/superadmin/template/sidebar');
            $this->load->view('bbmk20/superadmin/dashboard', $data);
            $this->load->view('bbmk20/superadmin/template/footer');
        } else {
            $data["title"] = "Login Super User";

            $this->load->view("bbmk20/tmp/header", $data);
            $this->load->view("bbmk20/superadmin/login");
        }
    }

    public function news()
    {
        if (@$this->session->userdata("superadmin")) {


            $this->load->view('bbmk20/superadmin/template/header');
            $this->load->view('bbmk20/superadmin/template/sidebar');
            $this->load->view('bbmk20/superadmin/menu/pemberitahuan');
            $this->load->view('bbmk20/superadmin/template/footer');
        } else {
            $data["title"] = "Login Super User";
            $this->load->view("bbmk20/tmp/header", $data);
            $this->load->view("bbmk20/superadmin/login");
        }
    }

    public function index()
    {
        if (isset($_POST["login"])) {
            $username = $this->db->escape_str($this->input->input_stream("username", TRUE));
            $password = $this->db->escape_str($this->input->input_stream("password", TRUE));

            $query = $this->db->query("SELECT * FROM superadmin WHERE username = '$username'");
            if ($query->num_rows() == 1) {
                $key = $query->row();
                if (password_verify($password, $key->password)) {
                    $this->session->set_userdata("superadmin", "$username");
                    $this->alert->pesan("Yes", "Berhasil...", "Login berhasil...", 1, base_url("/superadmin20/list"));
                } else {
                    $this->alert->pesan("error", "Oops...", "Akun anda belum terdaftar....");
                }
            } else {
                $this->alert->pesan("error", "Oops...", "Akun anda belum terdaftar....");
            }
        }
        if (@$this->session->userdata("superadmin")) {
            $this->alert->msg("success", "Anda sudah login...", "", 1, base_url("/superadmin20/list"));
        } else {
            $this->load->view("bbmk20/template/header");
            $this->load->view("bbmk20/superadmin/login");
            $this->load->view("bbmk20/template/footer");
        }
    }
    public function logout()
    {
        session_destroy();
        $this->alert->msg("success", "Logout berhasil...", "", 1, base_url("/superadmin20"));
    }

    public function inputUKM()
    {
        if (isset($_POST["input"])) {
            $nama = $this->db->escape_str($this->input->input_stream("nama", TRUE));
            $motto = $this->db->escape_str($this->input->input_stream("motto", TRUE));
            $tgl_berdiri = $this->db->escape_str($this->input->input_stream("tgl_berdiri", TRUE));
            $kuota = $this->db->escape_str($this->input->input_stream("kuota", TRUE));
            $deskripsi = $this->db->escape_str($this->input->input_stream("deskripsi", TRUE));
            $visi = $this->db->escape_str($this->input->input_stream("visi", TRUE));
            $misi = $this->db->escape_str($this->input->input_stream("misi", TRUE));
            $nama_cp = $this->db->escape_str($this->input->input_stream("nama_cp", TRUE));
            $kontak_cp = $this->db->escape_str($this->input->input_stream("kontak_cp", TRUE));
            $website = $this->db->escape_str($this->input->input_stream("website", TRUE));
            $facebook = $this->db->escape_str($this->input->input_stream("facebook", TRUE));
            $instagram = $this->db->escape_str($this->input->input_stream("instagram", TRUE));
            $username = $this->db->escape_str($this->input->input_stream("username", TRUE));
            $password1 = $this->db->escape_str($this->input->input_stream("password1", TRUE));
            $password2 = $this->db->escape_str($this->input->input_stream("password2", TRUE));


            if ($username == "") {
                $data["verify"] = "1";
                //$this->alert->pesan("error", "Oops...", "Username UKM wajib diisi....");
            } else if ($password1 == "") {
                $data["verify"] = "2";
                //$this->alert->pesan("error", "Oops...", "Password UKM tidak boleh kosong...");
            } else if ($password1 != $password2) {
                $data["verify"] = "3";
                //$this->alert->pesan("error", "Oops...", "Kedua password harus sama...");
            } else if ($nama == "") {
                $data["verify"] = "5";
            } else {
                $query = $this->db->query("SELECT username FROM ukm WHERE username = '$username'")->num_rows();
                if ($query == 1) {
                    $data["verify"] = "4";
                } else {
                    $password3 = password_hash($password1, PASSWORD_DEFAULT);
                    $insert = $this->db->query("INSERT INTO ukm(nama, motto, berdiri, kuota, deskripsi, visi, misi, nama_cp, kontak_cp, website, facebook, instagram, username, password) VALUES('$nama', '$motto', '$tgl_berdiri', '$kuota', '$deskripsi', '$visi', '$misi', '$nama_cp', '$kontak_cp', '$website', '$facebook', '$instagram', '$username', '$password3')");
                    if ($insert) {
                        $data["insert"] = "berhasil";
                        $data["redir"] = base_url("/neo/inputUKM");
                    } else {
                        $data["insert"] = "gagal";
                    }
                }
            }
        }
        if (
            @$this->session->userdata("superadmin") and @$this->session->userdata("superadmin") == "fadhil"
        ) {
            $this->load->view('superadmin/template/header');
            $this->load->view('superadmin/template/sidebar');
            $this->load->view('superadmin/menu/inputukm');
            $this->load->view('superadmin/template/footer');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url());
        }
    }

    public function lihatUKM()
    {
        if (
            @$this->session->userdata("superadmin") and @$this->session->userdata("superadmin") == "fadhil"
        ) {
            $this->load->view('bbmk20/superadmin/template/header');
            $this->load->view('bbmk20/superadmin/template/sidebar');
            $this->load->view('bbmk20/superadmin/menu/lihatukm');
            $this->load->view('bbmk20/superadmin/template/footer');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }

    public function peserta($id = null)
    {
        if (
            @$this->session->userdata("superadmin") and @$this->session->userdata("superadmin") == "fadhil"
        ) {
            $data["id"] = $id;
            $this->load->view('bbmk20/superadmin/template/header');
            $this->load->view('bbmk20/superadmin/template/sidebar');
            $this->load->view('bbmk20/superadmin/menu/peserta', $data);
            $this->load->view('bbmk20/superadmin/template/footer');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }

    public function editUKM($id = null)
    {



        if (isset($_POST["reset"])) {
            $i = $this->db->escape_str($this->input->input_stream("id", TRUE));
            $new_password = password_hash("neotelemetri", PASSWORD_DEFAULT);
            $reset = $this->db->query("UPDATE ukm SET password = '$new_password' WHERE id = '$i'");
            if ($reset) {
                $data["reset"] = "berhasil";
            } else {
                $data["reset"] = "gagal";
            }
        }

        if (isset($_POST["edit"])) {
            $nama = $this->db->escape_str($this->input->input_stream("nama", TRUE));
            $motto = $this->db->escape_str($this->input->input_stream("motto", TRUE));
            $kuota = $this->db->escape_str($this->input->input_stream("kuota", TRUE));
            $deskripsi = $this->db->escape_str($this->input->input_stream("deskripsi", TRUE));
            $visi = $this->db->escape_str($this->input->input_stream("visi", TRUE));
            $misi = $this->db->escape_str($this->input->input_stream("misi", TRUE));;
            $ide = $this->db->escape_str($this->input->input_stream("id", TRUE));
            $video = $this->db->escape_str($this->input->input_stream("linkyt", TRUE));
            $syarat1 = $this->db->escape_str($this->input->input_stream("syarat1", TRUE));
            $syarat2 = $this->db->escape_str($this->input->input_stream("syarat2", TRUE));
            $syarat3 = $this->db->escape_str($this->input->input_stream("syarat3", TRUE));
            $syarat4 = $this->db->escape_str($this->input->input_stream("syarat4", TRUE));
            $syarat5 = $this->db->escape_str($this->input->input_stream("syarat5", TRUE));
            $timeline1 = $this->db->escape_str($this->input->input_stream("tm1", TRUE));
            $timeline2 = $this->db->escape_str($this->input->input_stream("tm2", TRUE));
            $timeline3 = $this->db->escape_str($this->input->input_stream("tm3", TRUE));
            $timeline4 = $this->db->escape_str($this->input->input_stream("tm4", TRUE));

            $edit = $this->db->query("UPDATE ukm SET nama = '$nama', motto = '$motto', kuota = '$kuota', deskripsi = '$deskripsi', visi = '$visi', misi = '$misi', video = '$video',syarat1 ='$syarat1', syarat2 ='$syarat2',syarat3 ='$syarat3',syarat4 ='$syarat4',syarat5 ='$syarat5',timeline1 ='$timeline1',timeline2 ='$timeline2',timeline3 ='$timeline3',timeline4 ='$timeline4'     WHERE id = '$ide'");
            if ($edit) {
                $data["edit"] = "berhasil";
            } else {
                $data["edit"] = "gagal";
            }
        }

        if (isset($_POST["uploadgambar"])) {
            $idukm = $_POST['ided'];

            $nama    =    $_FILES["gambar1"]["name"];
            $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
            $size    =     $_FILES["gambar1"]["size"];
            $tmp     =     $_FILES["gambar1"]["tmp_name"];

            $nama2    =    $_FILES["gambar2"]["name"];
            $ext2     =     pathinfo($nama2, PATHINFO_EXTENSION);
            $size2    =     $_FILES["gambar2"]["size"];
            $tmp2     =     $_FILES["gambar2"]["tmp_name"];

            $nama3    =    $_FILES["gambar3"]["name"];
            $ext3     =     pathinfo($nama3, PATHINFO_EXTENSION);
            $size3    =     $_FILES["gambar3"]["size"];
            $tmp3     =     $_FILES["gambar3"]["tmp_name"];

            $nama4    =    $_FILES["gambar4"]["name"];
            $ext4     =     pathinfo($nama4, PATHINFO_EXTENSION);
            $size4    =     $_FILES["gambar4"]["size"];
            $tmp4     =     $_FILES["gambar4"]["tmp_name"];

            $nama5    =    $_FILES["gambar5"]["name"];
            $ext5     =     pathinfo($nama5, PATHINFO_EXTENSION);
            $size5    =     $_FILES["gambar5"]["size"];
            $tmp5     =     $_FILES["gambar5"]["tmp_name"];


            $nama_baru1 = $id . "-gambar1." . $ext;
            $nama_baru2 = $id . "-gambar2." . $ext2;
            $nama_baru3 = $id . "-gambar3." . $ext3;
            $nama_baru4 = $id . "-gambar4." . $ext4;
            $nama_baru5 = $id . "-gambar5." . $ext5;

            $update = $this->db->query("UPDATE ukm SET  foto1 = '$nama_baru1',foto2 = '$nama_baru2',foto3 = '$nama_baru3',foto4 = '$nama_baru4',foto5 = '$nama_baru5' WHERE username = '" . $id . "'");
            if ($update) {
                $upload1 = move_uploaded_file($tmp, "assets/img/web/$nama_baru1");
                $upload2 = move_uploaded_file($tmp2, "assets/img/web/$nama_baru2");
                $upload3 = move_uploaded_file($tmp3, "assets/img/web/$nama_baru3");
                $upload4 = move_uploaded_file($tmp4, "assets/img/web/$nama_baru4");
                $upload5 = move_uploaded_file($tmp5, "assets/img/web/$nama_baru5");
                echo $upload1;
                if ($upload1 and $upload2 and $upload3 and $upload4 and $upload5) {
                    $this->alert->msg("success", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 0, base_url() . "/superadmin/list");
                }
            } else {
                $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
            }
        }


        if (isset($_POST["uploadlogo"])) {

            $nama    =    $_FILES["logo"]["name"];
            $ext     =     pathinfo($nama, PATHINFO_EXTENSION);
            $size    =     $_FILES["logo"]["size"];
            $tmp     =     $_FILES["logo"]["tmp_name"];


            $nama_baru1 = $id . "-logo." . $ext;


            $update = $this->db->query("UPDATE ukm SET  logo = '$nama_baru1' WHERE username = '" . $id . "'");
            if ($update) {
                $upload1 = move_uploaded_file($tmp, "assets/img/logo/$nama_baru1");


                if ($upload1) {
                    $this->alert->msg("success", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 0, base_url() . "/superadmin/list");
                }
            } else {
                $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
            }
        }


        if (
            @$this->session->userdata("superadmin") and @$this->session->userdata("superadmin") == "fadhil"
        ) {
            $data["id"] = $id;
            $this->load->view('bbmk20/superadmin/template/header');
            $this->load->view('bbmk20/superadmin/template/sidebar');
            $this->load->view('bbmk20/superadmin/menu/editukm', $data);
            $this->load->view('bbmk20/superadmin/template/footer');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }

    public function lihatdokumentasi()
    {
        if (
            @$this->session->userdata("superadmin") and @$this->session->userdata("superadmin") == "fadhil"
        ) {
            $this->load->view('bbmk20/superadmin/template/header');
            $this->load->view('bbmk20/superadmin/template/sidebar');
            $this->load->view('bbmk20/superadmin/menu/dokumentasi');
            $this->load->view('bbmk20/superadmin/template/footer');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }

    public function setting()
    {
        if (isset($_POST["ubahPassword"])) {
            $password1 = $this->db->escape_str($this->input->input_stream("password1", TRUE));
            $password2 = $this->db->escape_str($this->input->input_stream("password2", TRUE));
            $password3 = $this->db->escape_str($this->input->input_stream("password3", TRUE));

            $query = $this->db->query("SELECT password FROM superadmin WHERE username = '" . $this->session->userdata("superadmin") . "'");
            $q = $query->row();
            if (password_verify($password1, $q->password)) {
                if ($password2 != null) {
                    if ($password2 == $password3) {
                        $password = password_hash($password2, PASSWORD_DEFAULT);
                        $update = $this->db->query("UPDATE superadmin SET password = '$password' WHERE username = '" . $this->session->userdata("superadmin") . "'");
                        if ($update) {
                            $data["password"] = "berhasil";
                            $this->alert->msg("berhasil", "1", base_url());
                        } else {
                            $data["password"] = "gagal";
                            $this->alert->msg("error", "Oops...", "Password gagal", "1", base_url());
                        }
                    } else {
                        $data["password"] = "beda";
                        $this->alert->msg("error", "Oops...", "Password Beda", "1", base_url());
                    }
                } else {
                    $data["password"] = "kosong";
                    $this->alert->msg("error", "Oops...", "Password Kosong", "1", base_url());
                }
            } else {
                $data["password"] = "salah";
                $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
            }
        }
        if (@$this->session->userdata("superadmin")) {
            $this->load->view('bbmk20/superadmin/template/header');
            $this->load->view('bbmk20/superadmin/template/sidebar');
            $this->load->view('bbmk20/superadmin/menu/password');
            $this->load->view('bbmk20/superadmin/template/footer');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }

    public function statistik()
    {
        if (
            @$this->session->userdata("superadmin")
        ) {
            $this->load->view('bbmk20/superadmin/template/header');
            $this->load->view('bbmk20/superadmin/template/sidebar');
            $this->load->view('bbmk20/superadmin/menu/statistik');
            $this->load->view('bbmk20/superadmin/template/footer');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }

    public function downloadpeserta()
    {
        if (
            @$this->session->userdata("superadmin")
        ) {
            $this->load->view('bbmk20/report/laporan_peserta');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }

    public function downloadukm()
    {
        if (
            @$this->session->userdata("superadmin")
        ) {
            $this->load->view('bbmk20/report/laporan_ukm');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }

    public function downloadfakultas()
    {
        if (
            @$this->session->userdata("superadmin")
        ) {
            $this->load->view('bbmk20/report/laporan_fakultas');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }

    public function downloadjurusan()
    {
        if (
            @$this->session->userdata("superadmin")
        ) {
            $this->load->view('bbmk20/report/laporan_jurusan');
        } else {
            $this->alert->msg("error", "Oops..", "Anda tidak memiliki izin untuk mengakses halaman ini", 1, base_url() . "/superadmin/list");
        }
    }
}
