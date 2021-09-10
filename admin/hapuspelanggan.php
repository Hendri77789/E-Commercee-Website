<?php

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotokartu = $pecah['foto_kartu'];
if (file_exists("../foto_kartu/$fotokartu"))
{
	unlink("../foto_kartu/$fotokartu");
}
$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script>alert('User Telah Terhapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>