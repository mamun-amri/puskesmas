<?php
$content = $_REQUEST['page'];
if( $content == "view_dokter"){
    include "modul/m_dokter/view_dokter.php";
}else if($content == "form_dokter"){
    include "modul/m_dokter/form_dokter.php";
}

?>

