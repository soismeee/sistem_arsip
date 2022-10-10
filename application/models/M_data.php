<?php

class M_data extends CI_Model
{

	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function get_data($table)
	{
		return $this->db->get($table);
	}

	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	public function getAdmin()
	{
		$this->db->select('*');
		$this->db->from('arsip');
		$this->db->join('kategori', 'kategori.kode_kategori=arsip.kategori_arsip');
		$this->db->join('pengguna', 'pengguna.id=arsip.pengelola');

		$query = $this->db->get();
		return $query->result();
	}

	public function getPetugas()
	{
		$id_petugas = $this->session->userdata['id'];
		$this->db->select('*');
		$this->db->from('arsip');
		$this->db->join('kategori', 'kategori.kode_kategori=arsip.kategori_arsip');
		$this->db->join('pengguna', 'pengguna.id=arsip.pengelola');
		$this->db->where('petugas', $id_petugas);

		$query = $this->db->get();
		return $query->result();
	}

	public function getStaff()
	{
		$id = $this->session->userdata['id'];
		$this->db->select('*');
		$this->db->from('arsip');
		$this->db->join('kategori', 'kategori.kode_kategori=arsip.kategori_arsip');
		$this->db->where('pengelola', $id);

		$query = $this->db->get();
		return $query->result();
	}

	function detail_arsip($id_arsip)
	{
		// $id_arsip = $this->input->post('id_arsip');
		$this->db->select('*');
		$this->db->from('arsip');
		$this->db->join('kategori', 'kategori.kode_kategori=arsip.kategori_arsip');
		$this->db->join('pengguna', 'pengguna.id=arsip.pengelola');
		$this->db->where('id_arsip', $id_arsip);

		$query = $this->db->get();
		return $query->result();
	}

	function get_chart()
	{
		$data = $this->db->query("SELECT * from arsip GROUP BY MONTH(tgl_surat)");
		return $data->result();
	}

	function get_tanggal()
	{
		$data = $this->db->query("SELECT * from arsip GROUP BY tgl_surat");
		return $data->result();
	}
}
