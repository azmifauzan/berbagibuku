<?php
/**
* 
*/
class Penulis extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('front/artikelmodel','arm');
	}

	public function profil($us, $off = 0)
	{		
		$total = $this->arm->countArtikelUser($us);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('penulis/profil/'.$us);
        $config["total_rows"] = $total;
        $config["per_page"] = 3;
        $config["uri_segment"] = 4;
        $config["full_tag_open"] = '<div class="paging">';
        $config["full_tag_close"] = '</div>';
        $config["cur_tag_open"] = '<span class="current">';
        $config["cur_tag_close"] = '</span>';
        $config["next_link"] = 'Next';
        $config["prev_link"] = 'Prev';
        $this->pagination->initialize($config);

        $jumlain = 5;
        $rel = ($off+1) * $jumlain;
        $data['lain'] = $this->arm->getRelatedArtikel($rel,$jumlain);
        $data["artikel"] = $this->arm->getArtikelUser($config['per_page'],$off,$us);
        $data["quote"] = $this->arm->getRandomQuote();
        $data["penulis"] = $this->arm->getUserDetil($us);
        $this->load->helper('text');
		$this->load->view('front/penulis_view',$data);
	}
}