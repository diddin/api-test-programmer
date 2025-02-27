<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produk</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'Open Sans', sans-serif;
	}
	.table-wrapper {
		width: 1000px;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
	table.table .form-control.error {
		border-color: #f50000;
	}
	table.table td .add {
		display: none;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
    $(".add-new").click(function(){ 
    	window.location.href = "/product/add";
    });
});
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Tabel <b>Produk</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="80px">id_produk</th>
                        <th width="250px">nama_produk</th>
                        <th width="250px">kategori</th>
                        <th width="100px">harga</th>
                        <th width="130px">status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
			        <?php foreach($products as $product) { ?>
			        	<tr>
			        		<td><?php echo $product->id_produk; ?></td>
			        		<td><?php echo $product->nama_produk; ?></td>
			        		<td><?php echo $product->kategori; ?></td>
			        		<td><?php echo $product->harga; ?></td>
			        		<td><?php echo $product->status; ?></td>
				        	<td>
								<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
	                            <a class="edit" title="Edit" data-toggle="tooltip" href="<?= base_url('/product/edit/').$product->id_produk; ?>">
	                            	<i class="material-icons">&#xE254;</i>
	                            </a>
	                            <a class="delete" title="Delete" data-toggle="tooltip" href="<?= base_url('/product/delete/').$product->id_produk; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
	                            	<i class="material-icons">&#xE872;</i>
	                            </a>
	                        </td>
			        	</tr>
			        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>                            				                            