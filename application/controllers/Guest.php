<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{

	public function keHalamanDepan()
	{
		$data['judul'] = 'Halaman Depan';
		$data['stasiun'] = $this->M_Guest->getDataStasiun()->result();
		$data['tiket'] = array();

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_depan');
		$this->load->view('guest/template/footer');
	}

	public function keHalamanKonfirmasi()
	{

		$data['error'] = '';

		if (isset($_GET['kode'])):
			$kode = $_GET['kode'];
			$data['no_tiket'] = $this->M_Guest->getPembayaranWhere($kode)->row();
			$data['detail'] = $this->M_Guest->getDetailPembayaran($kode);
		endif;

		$data['judul'] = 'Halaman Konfirmasi';
		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_konfirmasi');
		$this->load->view('guest/template/footer');
	}

	public function cari_tiket()
	{
		$data = array(
			'asal' => $this->input->post('asal'),
			'tujuan' => $this->input->post('tujuan')
		);

		$data['tiket'] = $this->M_Guest->cari_tiket($data)->result();
		$data['penumpang'] = $this->input->post('jumlah');
		$data['judul'] = 'Halaman Depan';
		$data['stasiun'] = $this->M_Guest->getDataStasiun()->result();
		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_depan');
		$this->load->view('guest/template/footer');
	}

	public function pesan($id)
	{
		$data['judul'] = 'Formulir Data Diri';

		$data['info'] = $this->M_Guest->getDataInfoPesan($id)->row();
		$data['id_jadwal'] = $id;

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/data_diri');
		$this->load->view('guest/template/footer');
	}

	public function pesanTiket()
	{
		$penumpang = $this->input->post('penumpang');
		$cek = $this->M_Guest->getPembayaran()->num_rows() + 1;
		$no_pembayaran = 'FA000' . $cek;
		$harga = $this->input->post('harga');
		$total_pembayaran = $penumpang * $harga;

		// Input pembayaran
		$no_tiket = 'T00' . $cek;
		$data = array(
			'no_pembayaran' => $no_pembayaran,
			'no_tiket' => $no_tiket,
			'total_pembayaran' => $total_pembayaran,
			'status' => 0
		);
		$this->M_Guest->insertPembayaran($data);

		$cek = $this->M_Guest->getTiket()->num_rows() + 1;

		// Input penumpang (with seat data)
		for ($i = 1; $i <= $penumpang; $i++) {
			$data = array(
				'nomor_tiket' => $no_tiket,
				'nama' => $this->input->post('nama' . $i),
				'no_identitas' => $this->input->post('identitas' . $i)
			);
			$this->M_Guest->insertPenumpang($data);
		}

		// Input pemesanan
		$data = array(
			'nomor_tiket' => $no_tiket,
			'id_jadwal' => $this->input->post('id_jadwal'),
			'nama_pemesan' => $this->input->post('nama_pemesan'),
			'email' => $this->input->post('email'),
			'no_telepon' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->M_Guest->insertPemesan($data);

		$this->session->set_flashdata('nomor', $no_pembayaran);
		$this->session->set_flashdata('total', $total_pembayaran);

		redirect('pembayaran');
	}

	public function keHalamanPembayaran()
	{
		$data['judul'] = 'Konfirmasi Pembayaran';
		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/pembayaran');
		$this->load->view('guest/template/footer');
	}

	public function cekKonfirmasi()
	{
		$kode = $this->input->post('kode');
		redirect('konfirmasi?kode=' . $kode);
	}

	public function kirimKonfirmasi()
	{
		$config['upload_path'] = './assets/bukti/';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['max_size'] = 2048;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$error = array('error' => $this->upload->display_errors());

			redirect('konfirmasi', $error);
		} else {
			$data = $this->upload->data();
			$filename = $data['file_name'];
			$no = $this->input->post('no_pembayaran');

			$this->M_Guest->insertBukti($filename, $no);

			$this->session->set_flashdata('pesan', 'Berhasil Mengirim Bukti, Silahkan Cek Kembali 12 Jam Kemudian Re-Check Pembayaran');
			redirect('konfirmasi');
		}

		$data = array(
			'gerbong' => $this->input->post('gerbong'),
			'bagian' => $this->input->post('bagian'),
			'kursi' => $this->input->post('kursi'),
		);

		$this->M_Guest->PilihKursi($data, $no);
	}
}
