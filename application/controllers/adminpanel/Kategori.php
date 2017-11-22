<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if($this->session->userdata('isLoginAdmin') != TRUE)
            redirect('adminpanel/login','refresh');

        $this->load->model('admin/Kategori_model');
        $this->load->library('form_validation');
        $this->load->model('admin/usermodel','usm');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'adminpanel/kategori/index/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'adminpanel/kategori/index/q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'adminpanel/kategori/index';
            $config['first_url'] = base_url() . 'adminpanel/kategori/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategori_model->total_rows($q);
        $kategori = $this->Kategori_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategori_data' => $kategori,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['menu'] = 'Kategori';
        $this->load->view('admin/kategori/kategori_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kategori_id' => $row->kategori_id,
		'nama' => $row->nama,
		'keterangan' => $row->keterangan,
		'group' => $row->group,
	    );
            $this->load->view('admin/kategori/kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminpanel/kategori'));
        }
    }

    public function create() 
    {
        $data = array(
           'button' => 'Create',
           'action' => site_url('adminpanel/kategori/create_action'),
	       'kategori_id' => set_value('kategori_id'),
	       'nama' => set_value('nama'),
	       'keterangan' => set_value('keterangan'),
	       'group' => set_value('group'),
	    );
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['menu'] = 'Kategori';
        $this->load->view('admin/kategori/kategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'group' => $this->input->post('group',TRUE),
	    );

            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('adminpanel/kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('adminpanel/kategori/update_action'),
		        'kategori_id' => set_value('kategori_id', $row->kategori_id),
		        'nama' => set_value('nama', $row->nama),
		        'keterangan' => set_value('keterangan', $row->keterangan),
		        'group' => set_value('group', $row->group),
	        );
            $username = $this->session->userdata('username');
            $data['user'] = $this->usm->getUserDetail($username);
            $data['menu'] = 'Kategori';
            $this->load->view('admin/kategori/kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminpanel/kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kategori_id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'group' => $this->input->post('group',TRUE),
	    );

            $this->Kategori_model->update($this->input->post('kategori_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('adminpanel/kategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $this->Kategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('adminpanel/kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminpanel/kategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('group', 'group', 'trim|required');

	$this->form_validation->set_rules('kategori_id', 'kategori_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-04 11:35:04 */
/* http://harviacode.com */