<?php
class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('isLogin') != TRUE)
            redirect('ucp/login','refresh');
        $this->load->model('usermodel','usm');
        $this->load->model('infomodel','ifm');
    }
    
    public function index($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $data['jaraktif'] = $this->ifm->countArtikelAktif($username);
        $data['jarpending'] = $this->ifm->countArtikelPending($username);
        $data['jartolak'] = $this->ifm->countArtikelTolak($username);
        $data['jardraft'] = $this->ifm->countArtikelDraft($username);
                
        $total = $this->ifm->countAllArtikel($username);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('ucp/artikel/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikel($username,$config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('artikel_view',$data);
    }
    
    public function terbit($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $data['jaraktif'] = $this->ifm->countArtikelAktif($username);
        $data['jarpending'] = $this->ifm->countArtikelPending($username);
        $data['jartolak'] = $this->ifm->countArtikelTolak($username);
        $data['jardraft'] = $this->ifm->countArtikelDraft($username);
                
        $total = $this->ifm->countArtikelAktif($username);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('ucp/artikel/terbit');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikelTerbit($username,$config['per_page'],$off);
        $this->load->view('artikelterbit_view',$data);
    }
    
    public function pending($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $data['jaraktif'] = $this->ifm->countArtikelAktif($username);
        $data['jarpending'] = $this->ifm->countArtikelPending($username);
        $data['jartolak'] = $this->ifm->countArtikelTolak($username);
        $data['jardraft'] = $this->ifm->countArtikelDraft($username);
                
        $total = $this->ifm->countArtikelPending($username);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('ucp/artikel/pending');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikelPending($username,$config['per_page'],$off);
        $this->load->view('artikelpending_view',$data);
    }
    
    public function tolak($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $data['jaraktif'] = $this->ifm->countArtikelAktif($username);
        $data['jarpending'] = $this->ifm->countArtikelPending($username);
        $data['jartolak'] = $this->ifm->countArtikelTolak($username);
        $data['jardraft'] = $this->ifm->countArtikelDraft($username);
                
        $total = $this->ifm->countArtikelTolak($username);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('ucp/artikel/tolak');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikelTolak($username,$config['per_page'],$off);
        $this->load->view('artikeltolak_view',$data);
    }
    
    public function draft($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $data['jaraktif'] = $this->ifm->countArtikelAktif($username);
        $data['jarpending'] = $this->ifm->countArtikelPending($username);
        $data['jartolak'] = $this->ifm->countArtikelTolak($username);
        $data['jardraft'] = $this->ifm->countArtikelDraft($username);
                
        $total = $this->ifm->countArtikelDraft($username);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('ucp/artikel/draft');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikelDraft($username,$config['per_page'],$off);
        $this->load->view('artikeldraft_view',$data);
    }
    
    public function tambah()
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $data['kategori'] = $this->ifm->getAllKategori();
        $this->load->view('artikeladd_view',$data);
    }
    
    public function proses()
    {
        //$this->output->enable_profiler(true);
        if($this->input->post("publish"))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
	        $this->form_validation->set_rules('artikel', 'Artikel', 'trim|required');
            
            $config['upload_path'] = './uploads';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['encrypt_name'] = TRUE;	
            
            $this->load->library('upload', $config);
            $judul = $this->input->post("judul");
            $kategori = $this->input->post("kategori");
            $isi = $this->input->post("artikel");
            $url = url_title(strtolower($judul));
            
            if($this->input->post("publish") == 'Publish Artikel')
                $status = 0;
            else
                $status = 9;
                
            $i=1;
            while($this->ifm->isUrlExist($url))
            {
                $i++;
                $url = $url.'-'.$i;
            }
            
            if(trim($_FILES["fileimage"]["name"])!='')	
            {					
                if ($this->form_validation->run() && $this->upload->do_upload('fileimage'))
                {					
                    $image = $this->upload->data();
                    if($image["image_width"] != 700 || $image["image_height"] != 400)
                    {
                        $u = $this->session->userdata("username");
                        $dircrop = "./uploads/crop/".$u;
                        $dirthumb = "./uploads/thumb/".$u;
                        if(is_dir($dircrop) == FALSE){
                            mkdir($dircrop,0777);
                            chmod($dircrop,0777);
                        }
                        if(is_dir($dirthumb) == FALSE){
                            mkdir($dirthumb,0777);
                            chmod($dirthumb,0777);
                        }
                        
                        $this->load->library('image_lib') ;
    
                        $config['image_library'] = 'GD2';
                        $config['source_image'] = './uploads/'.$image["file_name"];						
                        $config['new_image'] = $dircrop;
                        $img['maintain_ratio']= TRUE;		            
                        $config['width']  = '700' ;
                        $config['height'] = '400' ;
                        $this->image_lib->initialize($config); 
                        $this->image_lib->resize();						
                        $this->image_lib->clear();
                    
                        /*
                        $config['image_library'] = 'GD2';
                        $config['source_image'] = './uploads/crop/'.$u.'/'.$image["file_name"];						
                        $config['new_image'] = $dircrop;
                        $config['x_axis'] = '0';
                        $config['y_axis'] = '0';
                        $config['width']  = '300' ;
                        $config['height'] = '300' ;
                                
                        $this->image_lib->initialize($config); 
                        $this->image_lib->crop();						
                        $this->image_lib->clear();
                        */
                                
                        $config['image_library'] = 'GD2';
                        $config['source_image'] = './uploads/crop/'.$u.'/'.$image["file_name"];							
                        $config['new_image'] = $dirthumb;
                        $config['maintain_ratio']= TRUE;		            
                        $config['width']  = '150' ;
                        $config['height'] = '150' ;
                        $config['create_thumb'] = TRUE;
                        $config['thumb_marker'] = "_thumb";
                        $this->image_lib->initialize($config); 
                        $this->image_lib->resize();	
                        $this->image_lib->clear();
                        
                        unlink('./uploads/'.$image["file_name"]);
                    }
                    
                    $this->ifm->tambahData($judul,$kategori,$isi,$url,$u,$status,$u.'/'.$image["file_name"]);
                    if($this->input->post("publish") == 'Publish Artikel')
                        $this->session->set_flashdata('info','Artikel berhasil ditambahkan, Moderator kami akan mereview artikel tersebut secepatnya.');
                    else
                        $this->session->set_flashdata('info','Artikel berhasil disimpan.');
                    redirect('ucp/artikel','refresh');
                }
                else
                {					
                        if(!$this->upload->do_upload())
                            $data["error"] = $this->upload->display_errors('<p class="help-block" style="color:red;">','</p>');
                        $username = $this->session->userdata('username');
                        $data['menu'] = 'Artikel';
                        $data['user'] = $this->usm->getUserDetail($username);
                        $data['urnotif'] = $this->usm->countUnreadNotif($username);
                        $data['kategori'] = $this->ifm->getAllKategori();
                        $this->load->view('artikeladd_view',$data);
                }
            }
            else 
            {	
                    if ($this->form_validation->run())
                    {					
                        $this->ifm->tambahData($judul,$kategori,$isi,$url,$this->session->userdata('username'),$status,'');
                        if($this->input->post("publish") == 'Publish Artikel')
                            $this->session->set_flashdata('info','Artikel berhasil ditambahkan, Moderator kami akan mereview artikel tersebut secepatnya.');
                        else
                            $this->session->set_flashdata('info','Artikel berhasil disimpan.'); 
                        redirect('ucp/artikel','refresh');
                    }
                    else 
                    {					
                        $username = $this->session->userdata('username');
                        $data['menu'] = 'Artikel';
                        $data['user'] = $this->usm->getUserDetail($username);
                        $data['urnotif'] = $this->usm->countUnreadNotif($username);
                        $data['kategori'] = $this->ifm->getAllKategori();
                        $this->load->view('artikeladd_view',$data);
                    }
            }
            
        }
        else{
            redirect('ucp/artikel/tambah','refresh');
        }
    }
    
    function checkKata($isi)
    {
        $string = trim(preg_replace("/\s+/"," ",strip_tags($isi)));   
        $word_array = explode(" ", $string);   
        $num = count($word_array);
        if($num < 300 )
        {
            $this->form_validation->set_message('checkKata', 'Tulisan Anda kurang dari 300 kata !');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    function checkKategori($kat)
    {
        if($kat == 0){
            $this->form_validation->set_message('checkKategori', 'Silahkan pilih kategori yang cocok untuk artikel Anda');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function edit($id,$red='')
    {
        $username = $this->session->userdata('username');
        if($this->ifm->artikelExist($id,$username)){
            $data['menu'] = 'Artikel';
            $data['user'] = $this->usm->getUserDetail($username);
            $data['urnotif'] = $this->usm->countUnreadNotif($username);
            $data['kategori'] = $this->ifm->getAllKategori();
            $data['artikel'] = $this->ifm->getArtikel($id,$username);
            $data['red'] = $red;
            $this->load->view('artikeledit_view',$data);
        }
        else{
            redirect('ucp/artikel');
        }
    }
    
    public function prosesedit($red = '')
    {
        //$this->output->enable_profiler(true);
        if($this->input->post("simpan"))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
	       $this->form_validation->set_rules('artikel', 'Artikel', 'trim|required');
            
            $config['upload_path'] = './uploads';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['encrypt_name'] = TRUE;	
            
            $this->load->library('upload', $config);
            $judul = $this->input->post("judul");
            $kategori = $this->input->post("kategori");
            $isi = $this->input->post("artikel");
            $url = url_title(strtolower($judul));
            $id = $this->input->post("id");
            
            $i=1;
            while($this->ifm->isUrlExist($url))
            {
                $i++;
                $url = $url.'-'.$i;
            }
            
            if(trim($_FILES["fileimage"]["name"])!='')	
            {					
                if ($this->form_validation->run() && $this->upload->do_upload('fileimage'))
                {
                    $imgbefore = $this->ifm->getArtikelDetilFromId($id)->image;					
                    $image = $this->upload->data();
                    $u = $this->session->userdata("username");
                    if($image["image_width"] != 700 || $image["image_height"] != 400)
                    { 						
                        $dircrop = "./uploads/crop/".$u;
                        $dirthumb = "./uploads/thumb/".$u;
                        if(is_dir($dircrop) == FALSE){
                            mkdir($dircrop,0777);
                            chmod($dircrop,0777);
                        }
                        if(is_dir($dirthumb) == FALSE){
                            mkdir($dirthumb,0777);
                            chmod($dirthumb,0777);
                        }
                        
                        $this->load->library('image_lib') ;
    
                        $config['image_library'] = 'GD2';
                        $config['source_image'] = './uploads/'.$image["file_name"];						
                        $config['new_image'] = $dircrop;
                        $img['maintain_ratio']= TRUE;		            
                        $config['width']  = '700' ;
                        $config['height'] = '400' ;
                        $this->image_lib->initialize($config); 
                        $this->image_lib->resize();						
                        $this->image_lib->clear();
                    
                        /*
                        $config['image_library'] = 'GD2';
                        $config['source_image'] = './uploads/crop/'.$u.'/'.$image["file_name"];						
                        $config['new_image'] = $dircrop;
                        $config['x_axis'] = '0';
                        $config['y_axis'] = '0';
                        $config['width']  = '300' ;
                        $config['height'] = '300' ;                        
                                
                        $this->image_lib->initialize($config); 
                        $this->image_lib->crop();						
                        $this->image_lib->clear();
                        */
                                
                        $config['image_library'] = 'GD2';
                        $config['source_image'] = './uploads/crop/'.$u.'/'.$image["file_name"];							
                        $config['new_image'] = $dirthumb;
                        $config['maintain_ratio']= TRUE;		            
                        $config['width']  = '150' ;
                        $config['height'] = '150' ;
                        $config['create_thumb'] = TRUE;
                        $config['thumb_marker'] = "_thumb";
                        $this->image_lib->initialize($config); 
                        $this->image_lib->resize();	
                        $this->image_lib->clear();
                        
                        unlink('./uploads/'.$image["file_name"]);
                        unlink("uploads/crop/".$imgbefore);
                        unlink("uploads/thumb/".substr($imgbefore,0,-4)."_thumb".substr($imgbefore,-4));
                    }
                    
                    $this->ifm->updateData($u,$id,$judul,$kategori,$isi,$url,$u.'/'.$image["file_name"]);
                    redirect('artikel/'.$red,'refresh');
                }
                else
                {					
                        if(!$this->upload->do_upload())
                            $data["error"] = $this->upload->display_errors('<p class="help-block" style="color:red;">','</p>');
                        $username = $this->session->userdata('username');
                        $data['menu'] = 'Artikel';
                        $data['user'] = $this->usm->getUserDetail($username);
                        $data['urnotif'] = $this->usm->countUnreadNotif($username);
                        $data['kategori'] = $this->ifm->getAllKategori();
                        $data['artikel'] = $this->ifm->getArtikel($id,$username);
                        $data['red'] = $red;
                        $this->load->view('artikeledit_view',$data);
                    
                }
            }
            else 
            {	
                    if ($this->form_validation->run())
                    {
                        $u = $this->session->userdata("username");
                        $this->ifm->updateDataNoImg($u,$id,$judul,$kategori,$isi,$url);
                        redirect('ucp/artikel/'.$red,'refresh');
                    }
                    else 
                    {					
                        $username = $this->session->userdata('username');
                        $data['menu'] = 'Artikel';
                        $data['user'] = $this->usm->getUserDetail($username);
                        $data['urnotif'] = $this->usm->countUnreadNotif($username);
                        $data['kategori'] = $this->ifm->getAllKategori();
                        $data['artikel'] = $this->ifm->getArtikel($id,$username);
                        $data['red'] = $red;
                        $this->load->view('artikeleditview',$data);
                    }
            }
        }
        else
        {
            redirect('ucp/artikel','refresh');
        }
    }
    
    public function delete($id,$red = '')
    {
        $username = $this->session->userdata('username');
        if($this->ifm->artikelExist($id,$username)){
            $imgbefore = $this->ifm->getArtikelDetilFromId($id)->image;
            $this->ifm->deleteData($id,$username);
            unlink("uploads/crop/".$imgbefore);
            unlink("uploads/thumb/".substr($imgbefore,0,-4)."_thumb".substr($imgbefore,-4));
        }
        
        redirect('ucp/artikel/'.$red,'refresh');       
    }
    
    public function ajukan($id,$red = '')
    {
        $username = $this->session->userdata('username');
        if($this->ifm->artikelExist($id,$username)){
            $this->ifm->ajukan($id,$username);
            $this->session->set_flashdata('info','Artikel berhasil diajukan, Moderator kami akan mereview artikel tersebut secepatnya.');
        }
        
        redirect('ucp/artikel/'.$red,'refresh');   
    }
    
    public function preview($id)
    {
        $data['artikel'] = $this->ifm->getArtikelDetilFromId($id);
        $data['url'] = base_url();
        $this->load->view('preview',$data);
    }
    
    public function cari($key = '',$off = 0)
    {
        //$this->output->enable_profiler(true);
        if($key == '')
            $key = $this->input->post('keyword');
        else
            $key = urldecode($key);          
        
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        $data['urnotif'] = $this->usm->countUnreadNotif($username);
        $data['jaraktif'] = $this->ifm->countArtikelAktif($username);
        $data['jarpending'] = $this->ifm->countArtikelPending($username);
        $data['jartolak'] = $this->ifm->countArtikelTolak($username);
        $data['jardraft'] = $this->ifm->countArtikelDraft($username);
                
        $total = $this->ifm->countAllArtikelSearch($username,$key);                
        $this->load->library('pagination');
        $config["base_url"] = site_url('ucp/artikel/cari/'.$key);
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikelSearch($username,$key,$config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('cari_view',$data);
    }
}