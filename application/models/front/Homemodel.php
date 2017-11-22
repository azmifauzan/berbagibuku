<?php
/**
* 
*/
class Homemodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getNewArtikel($pg,$off)
	{
		$this->db->select('artikel.*');
		$this->db->select('kategori.nama');
		$this->db->where('status',1);
		$this->db->order_by('tgl_dibuat','desc');
		$this->db->join('kategori','artikel.kategori_id = kategori.kategori_id');
		return $this->db->get('artikel',$pg,$off);
	}

	public function countNewArtikel()
	{
		$this->db->where('status',1);
		$this->db->from('artikel');
        return $this->db->count_all_results();
	}

	public function getArtikelKategori($pg,$off,$id)
	{
		$this->db->select('artikel.*');
		$this->db->select('kategori.nama');
		$this->db->where('status',1);
		$this->db->where('artikel.kategori_id',$id);
		$this->db->order_by('tgl_dibuat','desc');
		$this->db->join('kategori','artikel.kategori_id = kategori.kategori_id');
		return $this->db->get('artikel',$pg,$off);
	}

	public function countArtikelKategori($id)
	{
		$this->db->where('kategori_id',$id);
		$this->db->where('status',1);
		$this->db->from('artikel');
        return $this->db->count_all_results();
	}

	public function getKategoriDetil($id)
	{
		$this->db->where('kategori_id',$id);
		return $this->db->get('kategori')->row();
	}

	public function getRelatedArtikel($rel,$jum)
	{
		$this->db->order_by('artikel_id','RANDOM');
		$this->db->limit($jum);
		return $this->db->get('artikel');
	}

	public function getRandomQuote()
	{
		$this->db->limit(1);
		$this->db->order_by('qid', 'RANDOM');
		return $this->db->get('quote')->row();
	}
}