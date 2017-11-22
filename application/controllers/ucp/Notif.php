<?php
class Notif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('isLogin') != TRUE)
            redirect('ucp/login','refresh');
        $this->load->model('usermodel','usm');
    }
    
    public function index()
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Notifikasi';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
	$data['notif'] = $this->usm->getUnreadNotifikasi($username);
	$data['oldnotif'] = $this->usm->getReadNotifikasi($username,10);
	if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('notif_view',$data);
    }
    
    public function view($id)
    {
	$this->usm->changeStatusNotif($id,2);
	$notif = $this->usm->getNotif($id);
	redirect($notif->url);
    }
    
}