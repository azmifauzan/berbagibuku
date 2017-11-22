<?php
class Loginmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function cekLogin($u,$p)
    {
        $this->db->select('username,password');
        $this->db->where('username',$u);
        $qr = $this->db->get('user');
        if($qr->num_rows() == 1)
        {
            $us = $qr->row();
            if(password_verify($p,$us->password))
                return TRUE;
            else
                return FALSE;
        }
        else
        {
            return FALSE;
        }
    }

    public function updateLastAccess($u)
    {
        $this->db->where('username',$u);
        $this->db->set('last_access',date('Y-m-d H:i:s'));
        return $this->db->update('user');
    }
}