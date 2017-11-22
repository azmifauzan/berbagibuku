<?php
/**
* 
*/
class Poinmodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function countAllTukarPoin()
	{
		$this->db->from('penukaran');
		$this->db->where('status',1);
		return $this->db->count_all_results();
	}

	public function getAllTukarPoin($pg,$off)
	{
		$this->db->where('penukaran.status',1);
		$this->db->order_by('waktu_penukaran','desc');
		$this->db->join('barang_poin','penukaran.tid = barang_poin.tid');
        return $this->db->get('penukaran',$pg,$off);
	}

	public function countAllTukarPoinList()
	{
		$this->db->from('penukaran');
		return $this->db->count_all_results();
	}

	public function getAllTukarPoinList($pg,$off)
	{
		$this->db->order_by('status','asc');
		$this->db->order_by('waktu_penukaran','desc');
		$this->db->join('barang_poin','penukaran.tid = barang_poin.tid');
        return $this->db->get('penukaran',$pg,$off);
	}

	public function countAllBarangPoin()
	{
		$this->db->from('barang_poin');
		return $this->db->count_all_results();
	}

	public function getAllBarangPoin($pg,$off)
	{
		$this->db->order_by('barang','asc');
        return $this->db->get('barang_poin',$pg,$off);
	}

	public function countPengajuanPenukaran()
	{
		$this->db->where('status',1);
		$this->db->from('penukaran');
		return $this->db->count_all_results();
	}

	public function getPenukaranDetil($pid)
	{
		$this->db->where('pid',$pid);
		$this->db->join('barang_poin','penukaran.tid = barang_poin.tid');
		return $this->db->get('penukaran')->row();
	}

	public function updateVerify($kt,$pid)
	{
		$this->db->set('keterangan_konfirmasi',$kt);
		$this->db->set('status',2);
		$this->db->set('waktu_konfirmasi',date('Y-m-d H:i:s'));
		$this->db->where('pid',$pid);
		return $this->db->update('penukaran');
	}
}