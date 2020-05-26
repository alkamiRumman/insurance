<?php

	class MY_Controller extends CI_Controller {
		public $path;
		public $data = [];
		public $checkUserVerification = [];

		public function __construct() {
			parent::__construct();
			$this->load->library('email');
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://champteks.us';
			$config['smtp_user'] = 'info@ru.champteks.us';
			$config['smtp_pass'] = 'qwerty@2021';
			$config['smtp_port'] = '465';
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
		}

		public function makeView($view) {
			$this->load->view("header", $this->data);
			$this->load->view("navbar", $this->data);
			$this->load->view($this->path.$view, $this->data);
			$this->load->view('footer', $this->data);
		}

	}
