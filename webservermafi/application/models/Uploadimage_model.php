<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadimage_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('izin');
    return $this->db->get()->result();
  }

  public function get_by_id($id)
  {
    $this->db->where('id_izin', $id);
    return $this->db->get('izin')->row();
  }

  public function insert($data)
  {
    $this->db->insert('izin', $data);
  }

  public function delete($id)
  {
    $this->db->where('id_izin', $id);
    $this->db->delete('izin');
  }

}
