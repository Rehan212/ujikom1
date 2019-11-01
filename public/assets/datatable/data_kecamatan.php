<?php

//kita butuh config untuk query ke databasee
include "lib/config.php";

//simpan request post id_kabupaten di variable
$id_kabupaten = $_POST['id_kabupaten'];

//prepared statement untuk keamanan dari sql injection
$data_where = array(
			'id_kab' => $id_kabupaten
			);
//ambil data kabupaten dari kabupaten berdasarkan id provinsi yang di kirim
$data = $db->custom_query("select * from kecamatan where id_kab=?",$data_where);

echo '<option value="all" selected>Semua</option>';
//lakukan looping untuk menampilkan hasil data query
foreach ($data as $isi) {
	echo "<option value='$isi->id_kec'>$isi->nama_kec</option>";
}

?>
