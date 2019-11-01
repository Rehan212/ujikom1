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
    <title>PHP Ajax Chaining Datatable server side </title>

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
    #loader {  
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    z-index:1000;
    background-color:#fff;
    opacity: .8;
   }
  .ajax-loader {
      position: fixed;
      left: 50%;
      top: 50%;
      margin-left: -32px; /* -1 * image width / 2 */
      margin-top: -32px;  /* -1 * image height / 2 */
      display: block;     
  }
  .glyphicon-refresh-animate {
      -animation: spin .7s infinite linear;
      -webkit-animation: spin2 .7s infinite linear;
  }

  @-webkit-keyframes spin2 {
      from { -webkit-transform: rotate(0deg);}
      to { -webkit-transform: rotate(360deg);}
  }

  @keyframes spin {
      from { transform: scale(1) rotate(0deg);}
      to { transform: scale(1) rotate(360deg);}
  }
</style>
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
            <h1><a href="http://wildantea.com/chaining-datatable-server-side-processing/" target="_blank">PHP Ajax Chaining Datatable server side</a></h1>
            </div>
<div class="row">
<div class="col-md-12">
<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body">
           <form class="form-horizontal">
                     <div class="form-group">
                        <label for="Provinsi" class="control-label col-lg-2">Provinsi</label>
                        <div class="col-lg-4">
                        <select id="provinsi" class="form-control chzn-select" tabindex="2">
                        <option value="all">Semua</option>
               <?php 
               //ambil data provinsi dari table provinsi
               $data = $db->fetch_all("provinsi");
               //lakukan looping data
               foreach ($data as $isi) {
                  echo "<option value='$isi->id_prov'>$isi->nama_prov</option>";
               } ?>
              </select>

 </div>
                      </div><!-- /.form-group -->

 
                           <div class="form-group">
                        <label for="kabupaten" class="control-label col-lg-2">Kabupaten</label>
                        <div class="col-lg-4">
                        <select id="kabupaten" class="form-control chzn-select" tabindex="2">
                        <option value="all">Semua</option>
              </select>

 </div>
 <img id="img_loader" style="display:none" src="assets/images/ajax-loader.gif">
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="kecamatan" class="control-label col-lg-2">Kecamatan</label>
                        <div class="col-lg-4">
                       <select class="form-control" id="kecamatan">
                    <option value="all">Semua</option>
                  </select> </div>
                  <img id="img_loader_2" style="display:none" src="assets/images/ajax-loader.gif">
                      </div><!-- /.form-group -->
                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <span id="kirim_filter" class="btn btn-primary btn-flat">Submit</span>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
            </div>
            <!-- /.box-body -->
          </div>
</div>
</div>
        <!-- Heading Row -->
        <div class="row row-centered">
            <div class="col-md-12">


    <table id="contoh" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>NO</th>
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
    

    <!-- library select2 untuk merubah select biasa jadi searchable -->
     <script src="assets/js/chosen.jquery.min.js"></script>

    <!-- let's begin the script -->
    <script type="text/javascript">
    //inisialisasi library chosen untuk mengubah element select provinsi jadi searchablee
     $("#provinsi").chosen();

     //jika select provinsi di pilih, maka lakukan ajax untuk mengambil data kabupaten dan masukan ke id #kabupaten atau ke select kabupaten
     $('#provinsi').on('change', function() {
      //panggil loader image
      $("#loader").show();
      $("#img_loader").show();
      //ambil value provinsi terpilih simpan ke variable
      id_provinsi = $(this).val();

      //ubah select kabupate jadi chosen select searchable
      $("#kabupaten").chosen();
      $.ajax({
          url : "data_kabupaten.php",
          type : "post",
          //kirim id provinsi ke file data_kabupaten.php, sesuai provinsi yang dipilih
          data : {id_provinsi : id_provinsi },
          success : function(data) {
              //write data kabupaten ke id atau ke select kabupaten
              $("#kabupaten").html(data);
              //update chosen data
              $("#kabupaten").trigger('chosen:updated');
              //reset select kecamatan untuk mengosongkan data
              $("#kecamatan").chosen("destroy");
              //set default kecamatan ke selected semua
               $("#kecamatan").html('<option value="all">Semua</option>');

               //hide loader image
                $("#loader").hide();
                $("#img_loader").hide();

          }

          });
       });

          //jika select kabupaten di pilih, maka lakukan ajax untuk mengambil data kecamatan dan masukan ke id #kecamatan atau ke select kecamatan
     $('#kabupaten').on('change', function() {
      //panggil loader image
      $("#loader").show();
      $("#img_loader_2").show();

      //ambil value kabupaten terpilih simpan ke variable
      id_kabupaten = $(this).val();

      //ubah select kecamatan jadi chosen select searchable
      $("#kecamatan").chosen();
      $.ajax({
          url : "data_kecamatan.php",
          type : "post",
          //kirim id id_kabupaten ke file data_kecamatan.php, sesuai Kabupaten yang dipilih
          data : {id_kabupaten : id_kabupaten },
          success : function(data) {
              //write data kabupaten ke id atau ke select kabupaten
              $("#kecamatan").html(data);
              $("#kecamatan").trigger('chosen:updated');

               //hide loader image
                $("#loader").hide();
                $("#img_loader_2").hide();
          }

          });
       });


     //simpan datatable ke variable dataTable, 
     var dataTable = $("#contoh").dataTable({
           'bProcessing': true,
            'bServerSide': true,
            "deferRender": true,

            //disable order dan searching pada kolom pertama dan terakhir 
                 "columnDefs": [ {
              "targets": [0,4],
              "orderable": false,
              "searchable": false

            } ],
            "ajax":{
              url :"data_chain.php",
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


     //jika klik filter di submit
     $('#kirim_filter').on('click', function() {
      //destory datatable
     dataTable.fnDestroy();
     //inisialiasi kembali datatable dengan data baru dari server
     $("#contoh").dataTable({
           'bProcessing': true,
            'bServerSide': true,
            "deferRender": true,

           //disable order dan searching pada kolom pertama dan terakhir 
                 "columnDefs": [ {
              "targets": [0,4],
              "orderable": false,
              "searchable": false

            } ],
            "ajax":{
              url :"data_chain.php",
            type: "post",  // method  , by default get
            //bisa kirim data ke server
            data: function ( d ) {
                      //ambil value select provinsi terpilih dan kirim ke data.php
                      d.provinsi = $("#provinsi").val();
                      //ambil value select kabupaten terpilih dan kirim ke data.php
                      d.kabupaten = $("#kabupaten").val();
                      //ambil value select kecamatan terpilih dan kirim ke data.php
                      d.kecamatan = $("#kecamatan").val();
              },
          error: function (xhr, error, thrown) {
            console.log(xhr);

            }
          },
                   "language": {
          "processing": "<span class=\"glyphicon glyphicon-refresh glyphicon-refresh-animate\"></span> Loading data, Please wait..." 
          },

        });


  });
    </script>

  </body>
</html>