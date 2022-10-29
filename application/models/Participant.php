<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Participant extends CI_Model
{

    public function get_data_all()
    {
        return $this->db->get('peserta');
    }

    public function get_ukm_all()
    {
        $query = $this->db->query('SELECT * FROM ukm');
        return $query;
    }

    public function get_participant_all_year()
    {
        $query = $this->db->query("SELECT count(peserta.nama)as 'total_participant', 
        count(if(peserta.tahun=2021,1,null)) as 'y21',
        count(if(peserta.tahun is null,1,null)) as 'y20',
        count(if(peserta.stat_reg = 1 AND peserta.tahun =2021,1,null)) as 'verif21',
        count(if(peserta.stat_reg = 2 AND peserta.tahun =2021,1,null)) as 'not_verif21',
        count(if(peserta.stat_reg = 0 AND peserta.tahun =2021 ,1,null)) as 'nverif21',
        count(if(peserta.kelulusan = 1 AND peserta.tahun =2021,1,null)) as 'pass21',
        count(if(peserta.kelulusan = 2 AND peserta.tahun =2021 ,1,null)) as 'not_pass21',
        count(if(peserta.kelulusan = 0 AND peserta.tahun =2021,1,null)) as 'npass21',
        
        count(if(peserta.stat_reg = 1 AND peserta.tahun is null,1,null)) as 'verif20',
        count(if(peserta.stat_reg = 2 AND peserta.tahun  is null ,1,null)) as 'not_verif20',
        count(if(peserta.stat_reg = 0 AND peserta.tahun  is null ,1,null)) as 'nverif20',
        count(if(peserta.kelulusan = 1 AND peserta.tahun  is null,1,null)) as 'pass20',
        count(if(peserta.kelulusan = 2 AND peserta.tahun  is null ,1,null)) as 'not_pass20',
        count(if(peserta.kelulusan = 0 AND peserta.tahun  is null,1,null)) as 'npass20'
        FROM peserta");
        return $query;
    }


    public function join_participant_all_year()
    {
        $query =  $this->db->query("SELECT count(peserta.nama)as 'total_participant', 
        count(if(peserta.tahun=2021,1,null)) as 'y21',
        count(if(peserta.tahun is null,1,null)) as 'y20',
        peserta.fakultas,fakultas.fakultas as 'nama_fakultas', peserta.id_ukm
        FROM peserta
        LEFT JOIN fakultas on fakultas.id = peserta.fakultas
        GROUP by fakultas.fakultas");
        return $query;
    }

    public function join_major_all()
    {
        $query =  $this->db->query("SELECT count(peserta.nama)as 'total_participant', 
        count(if(peserta.tahun=2021,1,null)) as 'y21',
        count(if(peserta.tahun is null,1,null)) as 'y20',
        peserta.jurusan,jurusan.nama as 'nama_jurusan', fakultas.fakultas, peserta.id_ukm
        FROM jurusan
        LEFT JOIN peserta on jurusan.id = peserta.jurusan
        LEFT JOIN fakultas on jurusan.id_fakultas = fakultas.id
        GROUP by jurusan.nama");
        return $query;
    }


    public function get_all_year($year, $id_ukm)
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->where('tahun', $year);
        $this->db->where('id_ukm', $id_ukm);
        $query = $this->db->get();
        return $query;
    }

    public function get_ukm_data($id_ukm)
    {
        $this->db->select('*');
        $this->db->from('ukm');
        $this->db->where('username', $id_ukm);
        $query = $this->db->get();
        return $query;
    }

    public function get_faculty_data($id, $test)
    {
        $this->db->select('*');
        $this->db->from('fakultas');
        $this->db->where('username', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_participant_reg($year, $reg, $id, $count = False)
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->where('tahun', $year);
        $this->db->where('stat_reg', $reg);
        $this->db->where('id_ukm', $id);
        $query = $this->db->get();
        if ($count) {
            $query = $query->num_rows();
        }
        return $query;
    }

    public function get_participant_stat($year, $stat, $id, $count = False)
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->where('tahun', $year);
        $this->db->where('kelulusan', $stat);
        $this->db->where('id_ukm', $id);
        $query = $this->db->get();
        if ($count) {
            $query = $query->num_rows();
        }
        return $query;
    }

    public function get_participant_gender($year, $gender, $id, $count = False)
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->where('tahun', $year);
        $this->db->where('jk', $gender);
        $this->db->where('id_ukm', $id);
        $query = $this->db->get();
        if ($count) {
            $query = $query->num_rows();
        }
        return $query;
    }

    public function join_faculty_participant($year, $count = False)
    {
        $query =  $this->db->query("SELECT COUNT(peserta.id) as participant,peserta.id_ukm, COUNT(peserta.stat_reg=1) AS 'Diverifikasi',COUNT(peserta.stat_reg=2) AS 'Tidak Diverifikasi',
        COUNT(peserta.stat_reg=0) AS 'Belum Diverifikasi',
        COUNT(peserta.kelulusan=1) AS lulus,
        COUNT(peserta.kelulusan=2) AS 'Tidak Lulus',
        COUNT(peserta.kelulusan=0) AS 'Belum Lulus',
        peserta.id_ukm,
        peserta.fakultas,
        ifnull(fakultas.fakultas,'Belum Dipilih') as 'Nama'
        FROM peserta
        LEFT JOIN fakultas ON fakultas.id = peserta.fakultas 
        WHERE tahun = '$year' 
        GROUP BY(fakultas.fakultas);");
        return $query;
    }

    public function join_faculty_ukm($year, $id_ukm)
    {
        $query =  $this->db->query("SELECT count(peserta.nama) as 'total', peserta.fakultas,fakultas.fakultas as 'nama_fakultas', peserta.id_ukm
        FROM peserta LEFT JOIN fakultas on fakultas.id = peserta.fakultas WHERE tahun = '$year' and peserta.id_ukm = '$id_ukm' GROUP by fakultas.fakultas, peserta.id_ukm");
        return $query;
    }

    public function join_faculty_ukm2($id_ukm)
    {
        $query =  $this->db->query("SELECT count(peserta.nama)as 'total_participant', 
        count(if(peserta.tahun=2021,1,null)) as 'y21',
        count(if(peserta.tahun is null,1,null)) as 'y20',
        peserta.fakultas,fakultas.fakultas as 'nama_fakultas', peserta.id_ukm
        FROM peserta
        LEFT JOIN fakultas on fakultas.id = peserta.fakultas
        WHERE peserta.id_ukm = '$id_ukm'
        GROUP by fakultas.fakultas, peserta.id_ukm");
        return $query;
    }

    public function join_major($id_ukm)
    {
        $query =  $this->db->query("SELECT count(peserta.nama)as 'total_participant', 
        count(if(peserta.tahun=2021,1,null)) as 'y21',
        count(if(peserta.tahun is null,1,null)) as 'y20',
        peserta.jurusan,jurusan.nama as 'nama_jurusan', fakultas.fakultas, peserta.id_ukm
        FROM jurusan
        LEFT JOIN peserta on jurusan.id = peserta.jurusan
        LEFT JOIN fakultas on jurusan.id_fakultas = fakultas.id
        WHERE peserta.id_ukm = '$id_ukm'
        GROUP by jurusan.nama");
        return $query;
    }
}
