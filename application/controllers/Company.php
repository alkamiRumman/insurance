<?php

	/**
	 * @property Company_model $company
	 */
	class Company extends MY_Controller {
		public $path = '/company';

		function __construct() {
			parent::__construct();
			if (!$this->session->userdata('session')) {
				redirect('site/logout');
			}
			$this->load->model('Company_model', 'company');
		}

		function index() {
			$this->data['title'] = 'Company';
			$this->makeView('/index');
		}

		function delete($id) {
			$this->company->delete($id);
			$this->session->set_flashdata('success', 'Company Successfully Removed..');
			redirect('company/index');
		}

		function edit($id){
			$this->data['company'] = $this->company->getCompanyById($id);
 			$this->makeView('/edit');
		}

		function update($id){
//			return dnp($_POST);
			$arr['code'] = $this->input->post('companyCode');
			$arr['name'] = $this->input->post('companyName');
			$arr['contactPerson'] = $this->input->post('contactPerson');
			$arr['contactNo'] = $this->input->post('contactNo');
			$arr['address'] = $this->input->post('address');
			$arr['email'] = $this->input->post('email');
			$arr['remark'] = $this->input->post('remarks');
			$arr['updateAt'] = date('Y-m-d H:i:s');

			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['overwrite'] = true;

			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			$this->upload->do_upload('file');
			$file = $this->upload->data('file_name');

			if ($file) {
				$arr['file'] = $file;
			}
			$this->company->update($arr, $id);
			$this->session->set_flashdata('success', 'Company Updated Successfully.');
			redirect('company/index');
		}

		function save() {
			$arr['code'] = $this->input->post('companyCode');
			$arr['name'] = $this->input->post('companyName');
			$arr['contactPerson'] = $this->input->post('contactPerson');
			$arr['contactNo'] = $this->input->post('contactNo');
			$arr['address'] = $this->input->post('address');
			$arr['email'] = $this->input->post('email');
			$arr['remark'] = $this->input->post('remarks');

			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['overwrite'] = true;

			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			$this->upload->do_upload('file');
			$file = $this->upload->data('file_name');

			if ($file) {
				$arr['file'] = $file;
			}
			$this->company->save($arr);
			$this->session->set_flashdata('success', 'Company Added Successfully.');
			redirect('company/index');
		}

		public function get_items() {
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$query = $this->company->getCompany();

			$data = [];

			foreach ($query->result() as $r) {
				$data[] = array(
					$r->code,
					$r->name,
					$r->contactPerson,
					$r->contactNo,
					$r->address,
					$r->email,
					$r->href = '<button onclick="loadPopup(\'' . base_url('company/view/') . $r->id . '\')" 
			class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
			<button onclick="loadPopup(\'' . base_url('company/edit/') . $r->id . '\')" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>
            <a href="delete/' . $r->id . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-danger">
            <i class="fa fa-trash"></a>'
				);
			}

			$result = array(
				"draw" => $draw,
				"recordsTotal" => $query->num_rows(),
				"recordsFiltered" => $query->num_rows(),
				"data" => $data
			);

			echo json_encode($result);
			exit();
		}

		function view($id) {
			$this->data['company'] = $this->company->getCompanyById($id);
			$this->data['title'] = 'View';
			$this->makeView('/view');
		}
	}
