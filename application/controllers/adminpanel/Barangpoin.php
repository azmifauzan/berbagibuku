<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barangpoin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('isLoginAdmin') != TRUE)
            redirect('adminpanel/login','refresh');

        $this->load->model('admin/Barangpoinmodel');
        $this->load->library('form_validation');
        $this->load->model('admin/usermodel','usm');
    }

    public function index($off = 0)
    {
        $data['menu'] = 'Poin';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);

        $config["base_url"] = site_url('adminpanel/barangpoin/index');
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $config['total_rows'] = $this->Barangpoinmodel->countAllBarangPoin();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data['barang'] = $this->Barangpoinmodel->getAllBarangPoin($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        
        $this->load->view('admin/barangpoin/index_view', $data);
    }

    public function read($id) 
    {
        $row = $this->Barangpoinmodel->get_by_id($id);
        if ($row) {
            $data = array(
		'tid' => $row->tid,
		'barang' => $row->barang,
		'deskripsi' => $row->deskripsi,
		'poin' => $row->poin,
		'stock' => $row->stock,
	    );
            $this->load->view('admin/barangpoin/barang_poin_read', $data);
        } else {
            $this->session->set_flashdata('info', 'Record Not Found');
            redirect(site_url('adminpanel/barangpoin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('adminpanel/barangpoin/create_action'),
	       'tid' => set_value('tid'),
	       'barang' => set_value('barang'),
	       'deskripsi' => set_value('deskripsi'),
	       'poin' => set_value('poin'),
	       'stock' => set_value('stock'),
	    );
        $data['menu'] = 'Poin';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $this->load->view('admin/barangpoin/barang_poin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'barang' => $this->input->post('barang',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'poin' => $this->input->post('poin',TRUE),
		'stock' => $this->input->post('stock',TRUE),
	    );

            $this->Barangpoinmodel->insert($data);
            $this->session->set_flashdata('info', 'Create Record Success');
            redirect(site_url('adminpanel/barangpoin'));
        }
    }
    
    public function update($id) 
    {

        $row = $this->Barangpoinmodel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('adminpanel/barangpoin/update_action'),
		'tid' => set_value('tid', $row->tid),
		'barang' => set_value('barang', $row->barang),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'poin' => set_value('poin', $row->poin),
		'stock' => set_value('stock', $row->stock),
	    );
            $data['menu'] = 'Poin';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
            $this->load->view('admin/barangpoin/barang_poin_form', $data);
        } else {
            $this->session->set_flashdata('info', 'Record Not Found');
            redirect(site_url('adminpanel/barangpoin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('tid', TRUE));
        } else {
            $data = array(
		'barang' => $this->input->post('barang',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'poin' => $this->input->post('poin',TRUE),
		'stock' => $this->input->post('stock',TRUE),
	    );

            $this->Barangpoinmodel->update($this->input->post('tid', TRUE), $data);
            $this->session->set_flashdata('info', 'Update Record Success');
            redirect(site_url('adminpanel/barangpoin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barangpoinmodel->get_by_id($id);

        if ($row) {
            $this->Barangpoinmodel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('adminpanel/barangpoin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminpanel/barangpoin'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('barang', 'barang', 'trim|required');
    	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
    	$this->form_validation->set_rules('poin', 'poin', 'trim|required');
    	$this->form_validation->set_rules('stock', 'stock', 'trim|required');

    	$this->form_validation->set_rules('tid', 'tid', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function getAllBarangPoin($pg,$off)
    {
        $this->db->order_by('barang','asc');
        return $this->db->get('barang_poin',$pg,$off);
    }

}

/* End of file Barangpoin.php */
/* Location: ./application/controllers/Barangpoin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-15 06:18:11 */
/* http://harviacode.com */