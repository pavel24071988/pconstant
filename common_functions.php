<?php

function get_sitemetatags($URI, $db){
    $meta_title = 'pconstant.ru - натяжные потолки Москва и московская область, продажа, купить натяжной потолок, установка, низкие цены, выезд на объект, замер, натяжные потолки своими руками';
    $meta_keywords = 'натяжные потолки, ремонт, натяжные потолки московская область, фотообои, многоуровневые потолки, подвесные потолки, натяжной потолок купить';
    $meta_description = 'pconstant.ru, натяжные потолки, ремонт, качество, натяжные потолки дешево, монтаж натяжных потолков, фотообоев, многоуровневых потолков, подвесных потолков в Москве и московской области';
    if($URI[1] === 'about-us') $URI[1] = 'about_us';
    if(!empty($URI[1]) && !empty($URI[2])){
        try{
            $meta = $db->query('SELECT * FROM '. $URI[1] .' WHERE url = \''. $URI[2] .'\'')->fetch();
            $meta_title = isset($meta['meta_title']) ? $meta['meta_title'] : $meta_title;
            $meta_keywords = isset($meta['meta_keywords']) ? $meta['meta_keywords'] : $meta_keywords;
            $meta_description = isset($meta['meta_description']) ? $meta['meta_description'] : $meta_description;
        }catch(Exception $e){
        }
    }elseif(empty($URI[2]) && !empty($URI[1])){
        try{
            $meta = $db->query('SELECT * FROM main_meta WHERE name = \''. $URI[1] .'\'')->fetch();
            $meta_title = isset($meta['meta_title']) ? $meta['meta_title'] : $meta_title;
            $meta_keywords = isset($meta['meta_keywords']) ? $meta['meta_keywords'] : $meta_keywords;
            $meta_description = isset($meta['meta_description']) ? $meta['meta_description'] : $meta_description;
        }catch(Exception $e){
        }
    }
    
    echo('
      <title>'. $meta_title .'</title>
      <meta name="keywords" content="'. $meta_keywords .'">
      <meta name="description" content="'. $meta_description .'">
    ');
}

function redirect_old_integer_url($db, $page_id, $page_type){
    $page_404 = new page_404('');
    if($page_type === 'about-us') $page_type = 'about_us';
    try {
        $page = $db->query('SELECT * FROM '. $page_type .' WHERE id = '. $page_id)->fetch();
        if(!empty($page['url'])){
            if($page_type === 'about_us') $page_type = 'about-us';
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /". $page_type ."/". $page['url']);
            exit;
        }else{
            $page_404->set_page($URL);
        }
    }catch(Exception $e){
        $page_404->set_page($URL);
    } 
}

function get_pre_headers($URI, $db){
    $page_404 = new page_404($URL);
    // проверим на 404
    if(!empty($URI[1])){
        if($URI[1] === 'about-us') $URI[1] = 'about_us';
        $page = $db->query('SELECT * FROM main_meta WHERE name = \''. $URI[1] .'\'')->fetch();
        if(empty($page)){
            $page_404->set_page($URL);
        }else{
            if(!empty($URI[2])){
                $page = $db->query('SELECT * FROM '. $URI[1] .' WHERE url = \''. $URI[2] .'\'')->fetch();
                if(!empty($page)){
                    if(!empty($URI[3])){
                        $page_404->set_page($URL);
                    }
                }else{
                    $page_404->set_page($URL);
                }
            }
        }
    }
    
    /*
    $LastModified_unix = time(); // время последнего изменения страницы
    $LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
    $IfModifiedSince = false;
    if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
        $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));  
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
        $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
    if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        exit;
    }
    header('Last-Modified: '. $LastModified);
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    */
}

function get_soc_comment($vb_url){
    return '
        <!-- Put this script tag to the <head> of your page -->
        <script type="text/javascript" src="//vk.com/js/api/openapi.js?117"></script>

        <script type="text/javascript">
          VK.init({apiId: 5125069, onlyWidgets: true});
        </script>

        <!-- Put this div tag to the place, where the Comments block will be -->
        <div id="vk_comments"></div>
        <script type="text/javascript">
        VK.Widgets.Comments("vk_comments", {limit: 10, width: "550", attach: "*"});
        </script>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, \'script\', \'facebook-jssdk\'));
        </script>

        <div class="fb-comments" data-href="http://pconstant.ru/'. $vb_url .'" data-width="530" data-numposts="5"></div>
    ';
}

function get_article_section($URL){
    $section_name = 'Основная информация';
    $array_of_names = array(
        'about-us' => 'О нас',
        'types' => 'Виды работ',
        'gallery' => 'Галерея',
        'sales' => 'Скидки',
        'price' => 'Цены',
        'feedback' => 'Контакты',
        'tips' => 'Полезные советы'
    );
    if(!empty($array_of_names[$URL])) $section_name = $array_of_names[$URL];
    return $section_name;
}

class page_404
{
    private $URL;
            
    function __construct($URL){
        $this->url = $URL;
    }
    
    public static function set_page(){
        header("HTTP/1.0 404 Not Found");
        header("Location: /404.php");
    }
}

?>