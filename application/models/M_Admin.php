<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{

	public function cekLogin($data)
	{
		return $this->db->get_where('admin', $data)->num_rows();
	}

	public function getDataStasiun()
	{
		return $this->db->get('stasiun');
	}

	public function tambah_stasiun($nama)
	{
		$data = array(
			'nama_stasiun' => $nama,
		);
		return $this->db->insert('stasiun', $data);
	}

	public function hapus_stasiun($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('stasiun');
	}

	public function getDataEditStasiun($id)
	{

		$data = array(
			'id' => $id,
		);
		return $this->db->get_where('stasiun', $data);
	}

	public function edit_stasiun($nama)
	{
		$data = array(
			'nama_stasiun' => $nama,
		);
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('stasiun', $data);
	}


	public function tambah_jadwal($data)
	{
		return $this->db->insert('jadwal', $data);
	}

	public function getJadwal()
	{
		$this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->from('jadwal');
		$this->db->join('stasiun as Asal', 'jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');
		return $this->db->get();
	}

	public function hapusJadwal($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('jadwal');
	}

	public function getDataEditJadwal($id)
	{
		$data = array(
			'jadwal.id' => $id,
		);
		$this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->from('jadwal');
		$this->db->where($data);
		$this->db->join('stasiun as Asal', 'jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');
		return $this->db->get();
	}

	public function edit_jadwal($data)
	{
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('jadwal', $data);
	}
}
