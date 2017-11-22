<?php
class Infomodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function tambahPoin($us,$pt)
    {
        $this->db->set('poin','poin+'.$pt,FALSE);
        $this->db->where('username',$us);
        return $this->db->update('user');
    }
    
    public function hitungTotalArtikel($u)
    {
        $this->db->where('creator',$u);
        $this->db->from('artikel');
        return $this->db->count_all_results();
    }
    
    public function getArtikelTerbaru($jum)
    {
        $this->db->limit($jum);
        $this->db->where('status',1);
        $this->db->where('image !=','');
        $this->db->order_by('tgl_dibuat','desc');
        return $this->db->get('artikel');
    }
    
    public function countArtikelAktif()
    {
        $this->db->where('status',1);
        $this->db->from('artikel');
        return $this->db->count_all_results();
    }
    
    public function countArtikelPending()
    {
        $this->db->where('status',0);
        $this->db->from('artikel');
        return $this->db->count_all_results();
    }
    
    public function countArtikelTolak()
    {
        $this->db->where('status',2);
        $this->db->from('artikel');
        return $this->db->count_all_results();
    }
    
    public function countArtikelDraft()
    {
        $this->db->where('status',9);
        $this->db->from('artikel');
        return $this->db->count_all_results();
    }
    
    public function countAllArtikel()
    {
        $this->db->from('artikel');
        return $this->db->count_all_results();
    }
    
    public function getAllArtikel($pg,$off)
    {
        $this->db->order_by('tgl_dibuat','desc');
        $this->db->join('kategori','kategori.kategori_id = artikel.kategori_id');
        return $this->db->get('artikel',$pg,$off);
    }
    
    public function getAllArtikelTerbit($pg,$off)
    {
        $this->db->order_by('tgl_dibuat','desc');
        $this->db->where('status',1);
        $this->db->join('kategori','kategori.kategori_id = artikel.kategori_id');
        return $this->db->get('artikel',$pg,$off);
    }
    
     public function getAllArtikelPending($pg,$off)
    {
        $this->db->order_by('tgl_dibuat','desc');
        $this->db->where('status',0);
        $this->db->join('kategori','kategori.kategori_id = artikel.kategori_id');
        return $this->db->get('artikel',$pg,$off);
    }
    
    public function getAllArtikelTolak($pg,$off)
    {
        $this->db->order_by('tgl_dibuat','desc');
        $this->db->where('status',2);
        $this->db->join('kategori','kategori.kategori_id = artikel.kategori_id');
        return $this->db->get('artikel',$pg,$off);
    }
    
    
    public function getAllArtikelDraft($pg,$off)
    {
        $this->db->order_by('tgl_dibuat','desc');
        $this->db->where('status',9);
        $this->db->join('kategori','kategori.kategori_id = artikel.kategori_id');
        return $this->db->get('artikel',$pg,$off);
    }
    
    public function getAllKategori()
    {
        $this->db->where('group !=','');
        $this->db->order_by('group','asc');
        $this->db->order_by('nama','asc');
        return $this->db->get('kategori');
    }
    
    public function isUrlExist($u)
    {
        $this->db->where('url',$u);
        $this->db->from('artikel');
        $cek = $this->db->count_all_results();
        if($cek > 0)
            return TRUE;
        else
            return FALSE;
    }
    
    public function tambahData($judul,$kategori,$isi,$url,$user,$status,$gambar)
    {
        $data = array(
            'judul' => $judul,
            'url' => $url,
            'kategori_id' => $kategori,
            'isi' => $isi,
            'image' => $gambar,
            'status' => $status,
            'creator' => $user,
            'tgl_dibuat' => date('Y-m-d H:i:s'),
            'status_thumb' => 1
        );
        
        return $this->db->insert('artikel',$data);
    }
    
    public function getArtikel($id)
    {
        $this->db->where('artikel_id',$id);
        $this->db->join('kategori','kategori.kategori_id = artikel.kategori_id');
        return $this->db->get('artikel')->row();
    }
    
    public function updateData($username,$id,$judul,$kategori,$isi,$url,$image)
    {
        $data = array(
            'judul' => $judul,
            'url' => $url,
            'kategori_id' => $kategori,
            'isi' => $isi,
            'image' => $image
        );
        $this->db->where('artikel_id',$id);
        $this->db->where('creator',$username);
        return $this->db->update('artikel',$data);
    }
    
    public function updateDataNoImg($username,$id,$judul,$kategori,$isi,$url)
    {
        $data = array(
            'judul' => $judul,
            'url' => $url,
            'kategori_id' => $kategori,
            'isi' => $isi
        );
        $this->db->where('artikel_id',$id);
        $this->db->where('creator',$username);
        return $this->db->update('artikel',$data);
    }
    
    public function artikelExist($id)
    {
        $this->db->where('artikel_id',$id);
        $this->db->from('artikel');
        $cek = $this->db->count_all_results();
        if($cek > 0)
            return TRUE;
        else
            return FALSE;
    }
    
    public function deleteData($id,$username)
    {
        $this->db->where('artikel_id',$id);
        $this->db->where('creator',$username);
        return $this->db->delete('artikel');
    }
    
    public function ajukan($id,$username)
    {
        $this->db->where('artikel_id',$id);
        $this->db->where('creator',$username);
        $this->db->set('status',0);
        return $this->db->update('artikel');
    }
    
    public function setStatus($id,$status)
    {
        $this->db->where('artikel_id',$id);
        $this->db->set('status',$status);
        return $this->db->update('artikel');
    }
    
    public function getArtikelDetilFromId($id)
    {
        $this->db->where('artikel_id',$id);
        return $this->db->get('artikel')->row();
    }
}