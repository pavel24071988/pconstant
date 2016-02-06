<?php
    include_once('connect.php');
    include_once('common_functions.php');
    
    header("HTTP/1.0 404 Not Found");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" href="/css/style.css" media="all" />
	<link rel="stylesheet" href="/css/jquery.fancybox-1.3.4.css" media="all" />
        
        <link rel="icon" href="http://pconstant.ru/favicon.png" type="image/png" />
        <link rel="shortcut icon" href="http://pconstant.ru/favicon.png" type="image/png" />

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.main.js"></script>
        
        <title>Извините, запрашиваемая страница не найдена.</title>
        <meta content="Извините, запрашиваемая страница не найдена." name="description"/>
        <meta content="404" name="keywords"/>
</head>
<body>

<div class="wrapper">
	
        <?php include_once('header.php'); ?>
        
        <br/>
        <br/>
        <br/>
        
        <div class="services" style="padding-bottom: 0;">
            <h1 class="tipical-h1-headline black">
                <span>404 страница не найдена</span>
            </h1>
        </div>
        
        <div class="services-promo-text clearfix">
        <div class="services-promo-text-item">
        Извините, запрашиваемая страница не найдена.
        <div>
        <a href="/">перейти на главную</a>
        </div>
        </div>
        <br/>
        <br/>
        <br/>        
        </div>

</div>

<?php include_once('footer.php'); ?>

</body>
</html>