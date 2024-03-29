<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public $load;
	public $m_dashboard;

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
	}

	function index()
	{
		$data['_script'] = 'dashboard/index_js';
		$data['_view'] = 'dashboard/index';
		$data['data_ketegori'] = $this->m_dashboard->m_data_kategori();
		$data['etalase'] = $this->m_dashboard->etalase();
		$data['slide'] = $this->m_dashboard->slide();
		$data['slide_prod'] = $this->m_dashboard->slide_prod();
		$this->load->view('layout/index', $data);
		$this->load->view('layout/footer');
	}

	function data_dashboard()
	{
		$data['_view'] = 'dashboard/data_dashboard';
		$data['data_produk'] = $this->m_dashboard->m_data_produk();
		$data['data_hrg_produk'] = $this->m_dashboard->m_data_hrg_produk();
		$this->load->view('dashboard/data_dashboard', $data);
	}

	function foto_nav()
	{
		$data['_view'] = 'layout/foto_resp_nav';
		$this->load->view('layout/foto_resp_nav', $data);
	}
}