<?php 
//include config database
include "lib/config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHP PDO Datatable Server Side Processing Default Ordering Column </title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatable css -->
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet">
   
    


    <!-- library chosen untuk merubah select biasa jadi searchable -->
    <link href="assets/css/chosen.css" rel="stylesheet">

   


  </head>
  <body>
   <div id="loader" style="display:none">
    <img src="assets/images/loadnya.gif" class="ajax-loader"/>
</div>


       <!-- Page Content -->
    <div class="container">

      <!-- Heading Row -->
        <div class="row row-centered">
            <h1><a href="http://wildantea.com/php-pdo-datatable-server-side-processing-order-by-column/" target="_blank">PHP PDO Datatable Server Side Processing Default Ordering Column</a></h1>
            </div>

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-6">

    <h3>Order By default id provinsi secara descending </h3>
    Disini id provinsi ditampilkan untuk melihat ordering sudah sesuai apa belum. Namun, Anda tak perlu menampilkan id provinsi jika tidak diinginkan. 
    <table id="contoh" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>NO</th>
                <th>Id Provinsi</th>
                <th>Provinsi</th>
            </tr>
        </thead>
       <tbody>
         
       </tbody>
    </table>

    </div>
            <div class="col-md-6">

    <h3>Order By nama provinsi secara descending</h3>
    <table id="contoh2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>NO</th>
                <th>Provinsi</th>
            </tr>
        </thead>
       <tbody>
         
       </tbody>
    </table>

    </div>
    </div>
    </div>

    <p><a href="http://wildantea.com">Main BLog</a></p>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery-1.12.0.min.js"></script>
    <!-- datatables js -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>
    

    <!-- library select2 untuk merubah select biasa jadi searchable -->
     <script src="assets/js/chosen.jquery.min.js"></script>

    <!-- let's begin the script -->
    <script type="text/javascript">
     //simpan datatable ke variable dataTable, 
     var dataTable = $("#contoh").dataTable({
           'bProcessing': true,
            'bServerSide': true,
            "deferRender": true,

            'columnDefs': [ 
                { 
            //set width kolom nomor dan disable ordering
            'width': '5%', 
            'targets': 0, 
            'orderable': false,
            'searchable': false,
            'className': 'dt-center' 
          }
             ],

            "ajax":{
              url :"order_by_data_1.php",
            type: "post",  // method  , by default get
            //bisa kirim data ke server
            /*data: function ( d ) {
              
                      d.jurusan = "3223";
                  },*/
          error: function (xhr, error, thrown) {
            console.log(xhr);

            }
          },

        });

    //untuk contoh kedua
     var dataTable = $("#contoh2").dataTable({
           'bProcessing': true,
            'bServerSide': true,
            "deferRender": true,

            'columnDefs': [ 
                { 
            //set width kolom nomor dan disable ordering
            'width': '5%', 
            'targets': 0, 
            'orderable': false,
            'searchable': false,
            'className': 'dt-center' 
          }
             ],

            "ajax":{
              url :"order_by_data_2.php",
            type: "post",  // method  , by default get
            //bisa kirim data ke server
            /*data: function ( d ) {
              
                      d.jurusan = "3223";
                  },*/
          error: function (xhr, error, thrown) {
            console.log(xhr);

            }
          },

        });

    </script>

  </body>
</html>