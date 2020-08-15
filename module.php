<?php

    $url_page = "";
    $url_js = "";
    $url = isset($_GET['url'])?$_GET['url']:'';

    switch ($url){

        case "member":
            $url_page = "page/member/member_index.php";
            $url_js = "page/member/member_js.php";
        break;

        case "peminjaman":
            $url_page = "page/peminjaman/peminjaman_index.php";
            $url_js = "page/peminjaman/peminjaman_js.php";
        break;

        default:
            echo "Selamat datang diperpustakaan";
        break;
    }

?>