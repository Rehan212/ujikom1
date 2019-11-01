<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHP PDO Datatable server side script</title>

    <style type="text/css">
    /* centered columns styles */
    .row-centered {
        text-align:center;
    }
    .col-centered {
        display:inline-block;
        float:none;
        /* reset the text-align */
        text-align:left;
        /* inline-block space fix */
        margin-right:-4px;
    }
</style>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatable css -->
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet">


  </head>
  <body>



       <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row row-centered">
            <h1>PHP PDO Datatable server side script</h1>
            <div class="col-md-12">


    <table id="contoh" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
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

    <!-- let's begin the script -->
    <script type="text/javascript">
     $("#contoh").dataTable({
           'bProcessing': true,
            'bServerSide': true,
            //disable order dan searching pada tombol aksi
                 "columnDefs": [ {
              "targets": [3],
              "orderable": false,
              "searchable": false

            } ],
            "ajax":{
              url :"data.php",
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