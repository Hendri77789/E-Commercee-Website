<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Nama Pelanggan</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-grup">
		<label>Email Pelanggan</label>
		<input type="text" class="form-control" name="email">
	</div>
	<div class="form-grup">
		<label>Nomer Handphone Pelanggan</label>
		<input type="number" class="form-control" name="nomer">
	</div>
	<div class="form-grup">
		<label>Foto Kartu Identitas</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-grup">
		<label>Alamat Rumah</label>
		<input type="text" class="form-control" name="alamat"><br>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) 
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_kartu/".$nama);
	$koneksi->query("INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,telepon_pelanggan,foto_kartu,alamat_rumah) VALUES('$_POST[nama]','$_POST[email]','$_POST[nomer]','$nama','$_POST[alamat]')");
	echo "<div class='alert alert-info'>Data Telah Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=pelanggan'>";
}
?>