<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()   
	{   
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('status_model');
	}   

	public function index()
	{
		$data = array(
	            'username'      => 'tesprogrammer190125C18',
	            'password' => '24b71c25ddbbd9991715691e7f28b5aa'
	    );
	    $data_http =  http_build_query($data);
	    $curl = curl_init('https://recruitment.fastprint.co.id/tes/api_tes_programmer');

	    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($curl, CURLOPT_HTTPHEADER, array());
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_http);

	    $results = curl_exec($curl);

	    curl_close($curl);

	    echo ($results);

		/*$results = json_decode($results);

		if($results->error == 0) {
			$products = $results->data;
			foreach ($products as $key => $product) {
				echo $key; echo $product->id_produk; echo "<br>";
				echo $key; echo $product->nama_produk; echo "<br>";
				echo $key; echo $product->kategori; echo "<br>";
				echo $key; echo $product->harga; echo "<br>";
				echo $key; echo $product->status; echo "<br>";
			}
		}*/
	}

	public function show(){
		$products = $this->produk_model->get_sale_product()->result();

		$data['products'] = $products;
		$this->load->view('show', $data);
	}
	public function add()
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');

        $data['kategori'] = $this->kategori_model->get_all()->result();
        $data['status'] = $this->status_model->get_status()->result();

        if ($this->form_validation->run() == FALSE){
        	$this->load->view('add', $data);
        } else {
        	$request['nama_produk'] = $this->input->post('nama_produk');
        	$request['harga'] = $this->input->post('harga');
        	$request['kategori_id'] = $this->input->post('kategori');
        	$request['status_id'] = $this->input->post('status');
        	$this->produk_model->insert($request);
        	return redirect('/product/show');
        }
	}
	public function edit($id)
	{
		if ('' == $id) {
			redirect('/product/show');
		}
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');

        $data['kategori'] = $this->kategori_model->get_all()->result();
        $data['status'] = $this->status_model->get_status()->result();
        $data['product'] = $this->produk_model->get_by_id($id)->result()[0];

        if ($this->form_validation->run() == FALSE){
        	$this->load->view('edit', $data);
        } else {
        	$where['id_produk'] = $id;
        	$request['nama_produk'] = $this->input->post('nama_produk');
        	$request['harga'] = $this->input->post('harga');
        	$request['kategori_id'] = $this->input->post('kategori');
        	$request['status_id'] = $this->input->post('status');
        	$this->produk_model->update($request, $where);
        	return redirect('/product/show');
        }
	}
	public function delete($id)
	{
		$this->produk_model->delete($id);
		return redirect('/product/show');
	}
}
