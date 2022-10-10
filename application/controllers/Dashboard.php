<?php
defined('BASEPATH') or exit('NO direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('M_data');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "telah_login") {
			redirect(base_url() . 'login?alert=belum_login');
		}
	}

	public function index()
	{
		if ($this->session->userdata('level') == 'admin') {
			// mengalihkan ke halaman login
			$data['arsip'] = $this->db->query("SELECT * from arsip")->num_rows();
			$data['kategori'] = $this->db->query("SELECT * from kategori")->num_rows();
			$data['petugas'] = $this->db->query("SELECT * from pengguna where level='petugas'")->num_rows();
			$data['user'] = $this->db->query("SELECT * from pengguna where level='user'")->num_rows();

			// $data['chart'] = $this->M_data->get_chart();
			// $data['tanggal'] = $this->M_data->get_tanggal();
			// $data['bulan'] = $this->db->query("SELECT COUNT(no) from arsip GROUP BY tgl_surat")->num_rows();

			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_index', $data);
			$this->load->view('dashboard/v_footer');
		} else if ($this->session->userdata('level') == 'camat') {
			// mengalihkan ke halaman login
			$data['arsip'] = $this->db->query("SELECT * from arsip")->num_rows();
			$data['kategori'] = $this->db->query("SELECT * from kategori")->num_rows();
			$data['petugas'] = $this->db->query("SELECT * from pengguna where level='petugas'")->num_rows();
			$data['user'] = $this->db->query("SELECT * from pengguna where level='user'")->num_rows();

			$data['chart'] = $this->M_data->get_chart();
			$data['tanggal'] = $this->M_data->get_tanggal();
			$data['bulan'] = $this->db->query("SELECT COUNT(no) from arsip GROUP BY tgl_surat")->num_rows();

			$this->load->view('dashboard/v_header');
			$this->load->view('camat/v_index', $data);
			$this->load->view('dashboard/v_footer');
		} else if ($this->session->userdata('level') == 'petugas') {
			// mengalihkan ke halaman login
			$id = $this->session->userdata['id'];
			$data['user'] = $this->db->query("SELECT * from pengguna where level='user' AND id_petugas='$id'")->num_rows();
			$data['arsip'] = $this->db->query("SELECT * from arsip WHERE petugas='$id'")->num_rows();
			$data['kategori'] = $this->db->query("SELECT * from kategori")->num_rows();
			$this->load->view('dashboard/v_header');
			$this->load->view('petugas/v_index', $data);
			$this->load->view('dashboard/v_footer');
		} else {
			// mengalihkan ke halaman login
			$id = $this->session->userdata['id'];
			$data['kategori'] = $this->db->query("SELECT * from kategori")->num_rows();
			$data['arsip'] = $this->db->query("SELECT * from arsip WHERE pengelola='$id'")->num_rows();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_index', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	###############################################################################################
	// CRUD KATEGORI
	###############################################################################################
	public function kategori()
	{
		$data['kategori'] = $this->db->query("SELECT * from kategori")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('kategori/v_kategori', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function lihat_kategori()
	{
		$data['kategori'] = $this->db->query("SELECT * from kategori")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('kategori/v_kategori_lihat', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('kategori/v_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function create_kategori()
	{
		$this->form_validation->set_rules('kode_kategori', 'Kode kategori', 'required');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

		if ($this->form_validation->run() != false) {
			$kode_kategori = $this->input->post('kode_kategori');
			$nama_kategori = $this->input->post('nama_kategori');

			$data = array(
				'kode_kategori' => $kode_kategori,
				'nama_kategori' => $nama_kategori
			);
			$this->M_data->insert_data($data, 'kategori');
			alert_info("Data berhasil ditambah");
			redirect(base_url() . 'dashboard/kategori');
		} else {
			alert_warning("Data tidak lengkap");
			$this->load->view('dashboard/v_header');
			$this->load->view('kategori/v_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function edit_kategori($id)
	{
		$where = array(
			'id' => $id
		);
		$data['kategori'] = $this->M_data->edit_data($where, 'kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('kategori/v_edit', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function update_kategori()
	{
		$this->form_validation->set_rules('kode_kategori', 'Kode kategori', 'required');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$kode_kategori = $this->input->post('kode_kategori');
			$nama_kategori = $this->input->post('nama_kategori');

			$where = array(
				'id' => $id
			);

			$data = array(
				'kode_kategori' => $kode_kategori,
				'nama_kategori' => $nama_kategori
			);
			$this->M_data->update_data($where, $data, 'kategori');
			alert_info("Data berhasil di update");
			redirect(base_url() . 'dashboard/kategori');
		} else {

			$id = $this->input->post('id');
			$where = array(
				'id' => $id
			);
			$data['kategori'] = $this->M_data->edit_data($where, 'kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('kategori/v_edit', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function hapus_kategori($id)
	{
		$where = array(
			'id' => $id
		);

		$this->M_data->delete_data($where, 'kategori');
		alert_delete("Data berhasil dihapus");
		redirect(base_url() . 'dashboard/kategori');
	}


	###############################################################################################
	// CRUD USER
	###############################################################################################
	public function user()
	{
		if ($this->session->userdata('level') == 'admin') {
			$data['pengguna'] = $this->db->query("SELECT * from pengguna where level='user'")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_user', $data);
			$this->load->view('dashboard/v_footer');
		} else {
			$id = $this->session->userdata['id'];
			$data['pengguna'] = $this->db->query("SELECT * from pengguna where level='user' AND id_petugas='$id'")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_user_p', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function lihat_user()
	{
		$data['pengguna'] = $this->db->query("SELECT * from pengguna where level='user'")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('pengguna/v_user_lihat', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function tambah_u()
	{
		$data['pengguna'] = $this->db->query("SELECT * from pengguna where level='petugas'")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('pengguna/v_tambah', $data);
		$this->load->view('dashboard/v_footer');
	}


	public function create_user()
	{
		// var_dump($_POST);
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('id_petugas', 'Id Petugas', 'required');
		if ($this->form_validation->run() != false) {
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$password = $this->input->post('password');
			$level = $this->input->post('level');
			$id_petugas = $this->input->post('id_petugas');
			$data = array(
				'username' => $username,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'password' => md5($password),
				'level' => $level,
				'id_petugas' => $id_petugas,
				'status' => 1
			);
			$this->M_data->insert_data($data, 'pengguna');
			alert_info("Data berhasil ditambah");
			redirect(base_url() . 'dashboard/user');
		} else {
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function edit_user($id)
	{
		$where = array(
			'id' => $id
		);
		$data['pengguna'] = $this->M_data->edit_data($where, 'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('pengguna/v_edit', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function update_user()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$password = $this->input->post('password');
			$where = array(
				'id' => $id
			);

			$data = array(
				'username' => $username,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'password' => md5($password)
			);
			$this->M_data->update_data($where, $data, 'pengguna');
			alert_info("Data berhasil di update");
			redirect(base_url() . 'dashboard/user');
		} else {

			$id = $this->input->post('id');
			$where = array(
				'id' => $id
			);
			$data['pengguna'] = $this->M_data->edit_data($where, 'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_edit', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function hapus_user($id)
	{
		$where = array(
			'id' => $id
		);

		$this->M_data->delete_data($where, 'pengguna');
		alert_delete("Data berhasil dihapus");
		redirect(base_url() . 'dashboard/user');
	}

	###############################################################################################
	// CRUD PETUGAS
	###############################################################################################

	public function petugas()
	{
		$data['pengguna'] = $this->db->query("SELECT * from pengguna where level='petugas'")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('petugas/v_petugas', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function camat_petugas()
	{
		$data['pengguna'] = $this->db->query("SELECT * from pengguna where level='petugas'")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('camat/v_petugas', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function tambah_p()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('petugas/v_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function create_petugas()
	{
		// var_dump($_POST);
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('level', 'level', 'required');
		if ($this->form_validation->run() != false) {
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$password = $this->input->post('password');
			$level = $this->input->post('level');
			$data = array(
				'username' => $username,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'password' => md5($password),
				'level' => $level,
				'status' => 1
			);
			$this->M_data->insert_data($data, 'pengguna');
			alert_info("Data berhasil ditambah");
			redirect(base_url() . 'dashboard/petugas');
		} else {
			$this->load->view('dashboard/v_header');
			$this->load->view('petugas/v_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function edit_petugas($id)
	{
		$where = array(
			'id' => $id
		);
		$data['pengguna'] = $this->M_data->edit_data($where, 'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('petugas/v_edit', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function update_petugas()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$password = $this->input->post('password');
			$where = array(
				'id' => $id
			);

			$data = array(
				'username' => $username,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'password' => md5($password)
			);
			$this->M_data->update_data($where, $data, 'pengguna');
			alert_info("Data berhasil di update");
			redirect(base_url() . 'dashboard/petugas');
		} else {

			$id = $this->input->post('id');
			$where = array(
				'id' => $id
			);
			$data['pengguna'] = $this->M_data->edit_data($where, 'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('petugas/v_edit', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function hapus_petugas($id)
	{
		$where = array(
			'id' => $id
		);

		$this->M_data->delete_data($where, 'pengguna');
		alert_delete("Data berhasil dihapus");
		redirect(base_url() . 'dashboard/petugas');
	}

	###############################################################################################
	// CRUD ARSIP
	###############################################################################################
	public function arsip()
	{
		if ($this->session->userdata('level') == 'admin') {
			// $data['arsip'] = $this->db->query("SELECT * from arsip")->result();
			$data['arsip'] = $this->M_data->getAdmin();
			$this->load->view('dashboard/v_header');
			$this->load->view('arsip/v_arsip_ketua', $data);
			$this->load->view('dashboard/v_footer');
		} else if ($this->session->userdata('level') == 'camat') {
			// $data['arsip'] = $this->db->query("SELECT * from arsip")->result();
			$data['arsip'] = $this->M_data->getAdmin();
			$this->load->view('dashboard/v_header');
			$this->load->view('arsip/v_arsip_ketua', $data);
			$this->load->view('dashboard/v_footer');
		} else if ($this->session->userdata('level') == 'petugas') {
			// $id_petugas = $this->session->userdata['id'];
			// $data['arsip'] = $this->db->query("SELECT * from arsip where petugas='$id_petugas'")->result();
			$data['arsip'] = $this->M_data->getPetugas();
			$this->load->view('dashboard/v_header');
			$this->load->view('arsip/v_arsip_ketua', $data);
			$this->load->view('dashboard/v_footer');
		} else {
			// $id = $this->session->userdata['id'];
			// $data['arsip'] = $this->db->query("SELECT * from arsip where pengelola='$id'")->result();
			$data['arsip'] = $this->M_data->getStaff();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_arsip', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function tambah_a()
	{
		$data['kategori'] = $this->db->query("SELECT * from kategori")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('arsip/v_tambah', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function create_arsip()
	{
		// var_dump($_POST);
		// die();
		$this->form_validation->set_rules('nama_arsip', 'Nama Arsip', 'required');
		$this->form_validation->set_rules('no_arsip', 'Nomor Arsip', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal', 'required');
		$this->form_validation->set_rules('isi_ringkasan', 'Isi Ringkasan', 'required');
		$this->form_validation->set_rules('kategori_arsip', 'Kategori Arsip', 'required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['gambar']['name'])) {
			$this->form_validation->set_rules('gambar', 'Gambar Arsip', 'required');
		}

		if ($this->form_validation->run() != false) {

			$config['upload_path']   = './assets/images/arsip/';
			$config['allowed_types'] = 'pdf|jpg|png|jpeg';
			$config['max_size'] = 2000;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$nama_arsip = $this->input->post('nama_arsip');
				$no_arsip = $this->input->post('no_arsip');
				$tgl_surat = $this->input->post('tgl_surat');
				$isi_ringkasan = $this->input->post('isi_ringkasan');
				$pengelola = $this->input->post('pengelola');
				$petugas = $this->input->post('petugas');
				$kategori_arsip = $this->input->post('kategori_arsip');
				$image = $gambar['file_name'];

				$data = array(
					'nama_arsip' => $nama_arsip,
					'no_arsip' => $no_arsip,
					'tgl_surat' => $tgl_surat,
					'isi_ringkasan' => $isi_ringkasan,
					'pengelola' => $pengelola,
					'petugas' => $petugas,
					'kategori_arsip' => $kategori_arsip,
					'gambar' => $image
				);
				$this->M_data->insert_data($data, 'arsip');
				alert_info("Data berhasil ditambah");
				redirect(base_url() . 'dashboard/arsip');
			} else {
				$this->form_validation->set_message('gambar', $data['gambar_error'] = $this->upload->display_errors());

				$data['kategori'] = $this->db->query("SELECT * from kategori")->result();
				$this->load->view('dashboard/v_header');
				$this->load->view('arsip/v_tambah', $data);
				$this->load->view('dashboard/v_footer');
			}
		} else {
			$data['kategori'] = $this->db->query("SELECT * from kategori")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('arsip/v_tambah', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function edit_arsip($id_arsip)
	{
		$where = array(
			'id_arsip' => $id_arsip
		);
		$data['arsip'] = $this->M_data->edit_data($where, 'arsip')->result();
		$data['kategori'] = $this->db->query("SELECT * from kategori")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('arsip/v_edit', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function update_arsip()
	{
		// var_dump($_POST);
		// die();
		$this->form_validation->set_rules('nama_arsip', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('no_arsip', 'Nomor Arsip', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal', 'required');
		$this->form_validation->set_rules('kategori_arsip', 'Nama Kategori', 'required');
		$this->form_validation->set_rules('isi_ringkasan', 'Isi Ringkasan', 'required');

		if ($this->form_validation->run() != false) {
			$id_arsip = $this->input->post('id_arsip');

			$nama_arsip = $this->input->post('nama_arsip');
			$no_arsip = $this->input->post('no_arsip');
			$tgl_surat = $this->input->post('tgl_surat');
			$kategori_arsip = $this->input->post('kategori_arsip');
			$isi_ringkasan = $this->input->post('isi_ringkasan');

			$where = array(
				'id_arsip' => $id_arsip
			);

			$data = array(
				'nama_arsip' => $nama_arsip,
				'no_arsip' => $no_arsip,
				'tgl_surat' => $tgl_surat,
				'kategori_arsip' => $kategori_arsip,
				'isi_ringkasan' => $isi_ringkasan,

			);
			$this->M_data->update_data($where, $data, 'arsip');
			alert_info("Data berhasil di update");
			redirect(base_url() . 'dashboard/arsip');
		} else {

			$id_arsip = $this->input->post('id_arsip');
			$where = array(
				'id_arsip' => $id_arsip
			);
			$data['arsip'] = $this->M_data->edit_data($where, 'arsip')->result();
			$data['kategori'] = $this->db->query("SELECT * from kategori")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('arsip/v_edit', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function hapus_arsip($id_arsip)
	{
		$where = array(
			'id_arsip' => $id_arsip
		);

		$this->M_data->delete_data($where, 'arsip');
		alert_delete("Data berhasil dihapus");
		redirect(base_url() . 'dashboard/arsip');
	}

	public function detail_arsip($id_arsip)
	{
		// $data['arsip'] = $this->M_data->edit_data($where, 'arsip')->result();
		$data['arsip'] = $this->M_data->detail_arsip($id_arsip);
		$this->load->view('dashboard/v_header');
		$this->load->view('pengguna/v_arsip_detail', $data);
		$this->load->view('dashboard/v_footer');
	}

	###############################################################################################
	// PROFIL PENGGUNA
	###############################################################################################

	public function profil()
	{


		if ($this->session->userdata('level') == 'admin') {
			$data['pengguna'] = $this->db->query("SELECT * from pengguna")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_profil', $data);
			$this->load->view('dashboard/v_footer');
		} else {
			$data['pengguna'] = $this->db->query("SELECT * from pengguna")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_profil_staff', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function gantipass()
	{
		$data['pengguna'] = $this->db->query("SELECT * from pengguna")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('pengguna/v_gantipass', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function update_password()
	{
		// var_dump($_POST);
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$password = $this->input->post('password');
			$where = array(
				'id' => $id
			);

			$data = array(
				'password' => md5($password)
			);
			$this->M_data->update_data($where, $data, 'pengguna');

			$this->session->sess_destroy();
			// alihkan kehalaman login dengan mengirimkan pesan logout
			redirect('login?alert=updatedata');
		} else {
			$data['pengguna'] = $this->db->query("SELECT * from pengguna")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_gantipass', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function update_username()
	{
		// var_dump($_POST);
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$where = array(
				'id' => $id
			);

			$data = array(
				'username' => $username,
				'nama' => $nama
			);
			$this->M_data->update_data($where, $data, 'pengguna');

			$this->session->sess_destroy();
			// alihkan kehalaman login dengan mengirimkan pesan logout
			redirect('login?alert=updatedata');
		} else {
			$data['pengguna'] = $this->db->query("SELECT * from pengguna")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_profil', $data);
			$this->load->view('dashboard/v_footer');
		}
	}
	public function update_username_staff()
	{
		// var_dump($_POST);
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$where = array(
				'id' => $id
			);

			$data = array(
				'nama' => $nama
			);
			$this->M_data->update_data($where, $data, 'pengguna');

			$this->session->sess_destroy();
			// alihkan kehalaman login dengan mengirimkan pesan logout
			redirect('login?alert=updatedata');
		} else {
			$data['pengguna'] = $this->db->query("SELECT * from pengguna")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('pengguna/v_profil', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function ganti_foto()
	{
		$id = $this->input->post('id');
		$where = array(
			'id' => $id
		);

		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']   = './assets/images/foto/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$data = array(
					'foto' => $gambar['file_name'],
				);
				$this->M_data->update_data($where, $data, 'pengguna');

				$this->session->sess_destroy();
				// alihkan kehalaman login dengan mengirimkan pesan logout
				redirect('login?alert=updatedata');
			} else {
				redirect(base_url() . 'dashboard/profil');
			}
		} else {
			redirect(base_url() . 'dashboard/profil');
		}
	}
}
