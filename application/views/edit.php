<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	select { width: 33.1em }
	</style>
	<script type="text/javascript">
// Restricts input for the set of matched elements to the given inputFilter function.
(function($) {
  $.fn.inputFilter = function(callback, errMsg) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
      if (callback(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          $(this).removeClass("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        $(this).addClass("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  };
}(jQuery));
		$(document).ready(function(){
			$("#harga").inputFilter(function(value) {
				return /^\d*$/.test(value);
			},"Only digits allowed");
		});
		
	</script>
</head>
<body>

<div id="container">
	<h1>Edit</h1>
	<div id="body">
	<?php echo validation_errors(); ?>
	<?php echo form_open("/product/edit/{$product->id_produk}"); ?>
	<h5>Nama Produk</h5>
	<input type="hidden" name="id_produk" value="<?= $product->id_produk?>">
	<input type="text" name="nama_produk" value="<?= $product->nama_produk?>" size="50" />
	<h5>Kategori</h5>
	<select id="kategori" name="kategori">
		<?php foreach($kategori as $kat) { 
			if($product->kategori_id == $kat->id_kategori) {
				$selected = 'selected';
			} else {
				$selected = '';
			}
		?>
			<option <?php if($kat->id_kategori == $product->kategori_id) echo 'selected="selected"'; ?> value="<?php echo $kat->id_kategori; ?>" ><?php echo $kat->nama_kategori; ?></option>
		<?php } ?>
	</select>
	<h5>Harga</h5>
	<input type="text" name="harga" id="harga" value="<?= $product->harga?>" size="50"/>
	<h5>Status</h5>
	<select id="status" name="status">
		<?php foreach($status as $stat) { ?>
			<option <?php if($stat->id_status == $product->status_id) echo 'selected="selected"'; ?> value="<?php echo $stat->id_status; ?>"><?php echo $stat->nama_status; ?></option>
		<?php } ?>
	</select>
	<div><input type="submit" value="Submit" /></div>
	</form>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
