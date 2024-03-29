<?php
class M_olah_data extends CI_Model
{

    function m_list_jenis_produk()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->order_by('id_jp', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_list_pengaturan(){
        $this->db->select('*');
        $this->db->from('pengaturan');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_list_quotes(){
        $this->db->select('*');
        $this->db->from('quots');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_list_foto_produk()
    {
        $this->db->select('*');
        $this->db->from('foto_produk');
        $this->db->join('jenis_produk', 'jenis_produk.id_jp = foto_produk.id_fotjp');
        $this->db->order_by('id_fotpro', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_list_foto_banner()
    {
        $this->db->select('*');
        $this->db->from('foto_banner');
        $this->db->order_by('id_banner', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_list_harga_produk()
    {
        $this->db->select('*');
        $this->db->from('harga_produk');
        $this->db->join('jenis_produk', 'jenis_produk.id_jp = harga_produk.id_hrg_produk');
        $this->db->order_by('id_jp', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_get_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query->result();
    }

    function m_get_produk()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $query = $this->db->get();
        return $query->result();
    }


    function m_simpan_jenis_produk($data)
    {
        $result = $this->db->insert('jenis_produk', $data);
        return $result;
    }

    function m_edit_jenis_produk($id_jp, $nm_jp, $kategori, $gender, $desk)
    {
        $hasil = $this->db->query("UPDATE jenis_produk SET nm_jp='$nm_jp',kategori='$kategori',gender='$gender',desk='$desk' WHERE id_jp='$id_jp'");
        return $hasil;
    }

    function m_hapus_jenis_produk($id_jp)
    {
        $hrg = $this->db->query("DELETE FROM harga_produk WHERE id_hrg_produk='$id_jp'");
        $hasil = $this->db->query("DELETE FROM jenis_produk WHERE id_jp='$id_jp'");
        $sql = "SELECT * FROM foto_produk WHERE id_fotjp = $id_jp";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) :
                unlink('./upload/' . $data->fotpro);
            endforeach;
        }
        $foto = $this->db->query("DELETE FROM foto_produk WHERE id_fotjp='$id_jp'");
        return $hrg;
        return $foto;
        return $hasil;
    }

    function m_simpan_harga_produk($data, $id_hrg_produk, $status_produk)
    {
        $data_id = array(
            'id_hrg_produk' => $id_hrg_produk,
            'status_produk' => $status_produk
        );
        $result = $this->db->insert('harga_produk', $data, $data_id);
        $jenis = $this->db->query("UPDATE jenis_produk SET status_produk='$status_produk' WHERE id_jp='$id_hrg_produk'");
        return $result;
        return $jenis;
    }

    function m_update_pengaturan($request){
        $update = $this->db->set('value', $request['value'])
        ->where('id', $request['id'])
        ->update('pengaturan');
        return;
    }

    function m_edit_harga_produk($id_hrg, $id_hrg_produk, $hrg_awal, $diskon, $hrg_diskon, $all_size, $small, $medium, $large, $extra_large, $extra2_large, $tgl_akhir_promo, $status_produk, $jam_akhir_promo)
    {
        $update_jp = $this->db->set('status_produk', $status_produk)
            ->set('tgl_akhir_promo', $tgl_akhir_promo)
            ->set('jam_akhir_promo', $jam_akhir_promo)
            ->where('id_jp', $id_hrg_produk)
            ->update('jenis_produk');

        $hasil = $this->db->query("UPDATE harga_produk SET hrg_awal='$hrg_awal',diskon='$diskon',hrg_diskon='$hrg_diskon',
        all_size='$all_size',small='$small',medium='$medium',large='$large',extra_large='$extra_large',extra2_large='$extra2_large' WHERE id_hrg='$id_hrg'");

        return $update_jp;
        // return $jenis;
        return $hasil;
    }
    function m_hapus_hrg_produk($id_hrg)
    {
        $hasil = $this->db->query("DELETE FROM harga_produk WHERE id_hrg='$id_hrg'");
        return $hasil;
    }

    function m_simpan_foto_produk($id_fotjp, $fot_produk, $texture, $status_foto, $id_status_foto)
    {
        $data = array(
            'id_fotjp' => $id_fotjp,
            'fotpro' => $fot_produk,
            'texture' => $texture,
            'status_foto' => $status_foto,
            'id_status_foto' => $id_status_foto,
        );
        $result = $this->db->insert('foto_produk', $data);
        return $result;
    }

    function m_edit_foto_produk($id_fotpro, $id_fotjp, $fot_produk, $texture, $status_foto, $id_status_foto)
    {

        $hasil = $this->db->query("UPDATE foto_produk SET id_fotjp='$id_fotjp',fotpro='$fot_produk',texture='$texture',status_foto='$status_foto',id_status_foto='$id_status_foto' WHERE id_fotpro='$id_fotpro'");
        return $hasil;
    }

    function m_edit_fotoproduk($id_fotpro, $id_fotjp, $texture, $status_foto, $id_status_foto)
    {
        $hasil = $this->db->query("UPDATE foto_produk SET id_fotjp='$id_fotjp',texture='$texture',status_foto='$status_foto',id_status_foto='$id_status_foto' WHERE id_fotpro='$id_fotpro'");
        return $hasil;
    }


    function m_hapus_foto_produk($id_fotpro)
    {
        $hasil = $this->db->query("DELETE FROM foto_produk WHERE id_fotpro='$id_fotpro'");
        return $hasil;
    }

    function m_expired_promo($id_jp)
    {
        $cart = $this->db->set('status_produk', 'Lainnya')
            ->where('id_jp', $id_jp)
            ->update('jenis_produk');
        return $cart;
    }

    function m_get_kategori_etalase()
    {
        $this->db->select('*');
        $this->db->from('foto_banner');
        $this->db->group_by('layout');
        $query = $this->db->get();
        return $query->result();
    }

    function m_get_kategori_banner()
    {
        $this->db->select('*');
        $this->db->from('foto_banner');
        $this->db->group_by('kategori');
        $query = $this->db->get();
        return $query->result();
    }

    function m_edit_fotobanner($id_banner, $kategori, $layout)
    {
        $data = array(
            'kategori' => $kategori,
            'layout' => $layout

        );

        $this->db->where('id_banner', $id_banner);
        $result = $this->db->update('foto_banner', $data);

        return $result;
    }

    function m_edit_banner($id_banner, $kategori, $foto, $layout)
    {
        $data = array(
            'kategori' => $kategori,
            'foto' => $foto,
            'layout' => $layout

        );

        $this->db->where('id_banner', $id_banner);
        $result = $this->db->update('foto_banner', $data);

        return $result;

    }

    function m_hapus_foto_banner($id_banner)
    {
        $hasil = $this->db->query("DELETE FROM foto_banner WHERE id_banner='$id_banner'");
        return $hasil;
    }

    public function m_simpan_banner($layout, $foto, $kategori, $klik_ke, $produk)
    {
        $data = array(
            'layout' => $layout,
            'foto' => $foto,
            'kategori' => $kategori,
            'klik_ke' => $klik_ke,
            'id_produk' => $produk,
        );

        $this->db->insert('foto_banner', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    // Quotes

    public function m_edit_foto_quote($id, $gambar, $judul_quots)
    {
        $data = array(
            'gambar' => $gambar,
            'judul_quots' => $judul_quots
        );

        $this->db->where('id', $id);
        $this->db->update('quots', $data);

        return $this->db->affected_rows();
    }


    public function m_edit_fotoquote($id, $judul_quots)
    {
        $data = array(
            'judul_quots' => $judul_quots
        );

        $this->db->where('id', $id);
        $result = $this->db->update('quots', $data);

        return $result;
    }

    // Quotes akhir

}