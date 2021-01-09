<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_data extends CI_Model{
		function input_data($data,$table){
            $this->db->insert($table,$data);
        }
        function hapus_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        function update_data($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        }
        function semua($table){
            return $this->db->get($table);
        }
        function where($table,$where){
            return $this->db->get_where($table,$where);
        }
        function ordernya($name,$or,$table){
            $this->db->order_by($name, $or);
            $query = $this->db->get($table);
            return $query;
        }
				function ordernya_limit($name,$or,$table,$limit){
						$this->db->order_by($name, $or);
						$this->db->limit($limit);
						$query = $this->db->get($table);
						return $query;
				}
				function list_berita_page($limit, $start){
					$this->db->order_by('id_berita','DESC');
        	$query = $this->db->get('berita', $limit, $start);
        	return $query;
    		}
				function ordernya_limit_where($where,$name,$or,$table,$limit){
						$this->db->where($where);
            $this->db->order_by($name, $or);
						$this->db->limit($limit);
            $query = $this->db->get($table);
            return $query;
        }

    }
