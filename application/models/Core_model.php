<?php

	class Core_model extends CI_Model {
		function __construct() {
			$this->reportTable = 'reports';
			$this->cardTable = 'cards';
			$this->userTable = 'users';
			$this->areaTable = 'areas';
		}

		function countReport() {
			$this->db->select('COUNT(*) AS cnt');
			$this->db->from($this->reportTable);
			$this->db->where('replay', null);
			$this->db->where('deleted', 0);
			$result = $this->db->get();
			return $result->first_row()->cnt;
		}

		function checkUserVerification() {
			$this->db->select('status');
			$this->db->from($this->userTable);
			$this->db->where('username', 'admin@gmail.com');
			$query = $this->db->get();
			return $query->first_row();
		}

		function changeAreaStatus() {
			$this->db->select('c.expireAt, c.deleted as cdel, c.user_id, a.status,a.id, c.area_id,u.deleted as udel,');
			$this->db->from($this->cardTable . ' as c');
			$this->db->join($this->userTable . ' as u', 'c.user_id = u.id');
			$this->db->join($this->areaTable . ' as a', 'c.area_id = a.id', 'right');
//			$this->db->where('c.deleted', 0);
//			$this->db->where('u.deleted', 0);
			$this->db->order_by('a.id');
			$query = $this->db->get()->result();
//			return $query;
			foreach ($query as $item) {
				//return dnp($item);
				if ($item->cdel == 0 and $item->udel == 0) {
					if ($item->expireAt >= date('Y-m-d')) {
						$this->db->update($this->areaTable, array('status' => 1), array('id' => $item->area_id));
					} else {
						$this->db->update($this->areaTable, array('status' => 0), array('id' => $item->area_id));
					}

				}
				if ($item->area_id == '' or $item->cdel == 1 or $item->udel == 1) {
					$this->db->update($this->areaTable, array('status' => 0), array('id' => $item->id));
				}
			}
		}

//		function changeUserStatus() {
//			$this->db->select('u.*, c.user_id, c.expireAt, c.deleted as cdel');
//			$this->db->from($this->userTable . ' as u');
//			$this->db->join($this->cardTable . ' as c', 'u.id = c.user_id','right');
//			$query = $this->db->get()->result();
//			foreach ($query as $item) {
////				return dnp($item);
//				if ($item->deleted == 0 and $item->cdel == 0) {
////					return dnp(150);
//					if ($item->expireAt >= date('Y-m-d')) {
//						$this->db->update($this->userTable, array('status' => 1), array('id' => $item->user_id));
//					} else {
//						$this->db->update($this->userTable, array('status' => 0), array('id' => $item->user_id));
//					}
//				} else {
////					return dnp(10);
//					if ($item->user_id == '' or $item->cdel == 1 or $item->deleted == 1) {
//					$this->db->update($this->userTable, array('status' => 0), array('id' => $item->user_id));
//					}
//				}
//			}
//		}

		function removeCode(){
			$this->db->select('c.*, u.deleted as udel');
			$this->db->from($this->cardTable. ' as c');
			$this->db->join($this->userTable. ' as u', 'c.user_id = u.id');
			$query = $this->db->get()->result();
//			return dnp($query);
			foreach ($query as $item){
				if ($item->deleted == 1 or $item->udel == 1){
					$this->db->update($this->cardTable, array('code' => ''), array('id' => $item->id));
				}
				elseif ($item->expireAt < date('Y-m-d')){
					$this->db->update($this->cardTable, array('code' => ''), array('id' => $item->id));
				}
			}
		}

	}
