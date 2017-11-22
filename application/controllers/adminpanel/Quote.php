<?php
/**
* 
*/
class Quote extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('isLoginAdmin') != TRUE)
            redirect('adminpanel/login','refresh');
        $this->load->model('admin/usermodel','usm');
        $this->load->model('admin/quotemodel','qtm');
	}

	public function index($off = 0)
    {
        $data['menu'] = 'Quote';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
                        
        $total = $this->qtm->countAllQuote();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('adminpanel/quote/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['quote'] = $this->qtm->getAllQuote($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('admin/quote_view',$data);
    }

    public function add()
    {
    	$data['menu'] = 'Quote';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $this->load->view('admin/quoteadd_view',$data);
    }

    public function addp()
    {
    	if($this->input->post('simpan'))
    	{
    		$this->load->library('form_validation');
            $this->form_validation->set_rules('penulis', 'penulis', 'required');
            $this->form_validation->set_rules('isi', 'Isi', 'required');
            if ($this->form_validation->run())
            {
            	$pn = $this->input->post('penulis');
            	$is = $this->input->post('isi');
            	$this->qtm->tambahData($pn,$is);
            	redirect('adminpanel/quote');
            }
            else
            {
            	$data['menu'] = 'Quote';
		        $username = $this->session->userdata('username');
		        $data['user'] = $this->usm->getUserDetail($username);
		        $this->load->view('admin/quoteadd_view',$data);
            }
    	}
    	else
    	{
    		redirect('adminpanel/quote','refresh');
    	}
    }
}