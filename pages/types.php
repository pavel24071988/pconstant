<?php
if(!empty($URI[2])){
    echo '<br/><br/><br/>';
    
    $page = $db->query('SELECT * FROM types WHERE url = \''. $URI[2] .'\'')->fetch();
    $path_to_image = file_exists($_SERVER['DOCUMENT_ROOT'] .'/images/'. $URI[1] .'/'. $URI[2] .'.jpg') ? '/images/'. $URI[1] .'/'. $URI[2] .'.jpg' : '/images/main_theme.jpg';
    
    // поделим текст пополам - так как у нас двух колоночная страница должна быть
    $text = $page['description'];
    $count_words = mb_strlen($text, 'UTF-8');
    $count_words_one = ceil($count_words / 2);
    // проверим - не обрывается ли текст не закрытым тегом
    $checktext = mb_substr($text, $count_words_one, 10, 'UTF-8');
    if(preg_match('/^p>|^\/p>/', $checktext))
       $count_words_one = $count_words_one + 10;
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
?>

<div class="top-banner">
        <img src="/images/img4.png" alt="советы по установке натяжного потолка"/>
</div>

<div class="services" style="padding-bottom: 0;">
        <h1 class="tipical-h1-headline black">
                <span>виды работ</span>
        </h1>
</div>

<div class="best-works service-works">
        <div class="best-works-holder clearfix">
            <?php
            $types = $db->query('SELECT * FROM types')->fetchAll();
            if(!empty($types)){
                foreach($types as $type) {
                    echo('
                        <a href="/types/'. $type['url'] .'" class="best-work-item">
                                <img src="/images/types/'. $type['id'] .'.jpg" alt="'. $type['title'] .'"/>
                                <div class="tint-holder">
                                        <div class="tint-text">'. $type['title'] .'</div>
                                </div>
                                <div class="best-work-title">'. $type['title'] .'</div>
                        </a>
                    ');
                }
            }
            ?>
        </div>

        <div class="services-promo-text clearfix">
                <div class="services-promo-text-item">
                        <p>Натяжные потолки бывают двух видов: тканевый и пленочный. Тканевые натяжные потолки принято считать экологически чистыми, так как она дает возможность “дышать” потолку. На производстве ее обрабатывают специальными веществами для того, чтобы придать антистатичности. Таким образом, потолок становится матовым на вид и шероховатым на ощупь. Чаще всего его используют в помещениях с неустойчивым режимом температуры. Если потолок протекает - полотно такого типа не задерживает воду и требует замены.</p>
                        <p>Для оформления интерьеров часто используют фотопечать. Потому что ничто так не украсит комнату, как фотопечать на потолок. Это позволяет спроектировать на нем рисунки любой сложности. Такие потолки смотрятся очень красиво и открывают для вас множество возможностей по созданию уникальных идей. В разделе натяжные потолки с фотопечатью каталог фото каждый сможет найти для себя наиболее подходящий, оригинальный вариант для оформления потолочной поверхности.</p>
                        <p>Чтобы изготовить пленочный потолок - используют ПВХ (по составу он напоминает материал, из которого делают пластиковые окна). Это говорит о том, что потолок может выдержать воду при протекании (не больше 100 литров на 1 квадратный метр). Они богаты разнообразием выбора цвета и очень практичны в использовании. Уход за ними прост - достаточно протереть влажной тряпкой. Этот тип натяжных потолков подразделяют на: глянцевые, сатин и матовые.</p>
                </div>
                <div class="services-promo-text-item">
                        <p>Глянец визуально сделает помещение объемным, увеличит его с помощью отражения предметов и света. Зачастую его монтируют в помещениях нежилого типа: ванная, туалет, кухни и коридоры. Практичность глянца заключается в том, что очень легко вычистить.</p>
                        <p>Сатин в определенных цветах создает “кожаный” эффект, а само покрытие отлично скрывает недостатки и огрехи комнаты. Появляется эффект флера. Матовый потолок создает ощущение идеальной потолочной поверхности. Его считают самым простым и консервативным вариантом.</p>
                        <p>Огромной популярностью пользуются парящие потолки, которые предполагают встроенную подсветку в виде светодиодной ленты. С наружней стороны ее декорируют специальной вставкой для равномерного рассеивания света по стенам. Благодаря производственному прогрессу и разнообразию дизайнерских решений различают: одноуровневые и многоуровневые натяжные потолки. Первые считаются классическими и отлично подходят для небольших помещений, при ограниченном бюджете. Многоуровневые потолки, в свою очередь, устанавливают те люди, которым хочется больше изыска. Такие потолки являются своеобразным украшением помещения и отлично подчеркивают стиль, в котором выдержана комната. Стоит отметить, что двухуровневые натяжные потолки никогда не выйдут из моды и всегда будут смотреться эффектно.</p>
                </div>
        </div>
</div>
<?php    
}
?>