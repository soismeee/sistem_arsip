<?php
defined('BASEPATH') or exit('NO direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		// mengalihkan ke halaman login
		$this->load->view('v_login');
	}

	public function aksi()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		// perulangan if else
		if ($this->form_validation->run() != false) {

			// menangkap data username dan password dari halaman login
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// menyimpan data pada sebuah array
			$where = array(
				'username' => $username,
				'password' => md5($password),
				'status' => 1
			);

			$this->load->model('m_data');

			// cek kesesuaian login pada table pengguna
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();

			// cek jika login benar
			if ($cek > 0) {

				// ambil data pengguna yang melakukan login
				$data = $this->m_data->cek_login('pengguna', $where)->row();

				// buat session untuk pengguna yang berhasil login
				$data_session = array(
					'id' => $data->id,
					'username' => $data->username,
					'nama' => $data->nama,
					'level' => $data->level,
					'id_petugas' => $data->id_petugas,
					'jabatan' => $data->jabatan,
					'foto' => $data->foto,
					'status' => 'telah_login'

				);
				// mengambil data session user
				$this->session->set_userdata($data_session);

				// alihkan halaman ke halaman dashboard pengguna
				alert_success("Selamat anda Berhasil Masuk");
				redirect(base_url() . 'Dashboard');
			} else {
				// alert untuk menampilkan sebuah pesan gagal login
				redirect('login?alert=gagal');
			}
		} else {
			// tetap berada dihalaman login

			redirect('Login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		// alihkan kehalaman login dengan mengirimkan pesan logout
		redirect('login?alert=logout');
	}
}
