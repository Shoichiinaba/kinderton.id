<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Olah_data extends CI_Controller
{
	public $load;
	public $m_olah_data;
	public $input;
	public $upload;
	public $image_lib;
	public $session;

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_olah_data');
	}

	public function index()
	{
		if ($this->session->userdata("privilage") == 'admin') {
			$data['_title'] = 'Olah Data';
			$data['_script'] = 'olah_data/olah_data_js';
			$data['_view'] = 'olah_data/olah_data';
			$data['kat_select'] = $this->m_olah_data->m_get_kategori();
			$data['jenis_produk'] = $this->m_olah_data->m_list_jenis_produk();
			$data['kategori'] = $this->m_olah_data->m_get_kategori();
			$this->load->view('layout/index', $data);
			$this->load->view('layout/footer_adm');
		} else {
			redirect(base_url(''));
		}
	}

	function pengaturan(){
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/pengaturan';
		$data['pengaturan'] = $this->m_olah_data->m_list_pengaturan();
		$this->load->view('olah_data/pengaturan', $data);
	}

	function update_pengaturan()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'name'  => $this->input->post('name'),
			'value' => $this->input->post('value'),
		);
		$this->db->trans_begin();
		try{
			$data = $this->m_olah_data->m_update_pengaturan($data);
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
			}else{
				$this->db->trans_commit();
			}
			return $this->output->set_content_type('application/json')
			->set_output(json_encode([
				'status' => true,
				'message' => 'Pengaturan berhasil di update',
				'data' => $data,
			]));
        }catch(Exception $e) {
			$this->db->trans_rollback();
            return $this->output->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => false,
                'message' => $e->getMessage(),
            ]));
		}
	}

	function jenis_produk()
	{
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/jenis_produk';
		$data['jenis_produk'] = $this->m_olah_data->m_list_jenis_produk();
		$this->load->view('olah_data/jenis_produk', $data);
	}

	function foto_produk()
	{
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/foto_produk';
		$data['jenis_produk'] = $this->m_olah_data->m_list_jenis_produk();
		$data['foto_produk'] = $this->m_olah_data->m_list_foto_produk();
		$this->load->view('olah_data/foto_produk', $data);
	}

	function select_foto_produk()
	{
		$select_produk = $this->input->post('select-nm-produk');
		$data = $this->m_olah_data->m_select_foto_produk($select_produk);
		echo json_encode($data);
	}

	function list_select_foto_produk()
	{
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/foto_produk';
		$data['jenis_produk'] = $this->m_olah_data->m_list_jenis_produk();
		$data['foto_produk'] = $this->m_olah_data->m_select_foto_produk();
		$this->load->view('olah_data/foto_produk', $data);
	}

	function form_select_data_jenis_produk()
	{
		$data['_view'] = 'olah_data/select_jenis_produk';
		$this->load->view('olah_data/select_jenis_produk', $data);
	}

	function harga_produk()
	{
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/harga_produk';
		$data['harga_produk'] = $this->m_olah_data->m_list_harga_produk();
		$this->load->view('olah_data/harga_produk', $data);
	}


	function simpan_jenis_produk()
	{
		$data = array(
			'nm_jp'  => $this->input->post('nm-jp'),
			'kategori' => $this->input->post('kategori'),
			'gender' => $this->input->post('gender'),
			'desk' => $this->input->post('desk'),
		);

		$data = $this->m_olah_data->m_simpan_jenis_produk($data);
		echo json_encode($data);
	}

	function edit_jenis_produk()
	{
		$id_jp = $this->input->post('id-jp');
		$nm_jp = $this->input->post('nm-jp');
		$kategori = $this->input->post('kategori');
		$gender = $this->input->post('gender');
		$desk = $this->input->post('desk');
		$data = $this->m_olah_data->m_edit_jenis_produk($id_jp, $nm_jp, $kategori, $gender, $desk);
		echo json_encode($data);
		echo 'berhasil';
	}

	function hapus_jenis_produk()
	{
		$id_jp = $this->input->post('id-jp');
		$data = $this->m_olah_data->m_hapus_jenis_produk($id_jp);
		echo json_encode($data);
	}

	function simpan_harga_produk()
	{
		$id_hrg_produk = $this->input->post('id-hrg-produk');
		$status_produk = $this->input->post('status-produk');
		$data = array(
			'id_hrg_produk' => $this->input->post('id-hrg-produk'),
			'hrg_awal' => $this->input->post('hrg-awal'),
			'diskon' => $this->input->post('diskon'),
			'hrg_diskon' => $this->input->post('hrg-diskon'),
			'all_size' => $this->input->post('all-size'),
			'small' => $this->input->post('small'),
			'medium' => $this->input->post('medium'),
			'large' => $this->input->post('large'),
			'extra_large' => $this->input->post('extra-large'),
			'extra2_large' => $this->input->post('extra2-large'),
		);

		$data = $this->m_olah_data->m_simpan_harga_produk($data, $id_hrg_produk, $status_produk);
		echo json_encode($data);
	}

	function edit_harga_produk()
	{
		$id_hrg = $this->input->post('id-hrg');
		$id_hrg_produk = $this->input->post('id-hrg-produk');
		$hrg_awal = $this->input->post('hrg-awal');
		$diskon = $this->input->post('diskon');
		$hrg_diskon = $this->input->post('hrg-diskon');
		$all_size = $this->input->post('all-size');
		$small = $this->input->post('small');
		$medium = $this->input->post('medium');
		$large = $this->input->post('large');
		$extra_large = $this->input->post('extra-large');
		$extra2_large = $this->input->post('extra2-large');
		$status_produk = $this->input->post('status-produk');
		$tgl_akhir_promo = $this->input->post('tgl-akhir-promo');
		$jam_akhir_promo = $this->input->post('jam-akhir-promo');
		$data = $this->m_olah_data->m_edit_harga_produk($id_hrg, $id_hrg_produk, $hrg_awal, $diskon, $hrg_diskon, $all_size, $small, $medium, $large, $extra_large, $extra2_large, $tgl_akhir_promo, $status_produk, $jam_akhir_promo);
		echo json_encode($data);
		echo 'berhasil';
	}
	function hapus_hrg_produk()
	{
		$id_hrg = $this->input->post('id-hrg');
		$data = $this->m_olah_data->m_hapus_hrg_produk($id_hrg);
		echo json_encode($data);
	}

	function simpan_foto_produk()
	{
		$config['upload_path'] = "./upload";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("fot_produk")) {
			$data = array('upload_data' => $this->upload->data());

			$id_fotjp = $this->input->post('id-fotjp');
			$fot_produk = $data['upload_data']['file_name'];
			$texture = $this->input->post('texture');
			$status_foto = $this->input->post('status-foto');
			$id_status_foto = $this->input->post('id-status-foto');
			$uploadedImage = $this->upload->data();
			if ($status_foto == 'slide') {

				$this->resizeImage_landcape($uploadedImage['file_name']);
				$insert = $this->m_olah_data->m_simpan_foto_produk($id_fotjp, $fot_produk, $texture, $status_foto,$id_status_foto);
				echo json_encode($insert);
			} else {
				$this->resizeImage_potrait($uploadedImage['file_name']);
				$insert = $this->m_olah_data->m_simpan_foto_produk($id_fotjp, $fot_produk, $texture, $status_foto,$id_status_foto);
				echo json_encode($insert);
			}
		}
		exit;
	}

	function edit_foto_produk()
	{
		$fotlama = $this->input->post('fotlama');
		unlink('./upload/' . $fotlama);
		$config['upload_path'] = "./upload";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload("fot_produk")) {
			$data = array('upload_data' => $this->upload->data());
			$id_fotpro = $this->input->post('id-fotpro');
			$id_fotjp = $this->input->post('id-fotjp');
			$fot_produk = $data['upload_data']['file_name'];
			$texture = $this->input->post('texture');
			$status_foto = $this->input->post('status-foto');
			$id_status_foto = $this->input->post('id-status-foto');
			$uploadedImage = $this->upload->data();

			if ($status_foto == 'slide') {

				$this->resizeImage_landcape($uploadedImage['file_name']);
				$insert = $this->m_olah_data->m_edit_foto_produk($id_fotpro,$id_fotjp, $fot_produk, $texture, $status_foto, $id_status_foto);
				echo json_encode($insert);
			} else {
				$this->resizeImage_potrait($uploadedImage['file_name']);
				$insert = $this->m_olah_data->m_edit_foto_produk($id_fotpro,$id_fotjp, $fot_produk, $texture, $status_foto, $id_status_foto);
				echo json_encode($insert);
			}
		}
		exit;
	}

	function edit_fotoproduk()
	{
		$id_fotpro = $this->input->post('id-fotpro');
		$id_fotjp = $this->input->post('id-fotjp');
		$texture = $this->input->post('texture');
		$status_foto = $this->input->post('status-foto');
		$id_status_foto = $this->input->post('id-status-foto');
		$result = $this->m_olah_data->m_edit_fotoproduk($id_fotpro, $id_fotjp, $texture, $status_foto, $id_status_foto);
		echo json_decode($result);
	}

	function hapus_foto_produk()
	{
		$fotlama = $this->input->post('fotlama');
		unlink('./upload/' . $fotlama);
		$id_fotpro = $this->input->post('id-fotpro');
		$data = $this->m_olah_data->m_hapus_foto_produk($id_fotpro);
		echo json_encode($data);
	}

	function expired_promo()
	{
		$id_jp = $this->input->post('id-jp');
		$result = $this->m_olah_data->m_expired_promo($id_jp);
		echo json_decode($result);
	}

	public function resizeImage_potrait($filename)
	{
		$source_path = 'upload/' . $filename;
		$target_path = 'upload/';
		$config = [
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => TRUE,
			'quality' => '60%',
			'width' => '1667',
			'height' => '2500',
		];
		$this->load->library('image_lib', $config);
		if (!$this->image_lib->resize()) {
			return [
				'status' => 'error compress',
				'message' => $this->image_lib->display_errors()
			];
		}
		$this->image_lib->clear();
		return 1;
	}

	public function resizeImage_landcape($filename)
	{
		$source_path = 'upload/' . $filename;
		$target_path = 'upload/';
		$config = [
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => TRUE,
			'quality' => '60%',
			'width' => '1667',
			'height' => '2500',
		];
		$this->load->library('image_lib', $config);
		if (!$this->image_lib->resize()) {
			return [
				'status' => 'error compress',
				'message' => $this->image_lib->display_errors()
			];
		}
		$this->image_lib->clear();
		return 1;
	}

	function foto_banner(){
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/foto_banner';
		$data['lay_etalase'] = $this->m_olah_data->m_get_kategori_etalase();
		$data['kat_select'] = $this->m_olah_data->m_get_kategori();
		$data['foto_banner'] = $this->m_olah_data->m_list_foto_banner();
		$this->load->view('olah_data/foto_banner', $data);
	}

	public function resize_potrait($filename)
	{
		$source_path = 'upload/banner/' . $filename;
		$target_path = 'upload/banner/';
		$config = [
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => TRUE,
			'quality' => '60%',
			'width' => '1667',
			'height' => '2500',
		];
		$this->load->library('image_lib', $config);
		if (!$this->image_lib->resize()) {
			return [
				'status' => 'error compress',
				'message' => $this->image_lib->display_errors()
			];
		}
		$this->image_lib->clear();
		return 1;
	}

	public function resize_landcape($filename)
	{
		$source_path = 'upload/banner/' . $filename;
		$target_path = 'upload/banner/';
		$config = [
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => TRUE,
			'quality' => '60%',
			'width' => '1667',
			'height' => '2500',
		];
		$this->load->library('image_lib', $config);
		if (!$this->image_lib->resize()) {
			return [
				'status' => 'error compress',
				'message' => $this->image_lib->display_errors()
			];
		}
		$this->image_lib->clear();
		return 1;
	}

	public function simpan_foto_banner()
	{
		$config['upload_path'] = "./upload/banner";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("foto_banner")) {
            $data = array('upload_data' => $this->upload->data());

            $id_banner = $this->input->post('id_banner');
            $kategori = $this->input->post('kategori');
            $foto = $data['upload_data']['file_name'];
            $layout = $this->input->post('layout');
            $uploadedImage = $this->upload->data();

            if ($layout == 'banner') {
                $this->resize_landcape($uploadedImage['file_name']);
            } else {
                $this->resize_potrait($uploadedImage['file_name']);
            }

            // $this->load->model('m_olah_data');
            $insert = $this->m_olah_data->m_simpan_banner($id_banner, $kategori, $foto, $layout);

            if ($insert) {
                echo json_encode(array('success' => true, 'message' => 'Foto Banner Berhasil di Simpan'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Gagal menyimpan ke database'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => $this->upload->display_errors()));
        }
	}

	function edit_foto_banner()
	{
		$fotlama = $this->input->post('fotlama');
		unlink('./upload/' . $fotlama);
		$config['upload_path'] = "./upload/banner";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload("foto")) {
			$data = array('upload_data' => $this->upload->data());
			$id_banner = $this->input->post('id-banner');
			$foto_banner = $data['upload_data']['file_name'];
			$kategori = $this->input->post('kategori');
			$layout = $this->input->post('layout');
			$uploadedImage = $this->upload->data();

			if ($layout == 'banner') {

				$this->resize_landcape($uploadedImage['file_name']);
				$insert = $this->m_olah_data->m_edit_banner($id_banner, $kategori, $foto, $layout);
				echo json_encode($insert);
			} else {
				$this->resize_potrait($uploadedImage['file_name']);
				$insert = $this->m_olah_data->m_edit_banner($id_banner, $kategori, $foto, $layout);
				echo json_encode($insert);
			}
		}
		exit;
	}

	function edit_fotobanner()
		{
			$id_banner = $this->input->post('id-banner');
			$kategori = $this->input->post('kategori');
			$layout = $this->input->post('layout');
			$result = $this->m_olah_data->m_edit_fotobanner($id_banner, $kategori, $layout);
			echo json_decode($result);

		}

	function hapus_foto_banner()
		{
			$fotolama = $this->input->post('fotolama');
			unlink('./upload/banner/' . $fotolama);
			$id_banner = $this->input->post('id-banner');
			$data = $this->m_olah_data->m_hapus_foto_banner($id_banner);
			echo json_encode($data);
		}

	function select_foto_banner()
	{
		$select_banner = $this->input->post('select-nm-banner');
		$data = $this->m_olah_data->m_select_foto_produk($select_banner);
		echo json_encode($data);
	}

	function list_select_foto_banner()
	{
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/foto_banner';
		$data['lay_etalase'] = $this->m_olah_data->m_get_kategori_etalase();
		$data['kat_select'] = $this->m_olah_data->m_get_kategori();
		$data['foto_banner'] = $this->m_olah_data->m_select_foto_produk();
		$this->load->view('olah_data/foto_produk', $data);
	}

}