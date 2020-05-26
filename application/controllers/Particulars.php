<?php

	/**
	 * @property Particulars_model $particulars
	 */
	class Particulars extends MY_Controller {
		public $path = '/particulars';

		function __construct() {
			parent::__construct();
			if (!$this->session->userdata('session')) {
				redirect('site/logout');
			}
			$this->load->model('Particulars_model', 'particulars');
		}

		function index() {
			$this->data['title'] = 'Corporate Particulars Holder';
			$this->data['companies'] = $this->particulars->getCompanies();
			$this->makeView('/index');
		}

		function view($id) {
			$this->data['policy'] = $this->particulars->getPolicyById($id);
			$this->data['title'] = 'View';
			$this->makeView('/view');
		}

		function edit($id) {
			$this->data['companies'] = $this->particulars->getCompanies();
			$this->data['policy'] = $this->particulars->getPolicyById($id);
			$this->makeView('/edit');
		}

		function update($id) {
//			return dnp($_POST);
			$arr['uen'] = $this->input->post('uen');
			$arr['company'] = $this->input->post('companyName');
			$arr['typeOfBusiness'] = $this->input->post('typeOfBusiness');
			$arr['employees'] = $this->input->post('employees');
			$arr['contactPerson'] = $this->input->post('contactPerson');
			$arr['email'] = $this->input->post('email');
			$arr['tel'] = $this->input->post('tel');
			$arr['mobile'] = $this->input->post('mobile');
//			$arr['companyID'] = $this->input->post('companyID');
			if ($_POST['type'] != '') {
				$d = array('type'=>$this->input->post('type'), 'discount'=>$this->input->post('discount'));
				$arr['type'] = json_encode($d);
			}
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
			$this->particulars->update($arr, $id);
			$this->session->set_flashdata('success', 'Corporate Policy Updated Successfully.');
			redirect('particulars/index');
		}

		function delete($id) {
			$this->particulars->delete($id);
			$this->session->set_flashdata('success', 'Corporate Policy Successfully Removed..');
			redirect('particulars/index');
		}

		function save() {
//			return dnp($_POST);
			$uen = $arr['uen'] = $this->input->post('uen');
			$arr['company'] = $this->input->post('companyName');
			$arr['typeOfBusiness'] = $this->input->post('typeOfBusiness');
			$arr['employees'] = $this->input->post('employees');
			$arr['contactPerson'] = $this->input->post('contactPerson');
			$arr['email'] = $this->input->post('email');
			$arr['tel'] = $this->input->post('tel');
			$arr['mobile'] = $this->input->post('mobile');
//			$arr['companyID'] = $this->input->post('companyID');
			if ($_POST['type'] != '') {
				$d = array('type'=>$this->input->post('type'), 'discount'=>$this->input->post('discount'));
				$arr['type'] = json_encode($d);
			}
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
			if ($this->particulars->checkUen($uen)) {
				$this->session->set_flashdata('danger', 'UEN Already Exists.');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->particulars->save($arr);
				$this->session->set_flashdata('success', 'Corporate Policy Added Successfully.');
				redirect('particulars/index');
			}
		}

		public function get_policy() {
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$query = $this->particulars->getPolicy();

			$data = [];

			foreach ($query->result() as $r) {
				$data[] = array(
					$r->uen,
					$r->company,
					$r->typeOfBusiness,
					$r->employees,
					$r->contactPerson,
					$r->email,
					$r->mobile,
//					$r->companyName,
					$r->href = '<button onclick="loadPopup(\'' . base_url('particulars/view/') . $r->id . '\')" 
			class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
			<button onclick="loadPopup(\'' . base_url('particulars/edit/') . $r->id . '\')" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>
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

		function maid() {
			$this->data['title'] = 'Personal Maid Insurance';
			$this->makeView('/maid');
		}

		function viewMaid($id) {
			$this->data['maid'] = $this->particulars->getMaidById($id);
			$this->data['title'] = 'View Maid';
			$this->makeView('/viewMaid');
		}

		function editMaid($id) {
			$this->data['companies'] = $this->particulars->getCompanies();
			$this->data['maid'] = $this->particulars->getMaidById($id);
			$this->makeView('/editMaid');
		}

		function updateMaid($id) {
			$arr['name'] = $this->input->post('name');
			$arr['contact'] = $this->input->post('contact');
			$arr['email'] = $this->input->post('email');
			$arr['nric'] = $this->input->post('nric');
			$arr['address'] = $this->input->post('address');
			$arr['service'] = $this->input->post('service');
			$maidInfo = array(
				'maidName' => $this->input->post('maidName'),
				'citizenship' => $this->input->post('citizenship'),
				'dob' => $this->input->post('dob'),
				'maidAddress' => $this->input->post('maidAddress'),
				'emergencyContact' => $this->input->post('emergencyContact'),
				'passport' => $this->input->post('passport'),
				'workPermit' => $this->input->post('workPermit'),
				'coveragePeriod' => $this->input->post('coveragePeriod'),
				'permitType' => $this->input->post('permitType')
			);
			$arr['maidInfo'] = json_encode($maidInfo);
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
			$this->particulars->updateMaid($arr, $id);
			$this->session->set_flashdata('success', 'Maid Policy Updated Successfully.');
			redirect('particulars/maid');
		}

		function deleteMaid($id) {
			$this->particulars->deleteMaid($id);
			$this->session->set_flashdata('success', 'Maid Policy Successfully Removed..');
			redirect('particulars/maid');
		}

		function saveMaid() {
			$arr['name'] = $this->input->post('name');
			$arr['contact'] = $this->input->post('contact');
			$arr['email'] = $this->input->post('email');
			$arr['nric'] = $this->input->post('nric');
			$arr['address'] = $this->input->post('address');
			$arr['service'] = $this->input->post('service');
			$maidInfo = array(
				'maidName' => $this->input->post('maidName'),
				'citizenship' => $this->input->post('citizenship'),
				'dob' => $this->input->post('dob'),
				'maidAddress' => $this->input->post('maidAddress'),
				'emergencyContact' => $this->input->post('emergencyContact'),
				'passport' => $this->input->post('passport'),
				'workPermit' => $this->input->post('workPermit'),
				'coveragePeriod' => $this->input->post('coveragePeriod'),
				'permitType' => $this->input->post('permitType')
			);
			$arr['maidInfo'] = json_encode($maidInfo);
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
			$this->particulars->saveMaid($arr);
			$this->session->set_flashdata('success', 'Maid Policy Added Successfully.');
			redirect('particulars/maid');
		}

		public function get_maid() {
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$query = $this->particulars->getMaid();

			$data = [];

			foreach ($query->result() as $r) {
				$data[] = array(
					$r->nric,
					$r->name,
					$r->contact,
					$r->email,
					$r->address,
					$r->service,
					$r->href = '<button onclick="loadPopup(\'' . base_url('particulars/viewMaid/') . $r->id . '\')" 
			class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
			<button onclick="loadPopup(\'' . base_url('particulars/editMaid/') . $r->id . '\')" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>
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
			$this->makeView('/motor');
		}

		function viewMotor($id) {
			$this->data['motor'] = $this->particulars->getMotorById($id);
			$this->data['title'] = 'View Motor';
			$this->makeView('/viewMotor');
		}

		function editMotor($id) {
			$this->data['motor'] = $this->particulars->getMotorById($id);
			$this->makeView('/editMotor');
		}

		function updateMotor($id) {
			$arr['name'] = $this->input->post('name');
//			$arr['contact'] = $this->input->post('contact');
//			$arr['email'] = $this->input->post('email');
			$arr['dob'] = $this->input->post('dob');
			$arr['nric'] = $this->input->post('nric');
			$arr['occupation'] = $this->input->post('occupation');
			$arr['experiences'] = $this->input->post('experiences');
			$arr['ncd'] = $this->input->post('ncd');
			$arr['year'] = $this->input->post('year');
			$arr['claims'] = $this->input->post('claim');
			$arr['perClaims'] = $this->input->post('perClaims');
			$vehicleInfo = array(
				'driver' => $this->input->post('driver'),
				'vehicleNo' => $this->input->post('vehicleNo'),
				'vehicleMake' => $this->input->post('vehicleMake'),
				'vehicleModel' => $this->input->post('vehicleModel'),
				'registrationDate' => $this->input->post('registrationDate'),
				'engine' => $this->input->post('engine'),
				'currentInsurer' => $this->input->post('currentInsurer'),
				'expireDate' => $this->input->post('expireDate')
			);
			$arr['vehicleInfo'] = json_encode($vehicleInfo);
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
			$this->particulars->updateMotor($arr, $id);
			$this->session->set_flashdata('success', 'Motor Policy Updated Successfully.');
			redirect('particulars/motor');
		}

		function deleteMotor($id) {
			$this->particulars->deleteMotor($id);
			$this->session->set_flashdata('success', 'Motor Policy Successfully Removed..');
			redirect('particulars/motor');
		}

		function saveMotor() {
//			return dnd($_POST);
			$arr['name'] = $this->input->post('name');
//			$arr['contact'] = $this->input->post('contact');
//			$arr['email'] = $this->input->post('email');
			$arr['dob'] = $this->input->post('dob');
			$arr['nric'] = $this->input->post('nric');
			$arr['occupation'] = $this->input->post('occupation');
			$arr['experiences'] = $this->input->post('experiences');
			$arr['ncd'] = $this->input->post('ncd');
			$arr['year'] = $this->input->post('year');
			if ($this->input->post('claims') != '') {
				$arr['claims'] = $this->input->post('claims');
			}
			if ($this->input->post('perClaims') != '') {
				$arr['perClaims'] = $this->input->post('perClaims');
			}
			$vehicleInfo = array(
				'driver' => $this->input->post('driver'),
				'vehicleNo' => $this->input->post('vehicleNo'),
				'vehicleMake' => $this->input->post('vehicleMake'),
				'vehicleModel' => $this->input->post('vehicleModel'),
				'registrationDate' => $this->input->post('registrationDate'),
				'engine' => $this->input->post('engine'),
				'currentInsurer' => $this->input->post('currentInsurer'),
				'expireDate' => $this->input->post('expireDate')
			);
			$arr['vehicleInfo'] = json_encode($vehicleInfo);
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
//			return dnp($arr);
			$this->particulars->saveMotor($arr);
			$this->session->set_flashdata('success', 'Motor Policy Added Successfully.');
			redirect('particulars/motor');
		}

		public function get_motor() {
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$query = $this->particulars->getMotor();

			$data = [];

			foreach ($query->result() as $r) {
				$data[] = array(
					$r->nric,
					$r->name,
//					$r->contact,
//					$r->email,
					$r->dob,
					$r->occupation,
					$r->experiences,
					$r->ncd,
					$r->year,
					$r->claims,
					$r->perClaims,
//					$r->discount,
					$r->href = '<button onclick="loadPopup(\'' . base_url('particulars/viewMotor/') . $r->id . '\')" 
			class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
			<button onclick="loadPopup(\'' . base_url('particulars/editMotor/') . $r->id . '\')" class="btn btn-sm btn-success">
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

		function others() {
			$this->data['title'] = 'Other Insurance';
			$this->makeView('/others');
		}

		function viewOthers($id) {
			$this->data['others'] = $this->particulars->getOthersById($id);
			$this->data['title'] = 'View Others';
			$this->makeView('/viewOthers');
		}

		function editOthers($id) {
			$this->data['companies'] = $this->particulars->getCompanies();
			$this->data['others'] = $this->particulars->getOthersById($id);
			$this->makeView('/editOthers');
		}

		function updateOthers($id) {
			$arr['name'] = $this->input->post('name');
			$arr['contact'] = $this->input->post('contact');
			$arr['email'] = $this->input->post('email');
			$arr['nric'] = $this->input->post('nric');
			$arr['address'] = $this->input->post('address');
			if ($_POST['type'] != '') {
				$d = array('type'=>$this->input->post('type'), 'discount'=>$this->input->post('discount'));
				$arr['type'] = json_encode($d);
			}
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
			$this->particulars->updateOthers($arr, $id);
			$this->session->set_flashdata('success', 'Others Policy Updated Successfully.');
			redirect('particulars/others');
		}

		function deleteOthers($id) {
			$this->particulars->deleteOthers($id);
			$this->session->set_flashdata('success', 'Others Policy Successfully Removed..');
			redirect('particulars/others');
		}

		function saveOthers() {
			$arr['name'] = $this->input->post('name');
			$arr['contact'] = $this->input->post('contact');
			$arr['email'] = $this->input->post('email');
			$arr['nric'] = $this->input->post('nric');
			$arr['address'] = $this->input->post('address');
			if ($_POST['type'] != '') {
				$d = array('type'=>$this->input->post('type'), 'discount'=>$this->input->post('discount'));
				$arr['type'] = json_encode($d);
			}
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
			$this->particulars->saveOthers($arr);
			$this->session->set_flashdata('success', 'Others Policy Added Successfully.');
			redirect('particulars/others');
		}

		public function get_others() {
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$query = $this->particulars->getOthers();

			$data = [];

			foreach ($query->result() as $r) {
				$data[] = array(
					$r->nric,
					$r->name,
					$r->contact,
					$r->email,
					$r->address,
					$r->href = '<button onclick="loadPopup(\'' . base_url('particulars/viewOthers/') . $r->id . '\')" 
			class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
			<a href="javascript:void(0);" onclick="loadPopup(\'' . base_url('particulars/editOthers/') . $r->id . '\')" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
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
