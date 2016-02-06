<?php
if(!empty($URI[2])){
    echo '<br/><br/><br/>';
    
    $page = $db->query('SELECT * FROM tips WHERE url = \''. $URI[2] .'\'')->fetch();
    $path_to_image = file_exists($_SERVER['DOCUMENT_ROOT'] .'/images/'. $URI[1] .'/'. $URI[2] .'.jpg') ? '/images/'. $URI[1] .'/'. $URI[2] .'.jpg' : '/images/main_theme.jpg';
    
    // поделим текст пополам - так как у нас двух колоночная страница должна быть
    $text = $page['description'];
    $count_words = mb_strlen($text, 'UTF-8');
    $count_words_one = ceil($count_words / 2);
    // проверим - не обрывается ли текст не закрытым тегом
    $checktext = mb_substr($text, $count_words_one, 30, 'UTF-8');
    if(preg_match('/^p>|^\/p>|^\/strong>|^rong>|^li>|^>/', $checktext))
       $count_words_one = $count_words_one + 30;
    $first_column = mb_substr($text, 0, $count_words_one, 'UTF-8');
    $second_column = mb_substr($text, $count_words_one, $count_words, 'UTF-8');
    
    echo('
        <div itemscope itemtype="http://schema.org/ScholarlyArticle">
            <div class="services" style="padding-bottom: 0;">
                <h1 class="tipical-h1-headline black">
                    <span>'. $page['title'] .'</span>
                </h1>
            </div>
            <meta itemprop="articleSection" content="'. get_article_section($URI[1]) .'">
            <div class="content_text">
                <div style="text-align: center;"><img itemprop="image" src="'. $path_to_image .'" alt="'. $page['title'] .'"/></div>
                <br />
                <div><a href="/'. $URI[1] .'">назад</a></div>
                <br />
                <div itemprop="articleBody">
                    <div class="services-promo-text clearfix">
                    <div class="services-promo-text-item">
                    '. $first_column .' -
                    </div>
                    <div class="services-promo-text-item">
                    '. $second_column .'
                    </div>
                    </div>
                </div>
                <div itemprop="author" class="article_date">'. $page['author'] .'</div><br />
                <div itemprop="datePublished" class="article_date">'. $page['update_date'] .'</div><br /><br />
            </div>
        </div>');
}else{
    echo '<br/><br/><br/>';
    echo '
        <div class="services" style="padding-bottom: 0;">
            <h1 class="tipical-h1-headline black">
                <span>полезная информация</span>
            </h1>
        </div>
        <div class="services-promo-text clearfix">
    ';
    $tips = $db->query('SELECT * FROM tips')->fetchAll();
    $left = '';
    $right = '';
    foreach($tips as $key => $tip){
        $div = '<div class="tips_hrefs">
                  <a style="text-decoration: none;" href="/tips/'. $tip['url'] .'">'. $tip['title'] .'</a>
                </div>';
        if(($key % 2) == 0)
            $left .= $div;
        else
            $right .= $div;
    }
    echo('
        <div class="services-promo-text-item">'. $left .'</div>
        <div class="services-promo-text-item">'. $right .'</div>
    ');
    echo '</div>';
}
?>
<br/>
<br/>
<br/>