<?php

	/**
	 * @property Type_model $type
	 */
	class Type extends MY_Controller {
		public $path = '/type';

		function __construct() {
			parent::__construct();
			if (!$this->session->userdata('session')) {
				redirect('site/logout');
			}
			$this->load->model('Type_model', 'type');
		}

		function index() {
			$this->data['title'] = 'Corporate Particulars Holder';
			$this->data['companies'] = $this->type->getCompanies();
			$this->makeView('/index');
		}

		function view($id) {
			$this->data['policy'] = $this->type->getPolicyById($id);
			$this->data['title'] = 'View Corporate Policy';
			$this->makeView('/view');
		}

		function save() {
//			return dnd($_POST);
			$arr['corporateId'] = $this->input->post('une');
			$arr['companyID'] = $this->input->post('companyID');
			$arr['type'] = $this->input->post('type');
			$arr['discount'] = $this->input->post('discount');
			$arr['policyNumber'] = $this->input->post('policyNumber');
			$arr['startDate'] = $this->input->post('startDate');
			$arr['expireDate'] = $this->input->post('expireDate');
			$arr['premiumPaid'] = $this->input->post('premiumPaid');
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
			$this->type->save($arr);
			redirect('type/index');
		}

		function edit($id) {
			$this->data['policy'] = $this->type->getPolicyById($id);
			$this->data['companies'] = $this->type->getCompanies();
			$this->makeView('/edit');
		}

		function update($id){
//			return dnp($_POST);
			$arr['companyID'] = $this->input->post('companyID');
			$arr['type'] = $this->input->post('type');
			$arr['discount'] = $this->input->post('discount');
			$arr['policyNumber'] = $this->input->post('policyNumber');
			$arr['startDate'] = $this->input->post('startDate');
			$arr['expireDate'] = $this->input->post('expireDate');
			$arr['premiumPaid'] = $this->input->post('premiumPaid');
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
			$arr['updateAt'] = date('y-m-d h:i:s');
			$this->type->update($arr, $id);
			$this->session->set_flashdata('success', 'Corporate Insurance Successfully Updated..');
			redirect('type/index');
		}

		function delete($id) {
			$this->type->delete($id);
			$this->session->set_flashdata('success', 'Corporate Insurance Successfully Removed..');
			redirect('type/index');
		}

		function getPolicy(){
			$searchTerm = $this->input->post('searchTerm');
			$response = $this->type->getPolicy($searchTerm);
			echo json_encode($response);
		}

		public function get_policy() {
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$query = $this->type->getPolicyType();

			$data = [];

			foreach ($query->result() as $r) {
				$data[] = array(
					$r->company,
					$r->uen,
					$r->type,
					$r->discount,
					$r->company,
					$r->policyNumber,
					$r->startDate,
					$r->expireDate,
					$r->premiumPaid,
					$r->href = '<button onclick="loadPopup(\'' . base_url('type/view/') . $r->id . '\')" 
			class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
			<button onclick="loadPopup(\'' . base_url('type/edit/') . $r->id . '\')" class="btn btn-sm btn-success">
			<i class="fa fa-edit"></i></button>
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

		function test(){
			$query = $this->type->getPolicyType();
			return dnp($query->result());
		}

		function maid() {
			$this->data['title'] = 'Personal Maid Insurance';
			$this->data['companies'] = $this->type->getCompanies();
			$this->makeView('/maid');
		}

		function viewMaid($id) {
			$this->data['maid'] = $this->type->getMaidById($id);
			$this->data['title'] = 'View Maid';
			$this->makeView('/viewMaid');
		}

		function editMaid($id) {
			$this->data['maid'] = $this->type->getMaidById($id);
			$this->data['companies'] = $this->type->getCompanies();
			$this->makeView('/editMaid');
		}

		function updateMaid($id){
			$arr['maidName'] = $this->input->post('maidName');
			$arr['companyId'] = $this->input->post('companyId');
			$arr['policyNumber'] = $this->input->post('policyNumber');
			$arr['startDate'] = $this->input->post('startDate');
			$arr['expireDate'] = $this->input->post('expireDate');
			$arr['premiumPaid'] = $this->input->post('premiumPaid');
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
			$arr['updateAt'] = date('y-m-d h:i:s');
			$this->type->updateMaid($arr, $id);
			$this->session->set_flashdata('success', 'Personal Maid Insurance Successfully Updated..');
			redirect('type/maid');
		}

		function deleteMaid($id) {
			$this->type->deleteMaid($id);
			$this->session->set_flashdata('success', 'Personal Maid Insurance Successfully Removed..');
			redirect('type/maid');
		}

		function getMaid(){
			$searchTerm = $this->input->post('searchTerm');
			$response = $this->type->getMaid($searchTerm);
			echo json_encode($response);
		}

		function saveMaid() {
//			return dnd($_POST);
			$arr['maidId'] = $this->input->post('nric');
			$arr['maidName'] = $this->input->post('maidName');
			$arr['companyId'] = $this->input->post('companyId');
			$arr['policyNumber'] = $this->input->post('policyNumber');
			$arr['startDate'] = $this->input->post('startDate');
			$arr['expireDate'] = $this->input->post('expireDate');
			$arr['premiumPaid'] = $this->input->post('premiumPaid');
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
			$this->type->saveMaid($arr);
			$this->session->set_flashdata('success', 'Personal Maid Insurance Successfully Saved..');
			redirect('type/maid');
		}

		public function get_maid() {
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$query = $this->type->getMaidType();

			$data = [];

			foreach ($query->result() as $r) {
				$data[] = array(
					$r->name,
					$r->nric,
					$r->maidName,
					$r->company,
					$r->policyNumber,
					$r->startDate,
					$r->expireDate,
					$r->premiumPaid,
					$r->href = '<button onclick="loadPopup(\'' . base_url('type/viewMaid/') . $r->id . '\')" 
			class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
			<button onclick="loadPopup(\'' . base_url('type/editMaid/') . $r->id . '\')" class="btn btn-sm btn-success">
			<i class="fa fa-edit"></i></button>
            <a href="deleteMaid/' . $r->id . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-danger">
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

		function motor() {
			$this->data['title'] = 'Personal Motor Insurance';
			$this->data['companies'] = $this->type->getCompanies();
			$this->makeView('/motor');
		}

		function viewMotor($id) {
			$this->data['motor'] = $this->type->getMotorById($id);
			$this->data['title'] = 'View Motor';
			$this->makeView('/viewMotor');
		}

		function saveMotor() {
//			return dnd($_POST);
			$arr['motorId'] = $this->input->post('nric');
			$arr['vehicleNo'] = $this->input->post('vehicleNo');
			$arr['companyId'] = $this->input->post('companyId');
			$arr['policyNumber'] = $this->input->post('policyNumber');
			$arr['type'] = $this->input->post('type');
			$arr['typeOfCoverage'] = $this->input->post('typeOfCoverage');
			$arr['startDate'] = $this->input->post('startDate');
			$arr['expireDate'] = $this->input->post('expireDate');
			$arr['premiumPaid'] = $this->input->post('premiumPaid');
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
			$this->type->saveMotor($arr);
			$this->session->set_flashdata('success', 'Personal Motor Insurance Successfully Saved..');
			redirect('type/motor');
		}

		function editMotor($id) {
			$this->data['motor'] = $this->type->getMotorById($id);
			$this->data['companies'] = $this->type->getCompanies();
			$this->makeView('/editMotor');
		}

		function updateMotor($id){
			$arr['vehicleNo'] = $this->input->post('vehicleNo');
			$arr['companyId'] = $this->input->post('companyId');
			$arr['policyNumber'] = $this->input->post('policyNumber');
			$arr['type'] = $this->input->post('type');
			$arr['typeOfCoverage'] = $this->input->post('typeOfCoverage');
			$arr['startDate'] = $this->input->post('startDate');
			$arr['expireDate'] = $this->input->post('expireDate');
			$arr['premiumPaid'] = $this->input->post('premiumPaid');
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
			$arr['updateAt'] = date('y-m-d h:i:s');
			$this->type->updateMotor($arr, $id);
			$this->session->set_flashdata('success', 'Personal Motor Insurance Successfully Updated..');
			redirect('type/motor');
		}

		function deleteMotor($id) {
			$this->type->deleteMotor($id);
			$this->session->set_flashdata('success', 'Personal Motor Insurance Successfully Removed..');
			redirect('type/motor');
		}

		// for getting the value in NRIC/FIN No in select2 input box
		function getMotor(){
			$searchTerm = $this->input->post('searchTerm');
			$response = $this->type->getMotor($searchTerm);
			echo json_encode($response);
		}

		public function get_motor() {
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$query = $this->type->getMotorType();

			$data = [];

			foreach ($query->result() as $r) {
				$data[] = array(
					$r->name,
					$r->nric,
					$r->vehicleNo,
					$r->company,
					$r->policyNumber,
					$r->type,
					$r->typeOfCoverage,
					$r->startDate,
					$r->expireDate,
					$r->premiumPaid,
					$r->href = '<button onclick="loadPopup(\'' . base_url('type/viewMotor/') . $r->id . '\')" 
			class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
			<button onclick="loadPopup(\'' . base_url('type/editMotor/') . $r->id . '\')" class="btn btn-sm btn-success">
			<i class="fa fa-edit"></i></button>
            <a href="deleteMotor/' . $r->id . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-danger">
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

		function getMotorByID($id){
			return $this->type->getMotorByID($id);
		}

		function others() {
			$this->data['title'] = 'Other Insurance';
			$this->data['companies'] = $this->type->getCompanies();
			$this->makeView('/others');
		}

		function editOthers($id) {
			$this->data['others'] = $this->type->getOthersById($id);
			$this->data['companies'] = $this->type->getCompanies();
			$this->makeView('/editOthers');
		}

		function updateOthers($id){
			$arr['companyId'] = $this->input->post('companyId');
			$arr['type'] = $this->input->post('type');
			$arr['discount'] = $this->input->post('discount');
			$arr['policyNo'] = $this->input->post('policyNumber');
			$arr['premiumPaid'] = $this->input->post('premiumPaid');
			$arr['startDate'] = $this->input->post('startDate');
			$arr['expireDate'] = $this->input->post('expireDate');
			$arr['updateAt'] = date('y-m-d h:i:s');
			$this->type->updateOthers($arr, $id);
			$this->session->set_flashdata('success', 'Others Insurance Successfully Updated..');
			redirect('type/others');
		}

		function deleteOthers($id) {
			$this->type->deleteOthers($id);
			$this->session->set_flashdata('success', 'Others Insurance Successfully Removed..');
			redirect('type/others');
		}

		function saveOthers() {
//			return dnd($_POST);
			$arr['othersId'] = $this->input->post('nric');
			$arr['type'] = $this->input->post('type');
			$arr['discount'] = $this->input->post('discount');
			$arr['companyId'] = $this->input->post('companyId');
			$arr['policyNo'] = $this->input->post('policyNumber');
			$arr['premiumPaid'] = $this->input->post('premiumPaid');
			$arr['startDate'] = $this->input->post('startDate');
			$arr['expireDate'] = $this->input->post('expireDate');
			$this->type->saveOthers($arr);
			$this->session->set_flashdata('success', 'Others Insurance Successfully Saved..');
			redirect('type/others');
		}

		function getOthers(){
			$searchTerm = $this->input->post('searchTerm');
			$response = $this->type->getOthers($searchTerm);
			echo json_encode($response);
		}

		public function get_others() {
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$query = $this->type->getOthersType();

			$data = [];

			foreach ($query->result() as $r) {
				$data[] = array(
					$r->nric,
					$r->name,
					$r->type,
					$r->discount,
					$r->company,
					$r->policyNo,
					$r->premiumPaid,
					$r->startDate,
					$r->expireDate,
					$r->href = '<button onclick="loadPopup(\'' . base_url('type/editOthers/') . $r->id . '\')" class="btn btn-sm btn-success">
			<i class="fa fa-edit"></i></button>
            <a href="deleteOthers/' . $r->id . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-danger">
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


	}
