<?php
class M_dashboard extends CI_Model
{

    function m_produk_dashboard()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->join('foto_produk', 'foto_produk.id_fotjp = jenis_produk.id_jp');
        $this->db->order_by('id_jp', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->join('foto_produk', 'foto_produk.id_fotjp = jenis_produk.id_jp');
        $this->db->where('foto_produk.status_foto', 'others');
        $this->db->where_in('jenis_produk.gender', array('Adult','Girl', 'Boy'));
        $this->db->group_by('gender');
        $query = $this->db->get();
        return $query->result();
    }

    function m_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori','desc');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    function slide_kategori()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->join('foto_produk', 'foto_produk.id_fotjp = jenis_produk.id_jp');
        $this->db->where('foto_produk.status_foto', 'slide');
        $this->db->order_by('RAND()');
        $query = $this->db->get();
        return $query->result();

    }

    function slide()
    {
        $this->db->select('*');
        $this->db->from('foto_banner');
        $this->db->where('klik_ke', 'kategori');
        $this->db->order_by('RAND()');
        $query = $this->db->get();
        return $query->result();

    }

    function slide_prod()
    {
        $this->db->select('*');
        $this->db->from('foto_banner');
        $this->db->join('jenis_produk', 'foto_banner.id_produk = jenis_produk.id_jp');
        // $this->db->where('layout', 'Banner');
        $this->db->where('klik_ke', 'produk');
        $this->db->order_by('RAND()');
        $query = $this->db->get();
        return $query->result();

    }

    function etalase()
    {
        $this->db->select('*');
        $this->db->from('foto_banner');
        $this->db->where('layout', 'Etalase');
        $this->db->order_by('kategori', 'ASC');
        $query = $this->db->get();
        return $query->result();

    }

    function m_data_produk()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_hrg_produk()
    {
        $this->db->select('*');
        $this->db->from('harga_produk');
        $this->db->order_by('id_hrg', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}