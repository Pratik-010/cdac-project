<?php
// get-file.php
define('PDF_DIR','/home/the_actual_physical_path/documents/pdfs/');
require_once('../mysql_connect.php');
$id = intval($_GET['id']);
$sql = "SELECT id, pdf FROM pdf_table WHERE id = '$id'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
if (!empty($row['1'])) {
 header("Content-type: application/pdf");
 header("Content-Disposition: attachment;filename=" . $row['pdf']);
 readfile( PDF_DIR . $row['pdf']);
}
else {
 $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
 header("Location: $referer");
}
?>
