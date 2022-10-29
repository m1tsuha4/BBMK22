<?php
$url = $this->session->userdata("userBBMK19");
redirect(base_url("/cetak/index/$url"));