<?php
/**
* 
*/
class Home extends CI_Controller
{	
	function __construct()
	{
        parent::__construct();
        $this->load->model('front/homemodel','hmm');
	}

	public function index($off = 0)
	{
        $total = $this->hmm->countNewArtikel();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('home/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["full_tag_open"] = '<div class="paging">';
        $config["full_tag_close"] = '</div>';
        $config["cur_tag_open"] = '<span class="current">';
        $config["cur_tag_close"] = '</span>';
        $config["next_link"] = 'Next';
        $config["prev_link"] = 'Prev';
        $this->pagination->initialize($config);

        $jumlain = 5;
        $rel = ($off+1) * $jumlain;
        $data['lain'] = $this->hmm->getRelatedArtikel($rel,$jumlain);
        $data["artikel"] = $this->hmm->getNewArtikel($config['per_page'],$off);
        $data["quote"] = $this->hmm->getRandomQuote();
        $this->load->helper('text');
        $this->load->view('front/home_view',$data);
	}

    public function kategori($id,$url,$off = 0)
    {
        $total = $this->hmm->countArtikelKategori($id);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('home/kategori/'.$url);
        $config["total_rows"] = $total;
        $config["per_page"] = 5;
        $config["uri_segment"] = 5;
        $config["full_tag_open"] = '<div class="paging">';
        $config["full_tag_close"] = '</div>';
        $config["cur_tag_open"] = '<span class="current">';
        $config["cur_tag_close"] = '</span>';
        $config["next_link"] = 'Next';
        $config["prev_link"] = 'Prev';
        $this->pagination->initialize($config);

        $jumlain = 5;
        $rel = ($off+1) * $jumlain;
        $data["kat"] = $this->hmm->getKategoriDetil($id);
        $data["title"] = $data["kat"]->nama;
        $data['lain'] = $this->hmm->getRelatedArtikel($rel,$jumlain);
        $data["artikel"] = $this->hmm->getArtikelKategori($config['per_page'],$off,$id);
        $data["quote"] = $this->hmm->getRandomQuote();
        $this->load->helper('text');
        $this->load->view('front/kategori_view',$data);
    }

    public function about()
    {
        $jumlain = 5;
        $rel = 0;
        $data["title"] = "About Us";        
        $data['lain'] = $this->hmm->getRelatedArtikel($rel,$jumlain);
        $data["quote"] = $this->hmm->getRandomQuote();
        $this->load->view('front/about_view',$data);
    }

    public function faq()
    {
        $jumlain = 5;
        $rel = 0;
        $data["title"] = "FAQ";        
        $data['lain'] = $this->hmm->getRelatedArtikel($rel,$jumlain);
        $data["quote"] = $this->hmm->getRandomQuote();
        $this->load->view('front/faq_view',$data);
    }

    public function contact()
    {
        $jumlain = 5;
        $rel = 0;
        $data["title"] = "Contact";        
        $data['lain'] = $this->hmm->getRelatedArtikel($rel,$jumlain);
        $data["quote"] = $this->hmm->getRandomQuote();
        $this->load->view('front/contact_view',$data);
    }
}