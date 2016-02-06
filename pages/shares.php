<?php
$share = $db->query('SELECT * FROM shares s WHERE s.date_start > now() ORDER BY s.date_start LIMIT 1')->fetchAll();
// itemscope itemtype="http://schema.org/ScholarlyArticle"
?>
<div id="content" itemscope itemtype="http://schema.org/ScholarlyArticle">
<?php
if(!empty($share)){
    echo('<div class="header" itemprop="headline">'. $share[0]['title'] .'</div>');
    echo('<meta itemprop="articleSection" content="Скидки">');
    echo('<div class="header"><img itemprop="image" src="/images/shares/'. $share[0]['id'] .'_without.jpg" title='. $share[0]['title'] .'></div>');
    echo('<div itemprop="articleBody">'. $share[0]['description'] .'</div>');
    echo ('<div style="font-family: sans-serif;font-size: 75%;text-align: center;">*действующие скидки не суммируются</div>');
    echo('<meta itemprop="datePublished" content="2015-11-01">');
}
?>
</div>