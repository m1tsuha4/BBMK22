<?php

class Smodel extends CI_Model
{

    public function get_data_all()
    {
        return $this->db->get('peserta');
    }
}
