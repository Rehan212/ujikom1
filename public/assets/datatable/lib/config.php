<?php
ini_set( "display_errors", true );
define( "DB_DSN", "mysql:host=localhost;dbname=data" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define('DB_CHARACSET', 'utf8');

require_once ('Database.php');
require_once ('Dtable.php');

$db=new Database();
$datatable=New Dtable();

function handleException( $exception ) {
  echo  $exception->getMessage();
}

set_exception_handler( 'handleException' );
?>
