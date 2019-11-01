<?php
session_start();
include "lib/config.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'nama_prov',
	'nama_kab',
	'nama_kec',
	'id_kec',
	);

//jika ada request filter
if (isset($_POST['provinsi'])) {

	$prepared_data = array();
	
	if ($_POST['provinsi']=='all') {
		$provinsi = '';
	} else {
		//kondisi jika ada provinsi yang dipilih
		$provinsi = "where provinsi.id_prov=?";

		//untuk keamanan data gunakan prepared statement
		$prepare_provinsi = array('provinsi.id_prov' => $_POST['provinsi']);
		$prepared_data = array_merge($prepared_data,$prepare_provinsi);



	}

	if ($_POST['kabupaten']=='all') {
		$kabupaten = '';
	} else {
		//kondisi jika ada kabupaten yang dipilih
		$kabupaten = "and kabupaten.id_kab=?";

		//untuk keamanan data gunakan prepared statement
		$prepare_kabupaten = array('kabupaten.id_kab' => $_POST['kabupaten']);
		$prepared_data = array_merge($prepared_data,$prepare_kabupaten);

	}
	
	if ($_POST['kecamatan']=='all') {
		$kecamatan = '';
	} else {
		//kondisi jika ada kecamatan yang dipilih
		$kecamatan = " and kecamatan.id_kec=?";

		//untuk keamanan data gunakan prepared statement
		$prepare_kecamatan = array('kecamatan.id_kec' => $_POST['kecamatan']);
		$prepared_data = array_merge($prepared_data,$prepare_kecamatan);
	}


	//lakukan query dengan filter yang dipilih
	$query = $datatable->get_custom("select provinsi.nama_prov,kabupaten.nama_kab, kecamatan.nama_kec,id_kec
from provinsi inner join kabupaten 
on provinsi.id_prov=kabupaten.id_prov
inner join kecamatan on kabupaten.id_kab=kecamatan.id_kab $provinsi $kabupaten $kecamatan ",$columns,$prepared_data);


} else {

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("select provinsi.nama_prov,kabupaten.nama_kab, kecamatan.nama_kec,id_kec
from provinsi inner join kabupaten 
on provinsi.id_prov=kabupaten.id_prov
inner join kecamatan on kabupaten.id_kab=kecamatan.id_kab",$columns);

}


	//buat inisialisasi array data
	$data = array();

	$i=1;
	foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();
	//set kolom pertama sebagai nomor
	//panggih method $numbering dengan parameter variable $i diatas
	$ResultData[] = $datatable->number($i);
	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->nama_prov;
	$ResultData[] = $value->nama_kab;
	$ResultData[] = $value->nama_kec;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$ResultData[] = "<a href='url_edit/".$value->id_kec."' class='btn btn-primary'>Edit</a> <a href='url_edit/".$value->id_kec."' class='btn btn-danger'>Hapus</a> <a href='url_edit/".$value->id_kec."' class='btn btn-primary'>tombol 3</a>";

	//memasukan array ke variable $data

	$data[] = $ResultData;
	$i++;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
