<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('isLogin') != TRUE)
            redirect('ucp/login','refresh');
            
        $this->load->model('usermodel','usm');
        $this->load->model('infomodel','ifm');
    }
    
    public function index()
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['menu'] = 'Home';
        //$data['jartikel'] = $this->ifm->hitungTotalArtikel($username);
        //$data['artikelbaru'] = $this->ifm->getArtikelTerbaru(5);
        //$data['urnotif'] = $this->usm->countUnreadNotif($username);
        $this->load->helper('text');
        $this->load->view('home_view',$data);
    }
}