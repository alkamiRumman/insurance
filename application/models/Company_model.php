<?php

	class Company_model extends CI_Model {
		function __construct() {
			$this->companyTable = 'company';
		}

		function save($arr) {
			$this->db->insert($this->companyTable, $arr);
		}

		function delete($id){
			$this->db->where('id', $id);
			$this->db->delete($this->companyTable);
		}

		function update($arr, $id){
			$this->db->update($this->companyTable, $arr, array('id'=>$id));
		}

		function getCompany(){
			$this->db->select('*');
			$this->db->from($this->companyTable);
			$this->db->order_by('id', 'desc');
			return $this->db->get();
		}

		function getCompanyById($id){
			$this->db->select('*');
			$this->db->from($this->companyTable);
			$this->db->where('id', $id);
			return $this->db->get()->row();
		}

	}
