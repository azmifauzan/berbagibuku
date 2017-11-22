<?php
/**
* 
*/
class Gambarmodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function countAllGambar($us)
	{
		$this->db->where('creator',$us);
		$this->db->from('gambar');
        return $this->db->count_all_results();
	}

	public function getAllGambar($us,$pg,$off)
    {
        $this->db->order_by('tgl_dibuat','desc');
        $this->db->where('creator',$us);        
        return $this->db->get('gambar',$pg,$off);
    }

    public function addGambarItem($gb,$us,$ts)
    {
    	$data = array(
    		'username' => $us,
    		'file' => $gb,
    		'ts' => $ts
    	);
    	$this->db->insert('gambar_item',$data);
    }
}