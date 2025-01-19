<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{
	function get()
	{
		return $this->db->get('Produk');
	}

	function get_sale_product() {
		$this->db->select('Produk.id_produk, Produk.nama_produk, Kategori.nama_kategori as kategori, Produk.harga, Status.nama_status as status');
		$this->db->from('Produk');
		$this->db->join('Kategori', 'Produk.kategori_id = Kategori.id_kategori');
		$this->db->join('Status', 'Produk.status_id = Status.id_status');
		$this->db->where('Status.id_status', 1);
		$query = $this->db->get();

		return $query;
	}

	function get_by_id($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->from('Produk');
		return $this->db->get();
	}

	function insert($data)
	{
		$this->db->insert('Produk', $data);
	}

	function edit($id) {
		$this->db->where('id_produk', $id);
		$this->db->from('Produk');
		return $this->db->get();
	}

	function update($data, $where)
	{
		
		$this->db->where($where);
		$this->db->update('Produk', $data);
	}

	function delete($id)
	{ echo "decode result <pre>"; print_r( $id ); echo "</pre>"; die();
		$this->db->where('id_produk', $id);
		$this->db->delete('Produk');
	}
}