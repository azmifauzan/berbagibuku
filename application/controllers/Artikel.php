<?php
/**
* 
*/
class Artikel extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('front/artikelmodel','arm');
	}

	public function baca($id,$url = '')
	{
		$jumlain = 10;
		$data['artikel'] = $this->arm->getArtikelDetil($id);
		$data['title'] = $data['artikel']->judul;
		$data['lain'] = $this->arm->getTopArtikel($jumlain,$id);
		$data["quote"] = $this->arm->getRandomQuote();
		$data["penulis"] = $this->arm->getUserDetil($data["artikel"]->creator);
		$data["footer"] = "yes";
		$this->load->view('front/artikel_view',$data);
	}
}