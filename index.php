<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS AJAX JQUERY</title>
</head>
<body>
    
    <link rel="stylesheet" href="lib/style.css"/>
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="lib/jquery-ui-1.12.1/jquery-ui.min.css"/>

    <nav class= "navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">PERPUSTAKAAN</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php $aktif = isset($_GET['url'])?$_GET['url']:''; ?>

                <li class="nav-item <?php if($aktif == 'member'){ echo "active"; } ?>">
                    <a href="index.php?url=member" class="nav-link">Member</a>
                </li>

                <li class="nav-item <?php if($aktif == 'peminjaman'){ echo "active"; } ?>">
                    <a href="index.php?url=peminjaman" class="nav-link">Peminjaman</a>
                </li>

            </ul>
        </div>
    </nav>



    <div class="row">
        <div class="container">
            <?php 
                include('config_page.php'); 
                include('module.php'); 
                if(isset($url_page) && $url_page !='')
                    include($url_page);
            ?>
        </div>
    </div>

    <script src="lib/jquery-3.4.1.min.js"></script>
    <script src="lib/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="lib/swal/dist/sweetalert2.all.min.js"></script>

    <?php 
        if(isset($url_js) && $url_js !='')
            include($url_js);
    ?>

</body>
</html>