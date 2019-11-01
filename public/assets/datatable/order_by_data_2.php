<?php
session_start();
include "lib/config.php";

//kolom apa saja yang akan ditampilkan
$columns = array(
	'nama_prov',

	//primary key
	'id_prov',
	);

    //set status bahwa table ini menambahkan penomoran di kolom pertama
    $datatable->set_numbering_status(1);
	//order by berdasarkan id_prov
	$datatable->set_order_by("provinsi.nama_prov");
	//order secara descending
	$datatable->set_order_type("desc");


	//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("select * from provinsi",$columns);

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


	//memasukan array ke variable $data

	$data[] = $ResultData;
	$i++;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
