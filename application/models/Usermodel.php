<?php
class Usermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addUser($us,$ps,$em,$nm)
    {
        $data = array(
            'username' => $us,
            'password' => password_hash($ps, PASSWORD_DEFAULT),
            'email' => strtolower($em),
            'nama' => $nm,
            'created_at' => date('Y-m-d H:i:s'),
        );

        return $this->db->insert('user',$data);
    }
    
    public function getUserDetail($u)
    {
        $this->db->where('username',$u);
        return $this->db->get('user')->row();
    }
    
    public function countUnreadNotif($u)
    {
        $this->db->where('username',$u);
        $this->db->where('status',1);
        $this->db->from('notif');
        return $this->db->count_all_results();
    }
    
    public function updateData($u,$nama,$web,$bio,$img,$fb,$tw)
    {
        $data = array(
            'nama' => $nama,
            'website' =>$web,
            'biodata' => $bio,
            'avatar' => $img,
            'facebook' => $fb,
            'twitter' => $tw
        );
        
        $this->db->where('username',$u);
        return $this->db->update('user',$data);
    }
    
    public function updateDataWithPass($u,$nama,$web,$bio,$pass,$img,$fb,$tw)
    {
        $data = array(
            'nama' => $nama,
            'website' =>$web,
            'biodata' => $bio,
            'avatar' => $img,
            'password' => MD5($pass),
            'facebook' => $fb,
            'twitter' => $tw
        );
        
        $this->db->where('username',$u);
        return $this->db->update('user',$data);
    }
    
    public function updateDataNoImg($u,$nama,$web,$bio)
    {
        $data = array(
            'nama' => $nama,
            'website' =>$web,
            'biodata' => $bio,
        );
        
        $this->db->where('username',$u);
        return $this->db->update('user',$data);
    }
    
    public function updateDataWithPassNoImg($u,$nama,$web,$bio,$pass)
    {
        $data = array(
            'nama' => $nama,
            'website' =>$web,
            'biodata' => $bio,
            'password' => MD5($pass),
        );
        
        $this->db->where('username',$u);
        return $this->db->update('user',$data);
    }
    
    public function getUnreadNotifikasi($u)
    {
        $this->db->where('username',$u);
        $this->db->where('status',1);
        return $this->db->get('notif');
    }
    
    public function getReadNotifikasi($u,$j)
    {
        $this->db->where('username',$u);
        $this->db->where('status',2);
        $this->db->limit($j);
        $this->db->order_by('waktu','desc');
        return $this->db->get('notif');
    }
    
    public function changeStatusNotif($id,$st)
    {
        $this->db->set('status',$st);
        $this->db->where('id',$id);
        $this->db->order_by('waktu','desc');
        return $this->db->update('notif');
    }
    
    public function getNotif($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('notif')->row();
    }

    public function kurangiPoin($us,$pn)
    {
        $this->db->set('poin',"poin-$pn",FALSE);
        $this->db->where('username',$us);
        return $this->db->update('user');
    }
}