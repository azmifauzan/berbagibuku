<?php
class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('isLoginAdmin') != TRUE)
            redirect('adminpanel/login','refresh');
        $this->load->model('admin/usermodel','usm');
        $this->load->model('admin/infomodel','ifm');
    }
    
    public function index($off = 0)
    {
        $data['menu'] = 'Artikel';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        
        $data['jaraktif'] = $this->ifm->countArtikelAktif();
        $data['jarpending'] = $this->ifm->countArtikelPending();
        $data['jartolak'] = $this->ifm->countArtikelTolak();
        $data['jardraft'] = $this->ifm->countArtikelDraft();
                
        $total = $this->ifm->countAllArtikel();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('adminpanel/artikel/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikel($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        $this->load->view('admin/artikel_view',$data);
    }
    
    public function terbit($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        
        $data['jaraktif'] = $this->ifm->countArtikelAktif();
        $data['jarpending'] = $this->ifm->countArtikelPending();
        $data['jartolak'] = $this->ifm->countArtikelTolak();
        $data['jardraft'] = $this->ifm->countArtikelDraft();
                
        $total = $this->ifm->countArtikelAktif();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('adminpanel/artikel/terbit');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikelTerbit($config['per_page'],$off);
        $this->load->view('admin/artikelterbit_view',$data);
    }
    
    public function pending($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        
        $data['jaraktif'] = $this->ifm->countArtikelAktif();
        $data['jarpending'] = $this->ifm->countArtikelPending();
        $data['jartolak'] = $this->ifm->countArtikelTolak();
        $data['jardraft'] = $this->ifm->countArtikelDraft();
                
        $total = $this->ifm->countArtikelPending();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('adminpanel/artikel/pending');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikelPending($config['per_page'],$off);
        $this->load->view('admin/artikelpending_view',$data);
    }
    
    public function tolak($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        
        $data['jaraktif'] = $this->ifm->countArtikelAktif();
        $data['jarpending'] = $this->ifm->countArtikelPending();
        $data['jartolak'] = $this->ifm->countArtikelTolak();
        $data['jardraft'] = $this->ifm->countArtikelDraft();
                
        $total = $this->ifm->countArtikelTolak();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('adminpanel/artikel/tolak');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikelTolak($config['per_page'],$off);
        $this->load->view('admin/artikeltolak_view',$data);
    }
    
    public function draft($off = 0)
    {
        $username = $this->session->userdata('username');
        $data['menu'] = 'Artikel';
        $data['user'] = $this->usm->getUserDetail($username);
        
        $data['jaraktif'] = $this->ifm->countArtikelAktif();
        $data['jarpending'] = $this->ifm->countArtikelPending();
        $data['jartolak'] = $this->ifm->countArtikelTolak();
        $data['jardraft'] = $this->ifm->countArtikelDraft();
                
        $total = $this->ifm->countArtikelDraft();                
        $this->load->library('pagination');
        $config["base_url"] = site_url('adminpanel/artikel/draft');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['artikel'] = $this->ifm->getAllArtikelDraft($config['per_page'],$off);
        $this->load->view('admin/artikeldraft_view',$data);
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
        if($this->ifm->artikelExist($id)){
            $username = $this->session->userdata('username');
            $data['menu'] = 'Artikel';        
            $data['user'] = $this->usm->getUserDetail($username);        
            $data['jaraktif'] = $this->ifm->countArtikelAktif();
            $data['jarpending'] = $this->ifm->countArtikelPending();
            $data['jartolak'] = $this->ifm->countArtikelTolak();
            $data['jardraft'] = $this->ifm->countArtikelDraft();
            $data['kategori'] = $this->ifm->getAllKategori();
            $data['artikel'] = $this->ifm->getArtikel($id,$username);
            $data['red'] = $red;
            $this->load->view('admin/artikeledit_view',$data);
        }
        else{
            redirect('artikel');
        }
    }
    
    public function prosesedit($red = '')
    {
        //$this->output->enable_profiler(true);
        if($this->input->post("simpan"))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required|callback_checkKategori');
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
            $ar = $this->ifm->getArtikelDetilFromId($id);
            
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
                    $u = $this->input->post("creator");
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
                        unlink('./uploads/crop/'.$ar->image);
                        unlink('./uploads/thumb/'.substr($ar->image,0,-4)."_thumb".substr($ar->image,-4));
                    }
                    
                    $this->ifm->updateData($u,$id,$judul,$kategori,$isi,$url,$u.'/'.$image["file_name"]);
                    redirect('adminpanel/artikel/'.$red,'refresh');
                }
                else
                {					
                        if(!$this->upload->do_upload())
                            $data["error"] = $this->upload->display_errors('<p class="help-block" style="color:red;">','</p>');
                        $username = $this->input->post('username');
                        $data['menu'] = 'Artikel';        
                        $data['user'] = $this->usm->getUserDetail($username);        
                        $data['jaraktif'] = $this->ifm->countArtikelAktif();
                        $data['jarpending'] = $this->ifm->countArtikelPending();
                        $data['jartolak'] = $this->ifm->countArtikelTolak();
                        $data['jardraft'] = $this->ifm->countArtikelDraft();
                        $data['kategori'] = $this->ifm->getAllKategori();
                        $data['artikel'] = $this->ifm->getArtikel($id,$username);
                        $data['red'] = $red;
                        $this->load->view('admin/artikeledit_view',$data);
                }
            }
            else 
            {	
                    if ($this->form_validation->run())
                    {
                        $u = $this->input->post("creator");
                        $this->ifm->updateDataNoImg($u,$id,$judul,$kategori,$isi,$url);
                        redirect('adminpanel/artikel/'.$red,'refresh');
                    }
                    else 
                    {					
                        $username = $this->session->userdata('username');
                        $data['menu'] = 'Artikel';        
                        $data['user'] = $this->usm->getUserDetail($username);        
                        $data['jaraktif'] = $this->ifm->countArtikelAktif();
                        $data['jarpending'] = $this->ifm->countArtikelPending();
                        $data['jartolak'] = $this->ifm->countArtikelTolak();
                        $data['jardraft'] = $this->ifm->countArtikelDraft();
                        $data['kategori'] = $this->ifm->getAllKategori();
                        $data['artikel'] = $this->ifm->getArtikel($id,$username);
                        $data['red'] = $red;
                        $this->load->view('admin/artikeledit_view',$data);
                    }
            }
        }
        else
        {
            redirect('admin/artikel','refresh');
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
        
        redirect('adminpanel/artikel/'.$red,'refresh');       
    }

    public function publish($id, $red = '')
    {
        $data['menu'] = 'Artikel';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $ar = $this->ifm->getArtikel($id);
        $data['artikel'] = $ar;
        $data['red'] = $red;
        $this->load->view('admin/publish_view',$data);
    }
        
    public function dopublish()
    {
        if($this->input->post('publish'))
        {
            $id = $this->input->post('id');
            $red = $this->input->post('red');
            $this->ifm->setStatus($id,1);
            $ar = $this->ifm->getArtikel($id);
            $user = $this->usm->getMemberDetail($ar->creator);
            $judul = 'Artikel Anda '.$ar->judul.' telah disetujui';
            $isi = 'Artikel Anda yang berjudul: '.$ar->judul.' telah selesai ditinjau oleh moderator kami dan layak untuk diterbitkan di Greatnesia.com';
            $url = 'http://www.greatnesia.com/artikel/baca/'.$ar->url;
            $em = 'Hai '.$user->nama.',<br/><br/>
                Artikel Anda yang berjudul '.$ar->judul.' telah selesai ditinjau oleh reviewer kami dan layak untuk diterbitkan di Greatnesia.com<br/><br/>
                Anda dapat melihat artikel tersebut pada link berikut ini :<br/>'.anchor('http://www.greatnesia.com/artikel/baca/'.$ar->url);
            $this->_tambahNotifikasi($ar,$judul,$isi,$url,$em);

            $pn = $this->input->post('poin');
            $this->ifm->tambahPoin($user->username,$pn);
            redirect('adminpanel/artikel/'.$red);
        }
        else
        {
            redirect('adminpanel/artikel');
        }
    }
    
    public function reject($id,$red = '')
    {
        $data['menu'] = 'Artikel';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $ar = $this->ifm->getArtikel($id);
        $data['artikel'] = $ar;
        $data['red'] = $red;
        $this->load->view('admin/reject_view',$data);
    }
    
    public function doreject()
    {
        if($this->input->post('tolak'))
        {
            $ar = $this->ifm->getArtikel($this->input->post('id'));
            $user = $this->usm->getMemberDetail($ar->creator);
            $this->ifm->setStatus($ar->artikel_id,2);
            $alasan = $this->input->post('alasan');
            $red = $this->input->post('red');
            $judul = 'Maaf, Artikel Anda '.$ar->judul.' tidak disetujui';
            $isi = 'Artikel Anda yang berjudul '.$ar->judul.' telah selesai ditinjau oleh reviewer kami, tetapi tidak dapat diterbitkan di Greatnesia.com, dengan alasan : '.$alasan;
            $url = 'http://www.greatnesia.com/artikel/tolak/';
            $em = 'Hai '.$user->nama.',<br/><br/>
                Artikel Anda yang berjudul '.$ar->judul.' telah selesai ditinjau oleh reviewer kami, tetapi tidak dapat diterbitkan di Greatnesia.com, dengan alasan : '.$alasan.'<br/><br/>';
            $this->_tambahNotifikasi($ar,$judul,$isi,$url,$em);
            redirect('adminpanel/artikel/'.$red);
        }
        else
        {
            redirect('adminpanel/artikel');
        }
    }
    
    public function _tambahNotifikasi($ar,$jd,$isi,$url,$em)
    {
        $user = $this->usm->getMemberDetail($ar->creator);
        $this->usm->insertNotif($ar->creator,$jd,$isi,$url);
        //echo $ar->creator;
        if($user->notifikasi == 1)
        {
            $this->load->library('email');
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $this->email->initialize($config);
            $this->email->from('notifikasi@ripiu.me', 'Notifikasi Sistem Ripiu');
            $this->email->to($user->email);
            $this->email->subject($jd);
            $this->email->message($em.'<br/><br/>
                                  --<br/>
                                  salam<br/>
                                  Tim Ripiu');
            //$this->email->send();
        }
    }
    
    public function preview($id)
    {
        $data['artikel'] = $this->ifm->getArtikelDetilFromId($id);
        $data['url'] = 'http://localdev/ripiu.info2/';
        $this->load->view('preview',$data);
    }
    
}