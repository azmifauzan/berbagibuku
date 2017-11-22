<?php
/**
* 
*/
class Poin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('isLogin') != TRUE)
            redirect('ucp/login','refresh');
        $this->load->model('usermodel','usm');
        $this->load->model('poinmodel','pnm');
	}

	public function index($off = 0)
    {
        //$this->output->enable_profiler(true);
    	$username = $this->session->userdata('username');
        $data['menu'] = 'Poin';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $total = $this->pnm->countAllTukarPoin();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('poin/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        
        $data['tupoin'] = $this->pnm->getAllTukarPoin($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('poin_view',$data);
    }

    public function history($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Poin';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $total = $this->pnm->countAllRiwayatPenukaran($username);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('poin/history');
        $config["total_rows"] = $total;
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        
        $data['tupoin'] = $this->pnm->getAllRiwayatPenukaran($config['per_page'],$off,$username);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('poinhistory_view',$data);
    }

    public function tukar($tid)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Poin';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $us = $this->usm->getUserDetail($username);
        $brg = $this->pnm->getDetailBarang($tid);
        if($us->poin >= $brg->poin)
        {
            $data["tukar"] = $this->pnm->getDetailBarang($tid);
            $this->load->view('tukar_view',$data);
        }
        else
        {
            $this->session->set_flashdata('info','Maaf, Poin Anda tidak mencukupi.');
            redirect('ucp/poin','refresh');
        }
    }

    public function proses()
    {
        if($this->input->post('proses'))
        {
            $tid = $this->input->post('tid');
            $ket = $this->input->post('keterangan');
            $username = $this->session->userdata('username');
            $us = $this->usm->getUserDetail($username);
            $brg = $this->pnm->getDetailBarang($tid);
            $this->pnm->simpanPenukaran($tid,$username,$ket);
            $this->usm->kurangiPoin($username,$brg->poin);
            $this->session->set_flashdata('info','Terima Kasih, Penukaran Poin Anda akan segera kami verifikasi greaters.');
            redirect('poin/history','refresh');
        }
        else
        {
            redirect('ucp/poin','refresh');
        }
    }

    public function tukar_old($tid)
    {
        $username = $this->session->userdata('username');
        $us = $this->usm->getUserDetail($username);
        $brg = $this->pnm->getDetailBarang($tid);
        if($us->poin >= $brg->poin)
        {
            $this->pnm->simpanPenukaran($tid,$username);
            $this->usm->kurangiPoin($username,$brg->poin);
            $this->session->set_flashdata('info','Terima Kasih, Penukaran Poin Anda akan segera kami verifikasi greaters.');
            redirect('poin/history','refresh');
        }
        else
        {
            $this->session->set_flashdata('info','Maaf, Poin Anda tidak mencukupi.');
            redirect('ucp/poin','refresh');
        }
    }
}