$(document).ready(function() {
    $(".fancy").fancybox();
    /**/
    $('.best-work-item').mouseover(function(event){
    	var tintBlockH = $(this).height(),
            tintBlockW = $(this).width(),
            tintTextLeft = ((tintBlockW/100)*20)+22.5,
            tintLeft = $('.best-works-holder').width()*0.015;
    	$(this).find('.tint-holder').css({ width: tintBlockW, height: tintBlockH, opacity: 1, left: tintLeft });
    	$(this).find('.tint-text').css({'margin-left': -tintTextLeft});
        
        var eventCross = event || window.event;
        var targetCross = event.target || event.srcElement;
        if($(targetCross).closest('.best-work-item').length === 1){
            var $targetCross = $(targetCross);
            if(!$(targetCross).hasClass('.best-work-item'))
                $targetCross = $(targetCross).parents('.best-work-item');
            $targetCross.find('.tint-text').css({ 'margin-top': -$targetCross.find('.tint-text').height()/2})
        }
    });
    $('.best-work-item').mouseout(function(){
    	$(this).find('.tint-holder').css({ opacity: 0 });
    });
    
    var $calculator = $('.price-calculation-item-calculator');
    if($calculator.hasClass('price-calculation-item-calculator')) calculate($calculator);
    
    // верхнее меню
    var href = (window.location.pathname).split('/');
    $(".nav-header-navigation li a").each(function(){
        var $this = $( this );
        if(href[1] === ($this.attr('href').replace('/', ''))){
            $this.parent('li').find('a').removeClass('active');
            $this.removeClass('active').addClass('active');
        }
    });
    
    $calculator.find('.price-calculator-top a').live('click', function(e){
        var $this = $(e.target);
        $calculator.find('.price-calculator-top a').removeClass('active');
        $this.addClass('active');
        e.preventDefault();
        calculate($calculator);
    });
    $calculator.find('input[data-type="m2"]').live('keyup', function(){ calculate($calculator) });
    $calculator.find('input[data-type="corners"]').live('keyup', function(){ calculate($calculator) });
    $calculator.find('input[data-type="lamps"]').live('keyup', function(){ calculate($calculator) });

    //Всплывающее окно
    $('a.show_popup, div.show_popup').click(function () {
        $('.popup.reg_form').fadeIn(300);
        cn(11);
        $("body").append("<div id='overlay'></div>");
        $('#overlay').show().css({'filter' : 'alpha(opacity=50)'});
        return false;
    });
    $('a.close').click(function () {
        $(this).parent().fadeOut(100);
        $('#overlay').remove('#overlay');
        return false;
    });
    $('body').click(function(e){
        var $this = $(this);
        if($(e.target).closest('.popup').length === 0){
            $('a.close').click();
        }
    });
    $('.popup input[type="submit"]').click(function(){
        var $this = $( this );
        var phone = $this.parents('form').find('input[name="phone"]').val();
        var name = $this.parents('form').find('input[name="name"]').val();
        if(phone.length < 1){
            alert('Необходимо ввести номер телефона, для связи с Вами.');
            return false;
        }
        $.ajax({
            type: 'POST',
            url: '/ajax.php/callback',
            dataType: "json",
            data: {'phone': phone, 'name': name},
            success: function(msg){
                if(typeof(msg.response) !== 'null'){
                    if(msg.response === 'ok'){
                        $this.parents('form').find('input[name="phone"]').val('');
                        $this.parents('form').find('input[name="name"]').val('');
                        $('a.close').click();
                        alert('Мы перезвоним Вам в ближайшее время.');
                    }
                }else{
                    alert('Произошла ошибка, попробуйте позднее.');
                }
            }
        });
        return false;
    });
    
    $('#nav .nav li').click(function(){
        document.location.href = $( this ).find('a').attr('href');
    });
    
    $('.arrow_left, .arrow_right').click(function(event){
        var elem = $(event.target);
        if(elem.attr('class') === 'arrow_left'){
            //  нажатие на круглешок слева
            var curpoint = elem.parent().find('.pagination .current').index();
            (elem.parent().find('.pagination li')).eq(curpoint - 1).find('a').trigger('click');
        }else if(elem.attr('class') === 'arrow_right'){
            //  нажатие на круглешок справа
            var curpoint = elem.parent().find('.pagination .current').index();
            if((elem.parent().find('.pagination li')).length === (curpoint + 1))
                (elem.parent().find('.pagination li')).eq(0).find('a').trigger('click');
            else
                (elem.parent().find('.pagination li')).eq(curpoint + 1).find('a').trigger('click');
        }
    });
});

function cn(obj){
    console.log(obj);
}

var calculate = function($calculator){
    var pattern = /[а-яА-ЯЁёa-zA-Z]/g;
    
    $calculator.find('input[data-type="m2"]').val(($calculator.find('input[data-type="m2"]').val()).replace(pattern, ''));
    $calculator.find('input[data-type="corners"]').val(($calculator.find('input[data-type="corners"]').val()).replace(pattern, ''));
    $calculator.find('input[data-type="lamps"]').val(($calculator.find('input[data-type="lamps"]').val()).replace(pattern, ''));
    
    var type = $calculator.find('.price-calculator-top .active').attr('data-type'),
        m2 = $calculator.find('input[data-type="m2"]').val(),
        corners = $calculator.find('input[data-type="corners"]').val(),
        lamps = $calculator.find('input[data-type="lamps"]').val(),
        $itogo = $calculator.find('.price-calculator-total span');
    
    var m2_amount = parseInt(m2);
    switch(type){
        case '0':
        m2_amount = parseInt(m2) * 1010;
        break;
        case '1':
        m2_amount = parseInt(m2) * 650;
        break;
        case '2':
        m2_amount = parseInt(m2) * 830;
        break;
    }
    m2_amount = isNaN(m2_amount) ? 0 : m2_amount;
    var corners_amount = isNaN(parseInt(corners)) ? 0 : parseInt(corners) * 200;
    var lamps_amount = isNaN(parseInt(lamps)) ? 0 : parseInt(lamps) * 390;
    
    var sum = (m2_amount + corners_amount + lamps_amount);
    if(isNaN(sum)) sum = 0;
    
    $itogo.text(sum +' руб.');
}