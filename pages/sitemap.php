<br/>
<br/>
<br/>

<div class="services" style="padding-bottom: 0;">
        <h1 class="tipical-h1-headline black">
                <span>карта сайта</span>
        </h1>
</div>

<div class="services">
<div class="service-item clearfix">
<div class="service-item-right">
<?php
$sitemapstr = '';
$sitemaprows = $db->query('SELECT * FROM main_meta WHERE name IN (\'about_us\', \'sales\', \'tips\', \'types\')')->fetchAll();
foreach($sitemaprows as $key => $sitemaprow){
    $sitemapstr .= '<a href="http://pconstant.ru/'. $sitemaprow['name'] .'">'. $sitemaprow['name_ru'] .'</a><br />';
    $sitemapsubrows = $db->query('SELECT * FROM '. $sitemaprow['name'] .' ORDER BY update_date')->fetchAll();
    foreach($sitemapsubrows as $key_ => $sitemapsubrow){
        $sitemapstr .= '<a style="margin-left: 20px;" href="http://pconstant.ru/'. $sitemaprow['name'] .'/'. $sitemapsubrow['url'] .'">'. $sitemapsubrow['title'] .'</a><br />';
    }
}
echo('<div id="content" class="sitemap">
        '. $sitemapstr .'
    </div>');
?>
</div>
</div>
</div>