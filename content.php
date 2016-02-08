<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18.06.2015
 * Time: 20:18
 */
echo('<div id="main_content">');
$URL = explode('/', $_SERVER['REQUEST_URI']);
switch($URL[1]) {
    case '':
        include_once('pages/main.php');
        break;
    case 'about-us':
        include_once('pages/about_us.php');
        break;
    case 'types':
        include_once('pages/types.php');
        break;
    case 'gallery':
        include_once('pages/gallery.php');
        break;
    /*case 'comments':
        include_once('pages/comments.php');
        break;*/
    case 'feedback':
        include_once('pages/feedback.php');
        break;
    case 'sales':
        include_once('pages/sales.php');
        break;
    case 'tips':
        include_once('pages/tips.php');
        break;
    case 'shares':
        include_once('pages/shares.php');
        break;
    case 'price':
        include_once('pages/price.php');
        break;
    case 'sitemap':
        include_once('pages/sitemap.php');
        break;
}
echo('</div>');
?>