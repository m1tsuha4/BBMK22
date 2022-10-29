<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert{
	public function msg($type=null, $title=null, $text=null, $time=null, $url=null){
		$alert	= "	<html><head>
						<link rel='stylesheet' href='". base_url('/assets/css/sweetalert2.min.css') ."'>
						<script src='". base_url('/assets/js/sweetalert2.min.js') ."'></script>
					</head>
					<body>
						<script>
						swal({
							type: '$type',
							title: '$title',
							text: '$text'
						})
						</script>
						$time";

		if($time != null){
			$alert .= "<meta http-equiv='refresh' content='$time;url=$url'>";
		}
		echo $alert;
	}

	public function pesan($type=null, $title=null, $text=null, $time=null, $url=null){
		$alert	= "<script>
					swal({
						type: '$type',
						title: '$title',
						text: '$text'
					})
					</script>
					$time";

		if($time != null){
			$alert .= "<meta http-equiv='refresh' content='$time;url=$url'>";
		}
		echo $alert;
	}
}