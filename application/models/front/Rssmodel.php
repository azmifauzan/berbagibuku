<?php
/**
* 
*/
class Rssmodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getLastArtikelDate()
	{
		$this->db->limit(1);
		$this->db->where('status',1);
		$this->db->order_by('tgl_dibuat','desc');
		return $this->db->get('artikel')->row()->tgl_dibuat;
	}

	public function getLatestArtikel($jum)
	{
		$this->db->limit($jum);
		$this->db->where('status',1);
		$this->db->order_by('tgl_dibuat','desc');
		return $this->db->get('artikel');	
	}
}