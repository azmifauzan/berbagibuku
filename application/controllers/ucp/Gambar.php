<?php 
/**
* 
*/
class Gambar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('isLogin') != TRUE)
            redirect('ucp/login','refresh');
        $this->load->model('usermodel','usm');
        $this->load->model('gambarmodel','gbm');
	}

	public function index($off = 0)
	{
		$username = $this->session->userdata('username');
        $data['menu'] = 'Gambar';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);        
                
        $total = $this->gbm->countAllGambar($username);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('ucp/gambar/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['gambar'] = $this->gbm->getAllGambar($username,$config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('gambar_view',$data);
	}

	public function add()
	{
		$username = $this->session->userdata('username');
        $data['menu'] = 'Gambar';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username); 
        $this->load->view('gambaradd_view',$data);
	}

	public function upload()
	{
		$username = $this->session->userdata('username');
		$dir = './uploads/gambar/'.$username;
		if(is_dir($dir) == FALSE){
            mkdir($dir,0777);
            chmod($dir,0777);
        }
		$config['upload_path'] = $dir;
       	$config['allowed_types'] = 'gif|jpg|png';
       	$config['encrypt_name'] = TRUE;	        
        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
        $image = $this->upload->data();
        $ts = $this->input->post('ts');
        $this->gbm->addGambarItem($image['file_name'],$username,$ts);

	}
}