<?php
/**
* 
*/
class Rss extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('front/rssmodel','rsm');
	}

	public function index()
	{
		$this->load->library('feed');
		$feed = new Feed();
		$feed->title = 'Greatnesia.com - Indonesia Zamrud Khatulistiwa!';
	    $feed->description = 'Greatnesia.com, Informasi positif dari masyarakat untuk Indonesia Hebat!';
	    $feed->link = 'http://www.greatnesia.com';
	    $feed->lang = 'id';
	    $feed->pubdate = $this->rsm->getLastArtikelDate();

	    $this->load->helper('text');
	    $artikel = $this->rsm->getLatestArtikel(10);	    
	    foreach ($artikel->result() as $post)
	    {
	        $feed->add($post->judul, $post->creator, site_url('artikel/baca/'.$post->artikel_id.'/'.$post->url), $post->tgl_dibuat, word_limiter(strip_tags($post->isi),100), $post->isi);
	    }

	    $feed->render('rss');
	}
}