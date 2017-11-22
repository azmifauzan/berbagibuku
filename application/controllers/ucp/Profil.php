<?php
class Profil extends CI_Controller
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
        $data['menu'] = 'Profil';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
	if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('profil_view',$data);
    }
    
    public function simpan()
    {
	//$this->output->enable_profiler('true');
        if($this->input->post('simpan'))
	{
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    $this->form_validation->set_rules('website', 'Website', 'trim');	
            $this->form_validation->set_rules('biodata', 'Biodata', 'trim');
	    
	    $nama = $this->input->post('nama');
	    $web = $this->input->post('website');
	    $fb = $this->input->post('fb');
	    $tw = $this->input->post('tw');
	    $bio = $this->input->post('biodata');
	    $pass = $this->input->post('password');
	    $username = $this->session->userdata('username');
	    $ava = $this->usm->getUserDetail($username)->avatar;
	    
            if(trim($_FILES["avatar"]["name"])!='')
	    {
                $config['upload_path'] = './uploads/avatar';
                $config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);							    
		    
		if ($this->form_validation->run() && $this->upload->do_upload('avatar'))
		{
		    $image = $this->upload->data();
		    if($image["image_width"] > 100 || $image["image_height"] > 100)
		    {
			/* Resizing Processing */
			$this->load->library('image_lib');
			$img['source_image'] = './uploads/avatar/'.$image["file_name"];
			$img['new_image'] = './uploads/avatar/'.$image["file_name"];;
			$img['image_library'] = 'GD2';				    
			$img['maintain_ratio']= TRUE;		            
			$img['width']  = '100' ;
			$img['height'] = '100' ;
				
			// Do Resizing							
			$this->image_lib->initialize($img);			            			            
			$this->image_lib->resize();			
			$this->image_lib->clear();
		    }
		
		    if($pass == "")
			$this->usm->updateData($this->session->userdata('username'),$nama,$web,$bio,$image["file_name"],$fb,$tw);
		    else
			$this->usm->uodateDataWithPass($this->session->userdata('username'),$nama,$web,$bio,$pass,$image["file_name"],$fb,$tw);
		    
		    $this->session->set_flashdata('info','Profil berhasil diupdate.');

		    if($ava != '')
		    	unlink('uploads/avatar/'.$ava);

		    redirect('ucp/profil','refresh');
		}
		else
		{
		    if(!$this->upload->do_upload())
			$data["error"] = $this->upload->display_errors('<p class="help-block" style="color:red;">','</p>');
		    $username = $this->session->userdata('username');
		    $data['menu'] = 'Profil';
		    $data['user'] = $this->usm->getUserDetail($username);
		    $data['urnotif'] = $this->usm->countUnreadNotif($username);
		    $this->load->view('profil_view',$data);
		}
		
	    }
	    else
	    {
		if ($this->form_validation->run())
		{
		    if($pass == "")
			$this->usm->updateDataNoImg($this->session->userdata('username'),$nama,$web,$bio);
		    else
			$this->usm->uodateDataWithPassNoImg($this->session->userdata('username'),$nama,$web,$bio,$pass);
		    
		    $this->session->set_flashdata('info','Profil berhasil diupdate.');
		    redirect('ucp/profil','refresh');
		}
		else
		{
		    if(!$this->upload->do_upload())
			$data["error"] = $this->upload->display_errors('<p class="help-block" style="color:red;">','</p>');
		    $username = $this->session->userdata('username');
		    $data['menu'] = 'Profil';
		    $data['user'] = $this->usm->getUserDetail($username);
		    $data['urnotif'] = $this->usm->countUnreadNotif($username);
		    $this->load->view('profil_view',$data);
		}
	    }
	}
    }
}