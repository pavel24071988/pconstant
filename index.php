<?php
    include_once('connect.php');
    include_once('common_functions.php');
    if(!empty($URI[2])){
        if(preg_match("/[0-9]/", $URI[2])){
            // делаем 301 редирект на новую буквенную ссылку сайта
            redirect_old_integer_url($db, $URI[2], $URI[1]);
        }
    }
    get_pre_headers($URI, $db);
?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" href="/css/style.css" media="all" />
	<link rel="stylesheet" href="/css/jquery.fancybox-1.3.4.css" media="all" />
        
        <link rel="icon" href="http://pconstant.ru/favicon.png" type="image/png" />
        <link rel="shortcut icon" href="http://pconstant.ru/favicon.png" type="image/png" />

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="/js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="/js/jquery.main.js"></script>
        
        <?php get_sitemetatags($URI, $db); ?>
</head>
<body>

<div class="wrapper">
	
        <?php include_once('header.php'); ?>

        <?php include_once('content.php'); ?>

</div>

<?php include_once('footer.php'); ?>

</body>
</html>