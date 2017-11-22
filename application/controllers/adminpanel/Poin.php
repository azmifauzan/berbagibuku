<?php
/**
* 
*/
class Poin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('isLoginAdmin') != TRUE)
            redirect('adminpanel/login','refresh');
            
        $this->load->model('admin/usermodel','usm');
        $this->load->model('admin/poinmodel','pnm');
	}

	public function index($off = 0)
	{
		$data['menu'] = 'Poin';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['jumbarpoin'] = $this->pnm->countAllBarangPoin();
        $data['jumpengajuan'] = $this->pnm->countPengajuanPenukaran();
        $data['totpengajuan'] = $this->pnm->countAllTukarPoinList();
                
        $total = $this->pnm->countAllTukarPoin();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('adminpanel/poin/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['penukaran'] = $this->pnm->getAllTukarPoin($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('admin/poin_view',$data);
	}

    public function barang($off = 0)
    {
        $data['menu'] = 'Poin';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
                
        $total = $this->pnm->countAllBarangPoin();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('adminpanel/poin/barang');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['barang'] = $this->pnm->getAllBarangPoin($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('admin/barang_view',$data);
    }

    public function all($off = 0)
    {
        $data['menu'] = 'Poin';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['jumbarpoin'] = $this->pnm->countAllBarangPoin();
        $data['jumpengajuan'] = $this->pnm->countPengajuanPenukaran();
        $data['totpengajuan'] = $this->pnm->countAllTukarPoinList();
                
        $total = $this->pnm->countAllTukarPoinList();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('adminpanel/poin/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['penukaran'] = $this->pnm->getAllTukarPoinList($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('admin/poin_view',$data);
    }

    public function verify($id)
    {
        $data['menu'] = 'Poin';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data["tukar"] = $this->pnm->getPenukaranDetil($id);
        $this->load->view('admin/verify_view',$data);
    }

    public function proses()
    {
        if($this->input->post('verify'))
        {
            $kt = $this->input->post('validasi');
            $pid = $this->input->post('pid');
            $this->pnm->updateVerify($kt,$pid);
            redirect('adminpanel/poin','refresh');
        }
        else
        {
            redirect('adminpanel/poin/all','refresh');
        }
    }
}