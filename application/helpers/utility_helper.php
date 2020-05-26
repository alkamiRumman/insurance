<?php


	function dnd($var){
		echo '<pre style="border-top: 2px solid red; border-bottom: 2px solid green; margin: 5px 0">';
		var_dump($var);
		echo '</pre>';
	}

	function login_url($url){
		echo base_url('site/'.$url);
	}

	function document_url($url){
		echo base_url('images/'.$url);
	}

	function dashboard_url($url){
		echo base_url('dashboard/'.$url);
	}

	function company_url($url){
		echo base_url('company/'.$url);
	}

	function particulars_url($url){
		echo base_url('particulars/'.$url);
	}

	function type_url($url){
		echo base_url('type/'.$url);
	}

	function dnp($var){
		echo '<pre style="border-top: 2px solid red; border-bottom: 2px solid green; margin: 5px 0">';
		print_r($var);
		echo '</pre>';
	}

	function sendJson($data) {
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function maskNumber($number){
		echo substr($number, 0, 2).str_repeat("x", strlen($number)-6) . substr($number, -4);
	}
