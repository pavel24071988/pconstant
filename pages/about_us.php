<?php
if(!empty($URI[2])){
    echo '<br/><br/><br/>';
    
    $page = $db->query('SELECT * FROM about_us WHERE url = \''. $URI[2] .'\'')->fetch();
    $path_to_image = file_exists($_SERVER['DOCUMENT_ROOT'] .'/images/'. $URI[1] .'/'. $URI[2] .'.jpg') ? '/images/'. $URI[1] .'/'. $URI[2] .'.jpg' : '/images/main_theme.jpg';
    
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
    <img src="/images/img2.png" alt="о компании пконстант">
</div>

<div class="promo-text">
        <div class="pconstant-headline">
                <span class="pconstant-headline-brand"><span>P</span>constant</span> - команда специалистов
        </div>
        Компания ПиКонстант - это команда специалистов, которая поможет вам создать уют и стиль в любом помещении при помощи натяжных потолков. Мы работаем по всем крупным центрам России, а также устанавливаем натяжные потолки в Московской области по всем большим населенным пунктам.
</div>

<div class="promo-about clearfix">
        <div class="promo-about-item">
                <div class="promo-about-item-title">Наш опыт</div>
                Мы работаем на рынке с 1756 года, у нас большой опыт в натяжных потолках, фотопечати, гипсокартонных конструкциях и парящих потолках. Мы начали свою работу в Москве, но из за растущего спроса на данный вид ремонта постепенно расширились на всю Московскую область. Наши клиенты выбирают нас из за оптимального соотношения цены и качества, которое было выверено годами работы в данной сфере. Наши монтажники являются опытными профессионалами - так как в компании периодически проводятся тренинги и обучения персонала. Мы следим за новейшими тенденциями в данной сфере и сразу предоставляем клиентам новейшие способы монтажа, экономии, качества продукции.
        </div>
        <div class="promo-about-item">
                <div class="promo-about-item-title">Что мы предлагаем</div>
                Наша задача - не просто смонтировать потолок. Каждый проект проходит несколько этапов: разработку, выбор типа покрытия, подбор материалов, дополнительные услуги по подготовке к установке, как тепло- и шумоизоляция потолков. Далее - непосредственные работы с монтировкой света на потолке, разводкой основных компонентов освещения и монтаж натяжного потолка. Это только основные этапы работ. Также мы выполняем дополнительные услуги, как шумоизоляция потолка в квартире под натяжной полостью - это актуально для апартаментов в многоэтажном доме, и обязательный слив воды с натяжного потолка в результате течи с крыши - частая проблема для помещений внутри частных домов.
        </div>
</div>

<div class="advantages">
        <h1 class="tipical-h1-headline">
                <span>наши преимущества</span>
        </h1>
        <div class="advantages-items-holder clearfix">
                <div class="advantages-item">
                    <a href="/about-us/love_to_work"><img src="images/pic1.png" alt="Индивидуальный подход"/></a>
                        <div class="advantages-item-headline">
                                Индивидуальный подход
                        </div>
                        <div class="advantages-item-text">
                                Каждый клиент для нас особенный, мы учитываем все Ваши пожелания
                        </div>
                </div>
                <div class="advantages-item">
                        <a href="/about-us/vuisokoe_kachestvo"><img src="images/pic2.png" alt="Высокое качество работы"/></a>
                        <div class="advantages-item-headline">
                                Высокое качество работы
                        </div>
                        <div class="advantages-item-text">
                                Мы используем лучшишее оборудование и материалы
                        </div>
                </div>
                <div class="advantages-item">
                        <a href="/about-us/montazh_i_osvechenie"><img src="images/pic3.png" alt="Уникальные варианты освещения"/></a>
                        <div class="advantages-item-headline">
                                Уникальные варианты освещения
                        </div>
                        <div class="advantages-item-text">
                                Мы предлагаем самые разнообразные варианты установки освещения в потолки
                        </div>
                </div>
                <div class="advantages-item">
                        <a href="/about-us/otlichnuie_predlozhenia"><img src="images/pic4.png" alt="Бесплтаный замер помещения"/></a>
                        <div class="advantages-item-headline">
                                Бесплтаный замер помещения
                        </div>
                        <div class="advantages-item-text">
                                Замер дизайнером-технологом не будет Вам стоить абсолютно ничего
                        </div>
                </div>
                <div class="advantages-item">
                        <a href="/about-us/mnozhestvo_uslug"><img src="images/pic5.png" alt="Компьютерный подбор цветов"/></a>
                        <div class="advantages-item-headline">
                                Компьютерный подбор цветов
                        </div>
                        <div class="advantages-item-text">
                                Мы дадидим рекоммендации по цветам потолка, на основе копьютерного подбора под элементы Вашего интерьера
                        </div>
                </div>
                <div class="advantages-item">
                        <a href="/about-us/mastera_professionalui"><img src="images/pic6.png" alt="Гарантийное обслуживание потолка"/></a>
                        <div class="advantages-item-headline">
                                Гарантийное обслуживание потолка
                        </div>
                        <div class="advantages-item-text">
                                На каждый установленный нами потолок есть гарантийный срок обслуживания
                        </div>
                </div>
        </div>
</div>

<div class="best-works">
        <h1 class="tipical-h1-headline">
                <span>ПРИМЕРЫ РАБОТ</span>
        </h1>
        <div class="best-works-holder clearfix">
                <a href="/images/gallery/7.jpg" rel="group1" class="fancy best-work-item">
                        <img itemprop="image" src="/images/gallery/7.jpg" alt="комбинация диодного и точечного освещения одним уровнем потолка" />
                        <div class="tint-holder">
                                <div class="tint-text">Комбинация диодного и точечного освещения одним уровнем потолка</div>
                        </div>
                </a>
                <a href="/images/gallery/8.jpg" rel="group1" class="fancy best-work-item">
                        <img itemprop="image" src="/images/gallery/8.jpg" alt="комбинация натяжного потолка и внешней гипсокартонной конструкции" />
                        <div class="tint-holder">
                                <div class="tint-text">Комбинация натяжного потолка и внешней гипсокартонной конструкции</div>
                        </div>
                </a>
                <a href="/images/gallery/9.jpg" rel="group1" class="fancy best-work-item">
                        <img itemprop="image" src="/images/gallery/9.jpg" alt="комбинация фактуры потолка при выборе одного цвета" />
                        <div class="tint-holder">
                                <div class="tint-text">Комбинация фактуры потолка при выборе одного цвета</div>
                        </div>
                </a>
                <a href="/images/gallery/10.jpg" rel="group1" class="fancy best-work-item">
                        <img itemprop="image" src="/images/gallery/10.jpg" alt="комбинирование цвета натяжного потолка и стен" />
                        <div class="tint-holder">
                                <div class="tint-text">Комбинирование цвета натяжного потолка и стен</div>
                        </div>
                </a>
                <a href="/images/gallery/11.jpg" rel="group1" class="fancy best-work-item">
                        <img itemprop="image" src="/images/gallery/11.jpg" alt="Коммуникации скрываемые натяжным потолком" />
                        <div class="tint-holder">
                                <div class="tint-text">Коммуникации скрываемые натяжным потолком</div>
                        </div>
                </a>
                <a href="/images/gallery/12.jpg" rel="group1" class="fancy best-work-item">
                        <img itemprop="image" src="/images/gallery/12.jpg" alt="Монтаж потолка в гипсокартоновую нишу с установкой диодной подсветки" />
                        <div class="tint-holder">
                                <div class="tint-text">Монтаж потолка в гипсокартоновую нишу с установкой диодной подсветки</div>
                        </div>
                </a>
        </div>
        <div class="go-to-gallery">
                <a href="/gallery" class="grey-tipical-button">перейти к галерее работ</a>
        </div>
</div>

<?php include_once('calculator.php'); ?>

<div class="partners">
        <h1 class="tipical-h1-headline black">
                <span>с нами сотрудничают</span>
        </h1>
        <div class="partners-holder clearfix">
                <div class="partner-item">
                        <img src="images/partner1.png" alt="Флэтко"/>
                </div>
                <div class="partner-item">
                        <img src="images/partner2.png" alt="все потолки"/>
                </div>
                <div class="partner-item">
                        <img src="images/partner3.png" alt="новый уровень"/>
                </div>
                <div class="partner-item">
                        <img src="images/partner4.png" alt="меркурий"/>
                </div>
                <div class="partner-item">
                        <img src="images/partner5.png" alt="натяжной потолок в каждый дом"/>
                </div>
                <div class="partner-item">
                        <img src="images/partner6.png" alt="love eco"/>
                </div>
        </div>
        <div class="partners-text">
                Натяжные потолки - популярная альтернатива гипсокартону: они занимают намного меньше места и служат гораздо дольше. Преимущества и нюансы установки натяжных потолков на форуме обсуждаются так же часто, как и комбинирование их со всеми деталями интерьера комнаты. Мы гарантируем - такой заметный элемент может стать интересной изюминкой помещения, если его выполняют профессионалы - компания ПиКонстант. очень красиво смотрится в комплексе с ними смотрится шкаф купе с фотопечатью. Фото таких интерьеров всегда присутствовали на страницах передовых журналов по дизайну интерьеров. Еще один плюс - это разнообразие, можно задействовать вместо привычного ПВХ тканевые натяжные потолки. Фото печать на них обычно не производится, однако текстуры, расцветки и дизайн ни в чем не уступают!
        </div>
</div>

<div class="feedbacks">
        <h1 class="tipical-h1-headline black">
                <span>отзывы о работе</span>
        </h1>
        <div class="feedbacks-holder clearfix">
                <div class="feedback-item">
                        <div class="feedback-item-title">Взвешенная цена и качество</div>
                        <div>Работал с компанией по парящим потолкам - очень скурпулезно и качественно работали, никогда не думал что при монтаже парящего потолка так много нюансов, Спасибо ребят, на очереди и другие комнаты.</div>
                        <div class="feedback-item-author">Кирилл Пушкин<br>03.08.2015</div>
                </div>
                <div class="feedback-item">
                        <div class="feedback-item-title">Новый дом</div>
                        <div>Строились с женой в подмосковье, строительство, как известно, процесс болезненный, косяки и недочеты можно найти в любой работе, но вот ребята порадовали - в их работе, при приемне, недочетов не нашёл.</div>
                        <div class="feedback-item-author">Александр Терещенко<br>15.10.2015</div>
                </div>
                <div class="feedback-item">
                        <div class="feedback-item-title">Отличные потолки</div>
                        <div>Парни на выходных мне забомбили потолок - ваще огонь, теперь бреюсь в него и гостьям нравится, все как в зеркале, ну вы меня понимаете.</div>
                        <div class="feedback-item-author">Павел Чертов<br>16.11.2015</div>
                </div>
                <div class="feedback-item">
                        <div class="feedback-item-title">Ремонт</div>
                        <div>Залили натяжной потолок соседи, не очень хорошие люди, позвонили в компанию, приехали мастера и сразу сделали - спасибо, все просто ) - думала что затянется на дольше).</div>
                        <div class="feedback-item-author">Олеся Низовская<br>06.02.2016</div>
                </div>
        </div>
</div>
<?php
}
?>