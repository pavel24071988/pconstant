<?php
if(!empty($URI[2])){
    echo '<br/><br/><br/>';
    
    $page = $db->query('SELECT * FROM sales WHERE url = \''. $URI[2] .'\'')->fetch();
    
    
    // поделим текст пополам - так как у нас двух колоночная страница должна быть
    $text = $page['description'];
    $count_words = mb_strlen($text, 'UTF-8');
    $count_words_one = ceil($count_words / 2);
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
                <div style="text-align: center;"><img itemprop="image" src="/images/sales/'. $page['id'] .'.jpg" alt="'. $page['title'] .'"/></div>
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
        </div>
    ');
}else{
?>
<div class="top-banner">
        <img src="/images/img6.png" alt="скидки и акции">
</div>

<div class="best-works service-works" itemscope itemtype="http://schema.org/ScholarlyArticle">
        <h1 class="tipical-h1-headline black">
                <span>Акции и скидки</span>
        </h1>
        <div class="services-promo-text clearfix">
                <div class="services-promo-text-item">
                        <p>Pconstant знает свое дело как никто лучше. Широкий спектр услуг, лояльные цены и, конечно же, огромное пространство для фантазии клиента и принятия выбора дизайнерских решений от Pconstant. Потолок - не менее важная часть помещения чем стены или пол. Он также служит показателем стиля и задумки зала, коридора или комнаты. </p>
                </div>
                <div class="services-promo-text-item">
                        <p>Высокая стоимость не показатель качества услуг. Натяжные потолки недорого звучит не внушительно и фотопечать фотографий через интернет звучит дорого? Не стоит беспокоиться! Уважая своих гостей и клиентов - предоставляются скидки на продукцию для более доступного выбора.</p>
                </div>
        </div>
        <div class="best-works-holder offers clearfix">
            <?php
            $sales = $db->query('SELECT * FROM sales')->fetchAll();
            foreach($sales as $key => $sale){
                echo('
                    <div class="best-work-item offer-item">
                            <div class="offer-item-image">
                                    <img itemprop="image" src="/images/sales/'. $sale['id'] .'.jpg" alt="'. $sale['title'] .'">
                            </div>
                            <div class="offer-item-title">
                                    <a href = "/sales/'. $sale['url'] .'">'. $sale['title'] .'</a>
                            </div>
                            <div>
                                    '. $sale['middle_title'] .'
                            </div>
                    </div>
                ');
            }
            ?>
        </div>
</div>
<?php
}
?>