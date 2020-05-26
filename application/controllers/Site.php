<?php

	/**
	 * @property Site_model $Site_model
	 */
	class Site extends MY_Controller {
		public $path = '/site';

		function __construct() {
			parent::__construct();
			$this->load->model('Site_model');
		}

		function index() {
			$this->load->view('site/login');
		}

		function verify() {
			$check = $this->Site_model->validate();
			if ($check) {
				$this->session->set_userdata('session', $check);
				$this->session->set_flashdata('success', 'Login Successful..');
				redirect('dashboard/index');
			}else{
				$this->session->set_flashdata('danger', 'Wrong Username or Password..');
				redirect($this->index());
			}
		}

		function logout() {
			$this->session->unset_userdata('session');
			$this->session->set_flashdata('success', 'Successfully Logged Out!!');
			redirect(base_url());
		}

	}
