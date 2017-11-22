<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->session->flashdata('error'))
        {
            $data['error'] = $this->session->flashdata('error');
            $this->load->view('login_view',$data);
        }
        else
        {
            $this->load->view('admin/login_view');
        }
    }
    
    public function proses()
    {
        if($this->input->post('login'))
        {
            $this->load->model('admin/loginmodel','lgm');
            $u = $this->input->post('username');
            $p = $this->input->post('password');
            $this->load->library('form_validation');
	    $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error','username / password tidak dikenali');
                redirect('adminpanel/login','refresh');
            }
            else
            {
                if($this->lgm->cekLogin($u,$p))
                {
                    $data = array(
                        'username' => $u,
                        'isLoginAdmin' => TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect('adminpanel/home','refresh');
                }
                else
                {
                    $this->session->set_flashdata('error','username / password tidak dikenali');
                    redirect('adminpanel/login','refresh');    
                }
            }
        }
        else
        {
            redirect('adminpanel/login','refresh');
        }
    }
    
    public function out()
    {
        $this->session->sess_destroy();
        redirect('adminpanel/login','refresh');
    }
}