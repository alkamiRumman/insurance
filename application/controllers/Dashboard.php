<?php

	/**
	 * @property Site_model $Site_model
	 */
	class Dashboard extends MY_Controller {
		public $path = '/dashboard';

		function __construct() {
			parent::__construct();
			if (!$this->session->userdata('session')) {
				redirect('site/logout');
			}
			$this->load->model('Site_model');
		}

		function index() {
			$this->data['title'] = 'Dashboard';
			$this->makeView('/index');
		}


	}
