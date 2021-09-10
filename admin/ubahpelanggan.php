<h2>Ubah Data Diri Pelanggan</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Nama Pelanggan</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
	</div>
	<div class="form-grup">
		<label>Email Pelanggan</label>
		<input type="text" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">
	</div>
	<div class="form-grup">
		<label>Nomer Telepon Pelanggan</label>
		<input type="number" name="nomer" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">
	</div>
	<div class="form-grup">
		<img src="../foto_kartu/<?php echo $pecah['foto_kartu'] ?>" width="200">
	</div>
	<div class="form-grup">
		<label>Ganti Foto Identitas</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-grup">
		<label>Alamat Rumah</label>
		<input type="text" name="alamat" class="form-control" value="<?php echo $pecah['alamat_rumah']; ?>">
	</div>
	<button class="btn btn-primary" name="ganti">Ganti</button>
</form>

<?php
if (isset($_POST['ganti'])) 
{
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "../foto_kartu/$namafoto");

		$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',telepon_pelanggan='$_POST[nomer]',foto_kartu='$namafoto',alamat_rumah='$_POST[alamat]' WHERE id_pelanggan='$_GET[id]' ");
	}
	else
		$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',telepon_pelanggan='$_POST[nomer]' WHERE id_pelanggan='$_GET[id]' ");

	echo "<script>alert('Data Pelanggan Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
}
?>