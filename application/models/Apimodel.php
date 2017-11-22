<?php
class Apimodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getUserDetail($u)
    {
        $this->db->select('username,nama,website,biodata,avatar');
        $this->db->where('username',$u);
        return $this->db->get('user')->row();
    }
}