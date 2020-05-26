<?php

	class Site_model extends CI_Model {
		function __construct() {
			$this->userTable = 'user';
			$this->cardTable = 'cards';
			$this->reportTable = 'reports';
			$this->retrievePassword = 'retrievePassword';
		}

		function validate() {
			$arr['email'] = $this->input->post('email');
			$arr['password'] = md5($this->input->post('password'));
			return $this->db->get_where($this->userTable, $arr)->row();
		}

		/**
		 * @param $text
		 * @return int
		 */

		function checkUser($text) {
			$this->db->select('COUNT(*) AS cnt');
			$this->db->from($this->userTable);
			$this->db->where('username',$text);
			$result = $this->db->get();
			return $result->first_row()->cnt;
		}

		function checkUserConfirmation($username) {
			$this->db->select('confirm');
			$this->db->from($this->userTable);
			$this->db->where('username', $username);
			$query = $this->db->get();
			return $query->first_row();
		}


		function checkusername(){
			$username = $this->input->post('username');
			$this->db->select('username');
			$this->db->from($this->userTable);
			$this->db->where('deleted', 0);
			$this->db->where('username', $username);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? true : false;
		}

		function countReport(){
			$this->db->select('COUNT(*) AS cnt');
			$this->db->from($this->reportTable);
			$this->db->where('replay !=', null);
			$this->db->where('userId' , $this->session->userdata('data')->id);
			$result = $this->db->get();
			return $result->first_row()->cnt;
		}

		function getById($id) {
			return $this->db->get_where($this->userTable, array('id' => $id, 'deleted' => 0))->row();
		}

		function getReports(){
			$this->db->select('*');
			$this->db->from($this->reportTable);
			$this->db->where('userId', $this->session->userdata('data')->id);
			$query = $this->db->get();
			return $query->result();
		}

		function getUserData($id) {
			$this->db->select('c.code, c.area_id, c.expireAt, u.username, u.phone, u.address, u.created, u.bike, c.user_id, u.email');
			$this->db->from($this->userTable . ' as u');
			$this->db->join($this->cardTable . ' as c', 'c.user_id = u.id');
			$this->db->where('u.deleted', 0);
			$this->db->where('c.deleted', 0);
			$this->db->where('c.expireAt >= ', date('Y-m-d'));
			$this->db->where('u.id', $id);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		}

		function getPaymentHistory(){
			$this->db->select('*');
			$this->db->from($this->cardTable);
			$this->db->where('deleted', 0);
			$this->db->where('user_id', $this->session->userdata('data')->id);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result() : false;
		}


		function save() {
			$firstname = $this->input->post('firstName');
			$lastName = $this->input->post('lastName');
			$arr['name'] = $firstname . ' ' . $lastName;
			$arr['username'] = $this->input->post('username');
			$arr['email'] = $this->input->post('email');
			$arr['phone'] = $this->input->post('phone');
			$arr['address'] = $this->input->post('address');
			$arr['password'] = md5($this->input->post('password'));
//			if ($this->checkUserVerification->deleted == 0){
//				$arr['status'] = 1;
//			}
			$this->db->insert($this->userTable, $arr);
			return $arr;
		}
		
		function saveData(){
		    $this->select('email');
		    $this->from($this->userTable);
		    $this->where('email', $this->input->post('email'));
		    $query =  $this->db->get()->result();
		    return $query;
		    $arr['username'] = $this->input->post('username');
		    $arr['emmail'] = $this->input->post('email');
		    $arr['code'] = substr(uniqid(), -6);
		    $this->db->insert($this->retrievePassword, $arr);

		}

		function saveReport(){
			$arr['userId'] = $this->session->userdata('data')->id;
			$arr['waterError'] = $this->input->post('water');
			$arr['spaceError'] = $this->input->post('space');
			$arr['databaseError'] = $this->input->post('database');
			$arr['note'] = $this->input->post('note');
			$this->db->insert($this->reportTable, $arr);
		}

		function update($arr, $id) {
			$this->db->where(array('id' => $id));
			$this->db->update($this->userTable, $arr);
		}
	}
