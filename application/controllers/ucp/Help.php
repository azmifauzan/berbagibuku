<?php
class Help extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('isLogin') != TRUE)
            redirect('login','refresh');
        $this->load->model('usermodel','usm');
    }
    
    public function index()
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Bantuan';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
	if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('help_view',$data);
    }
    
}