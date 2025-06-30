<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function keHalamanLogin()
	{
		$this->load->view('admin/login');
	}

	public function login()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => sha1($this->input->post('password'))
		);

		$cek = $this->M_Admin->cekLogin($data);

		if ($cek > 0) {
			$sess = array(
				'status' => TRUE,
				'level' => 'admin'
			);
			$this->session->set_userdata($sess);

			redirect(base_url('admin/dashboard'));
		} else {

			redirect(base_url('login'));
		}
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}

	public function keHalamanDashboard()
	{
		if ($this->session->status === TRUE) {
			$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();
			$this->load->view('admin/dashboard', $data);
		} else {
			redirect(base_url('login'));
		}
	}

	public function tambah_stasiun()
	{
		$nama = $this->input->post('stasiun');

		$input = $this->M_Admin->tambah_stasiun($nama);

		redirect(base_url('admin/dashboard'));
	}

	public function hapus_stasiun($id)
	{
		$delete = $this->M_Admin->hapus_stasiun($id);

		redirect(base_url('admin/dashboard'));
	}

	public function keHalamanEditStasiun($id)
	{
		$data['data_stasiun'] = $this->M_Admin->getDataEditStasiun($id)->row();
		$this->load->view('admin/edit_stasiun', $data);
	}

	public function edit_stasiun()
	{
		$nama = $this->input->post('nama_stasiun');

		$edit = $this->M_Admin->edit_stasiun($nama);

		redirect(base_url('admin/dashboard'));
	}


	public function keHalamanKelolaJadwal()
	{
		$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

		$data['jadwal'] = $this->M_Admin->getJadwal()->result();

		$this->load->view('admin/kelola_jadwal', $data);
	}

	public function tambah_jadwal()
	{
		$data = array(
			'nama_kereta' => $this->input->post('nama_kereta'),
			'asal' => $this->input->post('asal'),
			'tujuan' => $this->input->post('tujuan'),
			'tgl_berangkat' => $this->input->post('tgl_berangkat'),
			'tgl_sampai' => $this->input->post('tgl_sampai'),
			'kelas' => $this->input->post('kelas'),
			'harga' => $this->input->post('harga')
		);
		$this->M_Admin->tambah_jadwal($data);

		redirect(base_url('admin/dashboard/kelola-jadwal'));
	}

	public function hapusJadwal($id)
	{
		$this->M_Admin->hapusJadwal($id);
		redirect(base_url('admin/dashboard/kelola-jadwal'));
	}

	public function keHalamanEditJadwal($id)
	{
		$data['data_edit'] = $this->M_Admin->getDataEditJadwal($id)->row();
		$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

		$this->load->view('admin/edit_jadwal', $data);
	}

	public function edit_jadwal()
	{
		$data = array(
			'nama_kereta' => $this->input->post('nama_kereta'),
			'asal' => $this->input->post('asal'),
			'tujuan' => $this->input->post('tujuan'),
			'tgl_berangkat' => $this->input->post('tgl_berangkat'),
			'tgl_sampai' => $this->input->post('tgl_sampai'),
			'kelas' => $this->input->post('kelas'),
			'harga' => $this->input->post('harga'),
		);

		$this->M_Admin->edit_jadwal($data);

		redirect(base_url('admin/dashboard/kelola-jadwal'));
	}
}
