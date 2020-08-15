<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

include "peminjaman.php";

$peminjaman = new peminjaman();
$mode = $_POST['mode'];

switch($mode){
    case 'add':
        $res =  $peminjaman->add($_POST);
        $out['status'] = $res;
        if($res)
            $out['messages'] = "Data Berhasil disimpan";
        else
            $out['messages'] = "Gagal Menyimpan Data";
            
        echo json_encode($out);
    break;
    case 'get':
        $data =  $peminjaman->get($_POST);
        echo json_encode($data);
    break;
}
?>
