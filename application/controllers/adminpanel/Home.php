<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('isLoginAdmin') != TRUE)
            redirect('adminpanel/login','refresh');
            
        $this->load->model('admin/usermodel','usm');
        $this->load->model('admin/infomodel','ifm');
    }
    
    public function index()
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['menu'] = 'Home';
        $this->load->helper('text');
        $data['artikelbaru'] = $this->ifm->getArtikelTerbaru(3);
        $this->load->view('admin/home_view',$data);
    }
}