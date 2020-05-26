<?php

	class Particulars_model extends CI_Model {
		function __construct() {
			$this->companyTable = 'company';
			$this->corporateTable = 'corporate';
			$this->motorTable = 'motor';
			$this->maidTable = 'maid';
			$this->othersTable = 'others';
		}

		function save($arr) {
			$this->db->insert($this->corporateTable, $arr);
		}

		function update($arr, $id){
			$this->db->update($this->corporateTable, $arr, array('id'=>$id));
		}
		function checkUen($uen) {
			$this->db->select('uen');
			$this->db->from($this->corporateTable);
			$this->db->where('uen', $uen);
			return $this->db->get()->first_row();
		}

		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete($this->corporateTable);
		}

		function getPolicyById($id){
			$this->db->select('*');
			$this->db->from($this->corporateTable);
			$this->db->where('id', $id);
			return $this->db->get()->row();
		}

		function getPolicy(){
			$this->db->select('*');
			$this->db->from($this->corporateTable);
			return $this->db->get();
		}

		function saveMotor($arr) {
			$this->db->insert($this->motorTable, $arr);
		}

		function updateMotor($arr, $id){
			$this->db->update($this->motorTable, $arr, array('id'=>$id));
		}

		function deleteMotor($id){
			$this->db->where('id', $id);
			$this->db->delete($this->motorTable);
		}

		function getMotor(){
			$this->db->select('*');
			$this->db->from($this->motorTable);
			$this->db->order_by('id', 'desc');
			return $this->db->get();
		}

		function getMotorById($id){
			$this->db->select('*');
			$this->db->from($this->motorTable);
			$this->db->where('id', $id);
			return $this->db->get()->row();
		}

		function saveMaid($arr) {
			$this->db->insert($this->maidTable, $arr);
		}

		function updateMaid($arr, $id){
			$this->db->update($this->maidTable, $arr, array('id'=>$id));
		}

		function deleteMaid($id){
			$this->db->where('id', $id);
			$this->db->delete($this->maidTable);
		}

		function getMaid(){
			$this->db->select('*');
			$this->db->from($this->maidTable);
			$this->db->order_by('id', 'desc');
			return $this->db->get();
		}

		function getMaidById($id){
			$this->db->select('*');
			$this->db->from($this->maidTable);
			$this->db->where('id', $id);
			return $this->db->get()->row();
		}

		function saveOthers($arr) {
			$this->db->insert($this->othersTable, $arr);
		}

		function updateOthers($arr, $id){
			$this->db->update($this->othersTable, $arr, array('id'=>$id));
		}

		function deleteOthers($id){
			$this->db->where('id', $id);
			$this->db->delete($this->othersTable);
		}

		function getOthers(){
			$this->db->select('*');
			$this->db->from($this->othersTable);
			$this->db->order_by('id', 'desc');
			return $this->db->get();
		}

		function getOthersById($id){
			$this->db->select('*');
			$this->db->from($this->othersTable);
			$this->db->where('id', $id);
			return $this->db->get()->row();
		}

		function getCompanies(){
			$this->db->select('id, name, code');
			$this->db->from($this->companyTable);
			return $this->db->get()->result();
		}

	}
