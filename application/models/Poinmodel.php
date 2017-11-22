<?php
/**
* 
*/
class Poinmodel extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function countAllTUkarPoin()
	{
		$this->db->where('stock >',1);
		$this->db->from('barang_poin');
        return $this->db->count_all_results();
	}

	public function countAllRiwayatPenukaran($us)
	{
		$this->db->where('username',$us);
		$this->db->from('penukaran');
        return $this->db->count_all_results();
	}

	public function getAllTukarPoin($pg,$off)
	{
		$this->db->where('stock >',1);
		return $this->db->get('barang_poin',$pg,$off);
	}

	public function getAllRiwayatPenukaran($pg,$off,$us)
	{
		$this->db->where('username',$us);
		$this->db->order_by('waktu_penukaran','desc');
		$this->db->join('barang_poin','penukaran.tid = barang_poin.tid');
		return $this->db->get('penukaran',$pg,$off);
	}

	public function getDetailBarang($tid)
	{
		$this->db->where('tid',$tid);
		return $this->db->get('barang_poin')->row();
	}

	public function simpanPenukaran($tid,$us,$ket)
	{
		$data = array(
			'keterangan_penukaran' => $ket,
			'waktu_penukaran' => date('Y-m-d H:i:s'),
			'username' => $us,
			'tid' => $tid,
			'status' => 1
		);
		return $this->db->insert('penukaran',$data);
	}
}