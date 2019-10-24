<?php
$content = $_REQUEST['page'];
if ($content == "view_dokter") {
    include "modul/m_dokter/view_dokter.php";
} else if ($content == "form_dokter") {
    include "modul/m_dokter/form_dokter.php";
} else if ($content == "view_pasien") {
    include "modul/m_pasien/view_pasien.php";
} else if ($content == "form_pasien") {
    include "modul/m_pasien/form_pasien.php";
} else if ($content == "view_petugas") {
    include "modul/m_petugas/view_petugas.php";
} else if ($content == "form_petugas") {
    include "modul/m_petugas/form_petugas.php";
} else if ($content == "view_ruangan") {
    include "modul/m_ruangan/view_ruangan.php";
} else if ($content == "form_ruangan") {
    include "modul/m_ruangan/form_ruangan.php";
}
