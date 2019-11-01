<?php

//kita butuh config untuk query ke databasee
include "lib/config.php";

//simpan request post id_provinsi di variable
$id_provinsi = $_POST['id_provinsi'];

//prepared statement untuk keamanan dari sql injection
$data_where = array(
			'id_prov' => $id_provinsi
			);
//ambil data kabupaten dari kabupaten berdasarkan id provinsi yang di kirim
$data = $db->custom_query("select * from kabupaten where id_prov=?",$data_where);

echo '<option value="all" selected>Semua</option>';
//lakukan looping untuk menampilkan hasil data query
foreach ($data as $isi) {
	echo "<option value='$isi->id_kab'>$isi->nama_kab</option>";
}

?>
