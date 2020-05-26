<?php

	class Type_model extends CI_Model {
		function __construct() {
			$this->companyTable = 'company';
			$this->corporateTable = 'corporate';
			$this->corporateTypeTable = 'corporateType';
			$this->motorTable = 'motor';
			$this->motorTypeTable = 'motorType';
			$this->maidTable = 'maid';
			$this->maidTypeTable = 'maidType';
			$this->othersTable = 'others';
			$this->othersTypeTable = 'othersType';
		}

		function save($arr) {
			$this->db->insert($this->corporateTypeTable, $arr);
		}

		function update($arr, $id) {
			$this->db->update($this->corporateTypeTable, $arr, array('id' => $id));
		}

		function delete($id) {
			$this->db->where('id', $id);
			$this->db->delete($this->corporateTypeTable);
		}

		function getPolicy($searchTerm = "") {
			$this->db->select('*');
			$this->db->from($this->corporateTable);
			$this->db->where("company like '%" . $searchTerm . "%' or uen like '%" . $searchTerm . "%'");
			$users = $this->db->get()->result_array();
			$data = array();
			foreach ($users as $user) {
				$data[] = $user;
			}
			return $data;
		}

		function getPolicyType() {
			$this->db->select('ct.*, c.company, c.uen');
			$this->db->from($this->corporateTypeTable . ' as ct');
			$this->db->join($this->corporateTable . ' as c', 'c.id = ct.corporateId');
//			$this->db->order_by('ct.id', 'desc');
			return $this->db->get();
		}

		function getPolicyById($id) {
			$this->db->select('ct.*, c.uen as uen, c.type as ctType, co.name as company');
			$this->db->from($this->corporateTypeTable . ' as ct');
			$this->db->join($this->corporateTable . ' as c', 'c.id = ct.corporateId');
			$this->db->join($this->companyTable . ' as co', 'co.id = ct.companyID');
			$this->db->where('ct.id', $id);
			return $this->db->get()->row();
		}

		function saveMotor($arr) {
			$this->db->insert($this->motorTypeTable, $arr);
		}

		function updateMotor($arr, $id) {
			$this->db->update($this->motorTypeTable, $arr, array('id' => $id));
		}

		function deleteMotor($id) {
			$this->db->where('id', $id);
			$this->db->delete($this->motorTypeTable);
		}

		// for getting the value in NRIC/FIN No in select2 input box
		function getMotor($searchTerm = "") {
			$this->db->select('*');
			$this->db->from($this->motorTable);
			$this->db->where("name like '%" . $searchTerm . "%' or nric like '%" . $searchTerm . "%'");
			$users = $this->db->get()->result_array();
			$data = array();
			foreach ($users as $user) {
				$data[] = $user;
			}
			return $data;
		}

		function getMotorType() {
			$this->db->select('mt.*, m.nric as nric, m.name as name, c.name as company');
			$this->db->from($this->motorTypeTable . ' as mt');
			$this->db->join($this->motorTable . ' as m', 'm.id = mt.motorId');
			$this->db->join($this->companyTable . ' as c', 'c.id = mt.companyId');
			$this->db->order_by('mt.id', 'desc');
			return $this->db->get();
		}

		function getMotorById($id) {
			$this->db->select('mt.*, m.nric as nric, m.vehicleInfo as vInfo, m.name as name, c.name as company');
			$this->db->from($this->motorTypeTable . ' as mt');
			$this->db->join($this->motorTable . ' as m', 'm.id = mt.motorId');
			$this->db->join($this->companyTable . ' as c', 'c.id = mt.companyId');
			$this->db->where('mt.id', $id);
			return $this->db->get()->row();
		}

		function saveMaid($arr) {
			$this->db->insert($this->maidTypeTable, $arr);
		}

		function updateMaid($arr, $id) {
			$this->db->update($this->maidTypeTable, $arr, array('id' => $id));
		}

		function deleteMaid($id) {
			$this->db->where('id', $id);
			$this->db->delete($this->maidTypeTable);
		}

		function getMaidType() {
			$this->db->select('mt.*, m.nric as nric, m.name as name, c.name as company');
			$this->db->from($this->maidTypeTable . ' as mt');
			$this->db->join($this->maidTable . ' as m', 'm.id = mt.maidId');
			$this->db->join($this->companyTable . ' as c', 'c.id = mt.companyId');
			$this->db->order_by('mt.id', 'desc');
			return $this->db->get();
		}

		function getMaid($searchTerm = "") {
			$this->db->select('*');
			$this->db->from($this->maidTable);
			$this->db->where("name like '%" . $searchTerm . "%' or nric like '%" . $searchTerm . "%'");
			$users = $this->db->get()->result_array();
			$data = array();
			foreach ($users as $user) {
				$data[] = $user;
			}
			return $data;
		}

		function getMaidById($id) {
			$this->db->select('mt.*, m.nric as nric, m.maidInfo as maidInfo, m.name as name, c.name as company');
			$this->db->from($this->maidTypeTable . ' as mt');
			$this->db->join($this->maidTable . ' as m', 'm.id = mt.maidId');
			$this->db->join($this->companyTable . ' as c', 'c.id = mt.companyId');
			$this->db->where('mt.id', $id);
			return $this->db->get()->row();
		}

		function saveOthers($arr) {
			$this->db->insert($this->othersTypeTable, $arr);
		}

		function updateOthers($arr, $id) {
			$this->db->update($this->othersTypeTable, $arr, array('id' => $id));
		}

		function deleteOthers($id) {
			$this->db->where('id', $id);
			$this->db->delete($this->othersTypeTable);
		}

		function getOthers($searchTerm = "") {
			$this->db->select('*');
			$this->db->from($this->othersTable);
			$this->db->where("name like '%" . $searchTerm . "%' or nric like '%" . $searchTerm . "%'");
			$users = $this->db->get()->result_array();
			$data = array();
			foreach ($users as $user) {
				$data[] = $user;
			}
			return $data;
		}

		function getOthersById($id) {
			$this->db->select('mt.*, m.nric as nric, m.name, m.type as ctType, c.name as company');
			$this->db->from($this->othersTypeTable . ' as mt');
			$this->db->join($this->othersTable . ' as m', 'm.id = mt.othersId');
			$this->db->join($this->companyTable . ' as c', 'c.id = mt.companyId');
			$this->db->where('mt.id', $id);
			return $this->db->get()->row();
		}

		function getOthersType() {
			$this->db->select('mt.*, m.nric as nric, m.name as name, c.name as company');
			$this->db->from($this->othersTypeTable . ' as mt');
			$this->db->join($this->othersTable . ' as m', 'm.id = mt.othersId');
			$this->db->join($this->companyTable . ' as c', 'c.id = mt.companyId');
			$this->db->order_by('id', 'desc');
			return $this->db->get();
		}

		function getCompanies() {
			$this->db->select('id, name, code');
			$this->db->from($this->companyTable);
			return $this->db->get()->result();
		}

		//
		function getVeicleNo() {
			$this->db->select('vehicleInfo');
			$this->db->from($this->motorTable);
		}


	}
