<?php
class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('apimodel','apm');
    }
    
    public function getUserDetail($u)
    {
        $user = $this->apm->getUserDetail($u);
        echo json_encode($user);
    }
}