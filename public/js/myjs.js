$( document ).ready(function(){    
    
    $('.but_del').click(function(){
        var id = $(this).attr('id');
        $('#'+id).next().attr('style','display:block'); 
    });
    
    $('.no').click(function(){
        $('.del').attr('style','display:none');
    });
    
    $('#item_name').keyup(function(){
        var value = $(this).val();
    $(".item_card h4").text(value);
    });
    
    $('#price').keyup(function(){
        var value = $(this).val();
        $('.price').text(value);
    });   
    
    $('#dlina').change(function(){
    var value = $(this).val();
    $(".dlina input").attr('value',value); 
    });
    
    $('#cat').change(function(){
        var value = $(this).val();
        console.log(value);
        $('.subhid').css('display','none');
        $('.subhid').attr('name','none');
        $('#id'+value).css('display','inherit');
        $('#id'+value).attr('name','sub');
    });
    
    $('.showform').click(function(){
        $(this).css('display','none');
        $(this).next().css('display','inherit');
    });
    
    $('.showphoto').click(function(){
        var url = $(this).attr('id');
        $('.bigfoto').attr('src','/img/original/'+url); 
    });
    
    $('.show_image_form').click(function(){
        var id = $(this).attr('id');
        $('.imgs_edit_links').css('display','none');
        $('.'+id).css('display','inherit');
    });
    
    $('body').on('click','.but_buk_r',function(){
//        console.log('СЃРјРµРЅР° СЂР°Р·РјРµСЂР° РІ РїСЂР°РІРѕ');
        var id = $(this).parent().attr('id');
            id = getID(id,$(this).parent().attr('class'));
        var op = true;
        var razmer = $('#razmer'+id).text();
        var el = $('#'+razmer+'-'+id).next();
        if(el.attr('class')=='prices')
        {
            var newprice = el.text();
//            razmer++;
            var newrazmer = el.attr('id').split('-')[0];
//            console.log(newrazmer);
        } else{
            op = false;
        }
        if(op)
        {
            $('#price'+id).text(newprice);
            $('#form_price'+id).val(newprice);
            $('#razmer'+id).text(newrazmer);
            $('#form_razmer'+id).val(getNum(newrazmer)); 
        }
    });
    
    $('body').on('click','.but_buk_l',function(){
//        console.log('СЃРјРµРЅР° СЂР°Р·РјРµСЂР° РІ Р»РµРІРѕ');
        var id = $(this).parent().attr('id');
            id = getID(id,$(this).parent().attr('class'));   
        var op = true;
        var razmer = $('#razmer'+id).text();
        var el = $('#'+razmer+'-'+id).prev();
        if(el.attr('class')=='prices')
        {
            var newprice = el.text();
//            razmer--;
            var newrazmer = el.attr('id').split('-')[0];
//            console.log('dfsd->'+newrazmer);
        } else{
            op = false;
        }
        if(op)
        {
            $('#price'+id).text(newprice);
            $('#form_price'+id).val(newprice);
            $('#razmer'+id).text(newrazmer);
            $('#form_razmer'+id).val(getNum(newrazmer)); 
        }    
    });
    
    $('body').on('click','.but_sin_r',function(){
        var id = $(this).parent().attr('id');
            id = getID(id,$(this).parent().attr('class'));
        var op = true;
        var dlina = $('#dlina'+id).val();
        var el = $('#'+dlina+id).next();
        if(el.attr('class')=='dlini')
        {
            var newprice = el.text();
            var newdlina = el.attr('id');
            newdlina = getID(newdlina,id);
        } else{
            op = false;
        }
        if(op)
        {
            $('#price'+id).text($('.single_value'+id));
            $('#kolvo'+id).val(1);
            $('#price'+id).text(newprice);
            $('#form_price'+id).val(newprice);
            $('.single_value'+id).text(newprice);
            $('#dlina'+id).val(newdlina); 
        }      
    });
    
    $('body').on('click','.but_sin_l',function(){
        var id = $(this).parent().attr('id');
        id = getID(id,$(this).parent().attr('class'));
        var op = true;
        var dlina = $('#dlina'+id).val();
        var el = $('#'+dlina+id).prev();
        if(el.attr('class')=='dlini')
        {
            var newprice = el.text();
            var newdlina = el.attr('id');
            newdlina = getID(newdlina,id);
        } else{
            op = false;
        }
        if(op)
        {
            $('#price'+id).text($('.single_value'+id));
            $('#kolvo'+id).val(1);
            $('#price'+id).text(newprice);
            $('#form_price'+id).val(newprice);
            $('.single_value'+id).text(newprice); 
            $('#dlina'+id).val(newdlina); 
        }      
    });
    
    $('body').on('click','.but_kolvo_r',function(){
        var id = $(this).parent().attr('id');
        id = getID(id,$(this).parent().attr('class'));
        var kolvo = $('#kolvo'+id).val();
        kolvo++;
        $('#kolvo'+id).val(kolvo)
        var single_price = $('.single_value'+id).text();
        var  price = $('#price'+id).text();
        $('#price'+id).text(Number(price)+Number(single_price));
        $('#form_price'+id).val($('#price'+id).text());
    });
    
    $('body').on('click','.but_kolvo_l',function(){
        var id = $(this).parent().attr('id');
        id = getID(id,$(this).parent().attr('class'));
        var kolvo = $('#kolvo'+id).val();
        kolvo--;
        if(kolvo!=0){
            $('#kolvo'+id).val(kolvo)
            var single_price = $('.single_value'+id).text();
            var  price = $('#price'+id).text();
            $('#price'+id).text(Number(price)-Number(single_price));
            $('#form_price'+id).val($('#price'+id).text());
        }    
    });
    
    $('input[name=PS]').change(function(){
        if($(this).val()=='none'){
            $('#PS').css('display','none');
        }else{  
            $('#PS').css('display','inherit');
            if($(this).val()=='word')$('#PS').text('Р§С‚Рѕ РїРµСЂРµРґР°С‚СЊ РЅР° СЃР»РѕРІР°С…?');
            if($(this).val()=='postcard')$('#PS').text('Р§С‚Рѕ РЅР°РїРёСЃР°С‚СЊ РЅР° РѕС‚РєСЂС‹С‚РєРµ?');
        }

    });
    
    $('#confim_but').click(function(){
        $('#confim_order').css('display','block');
        console.log('click');
    });
    
    $('.ed_set').click(function(){
        var id = $(this).attr('id');
        $('#set'+id).css('display','inherit');
    });
    
    $('.res').click(function(){
        var id = $(this).attr('id');
        $('.hidden').css('display','none');
    });
    
    $('body').on('click','.o',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        if(id === 'log'){
            $("#login-modal").modal('show');
        }
        if(id === 'reg'){
            $("#register-modal").modal('show');
        }
    });
    
    $('body').on('click','.easyAdd',function(e){
        e.preventDefault();
        $.ajax({
            url: '/basket/ajaxadd',
            method: 'POST',
            dataType: 'html',
            data: {
                razmer:$('#form_razmer').val(),
                price:$('#form_price').val(),
                user_id:$('#form_user').val(),
                item_id:$('#form_item').val(),
                kolvo:$('#form_count').val(),
                dlina:$('#form_dlina').val()
            },
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            success: function(res)
            {
                $('#bas_box').html(res);
                $('#but'+id).val('Р”РѕР±Р°РІР»РµРЅРѕ');
                $('#but'+id).css('background-image',"url('../img/but_bg_h2.png')");
                $('#but'+id).css('color','black');
            },
            error: function(msg){
                console.log(msg);
            }
        });
    });
    
    $('.ajaxadd').click(function () {

    var id = $(this).parent().attr('id');
    id = getID(id,$(this).parent().attr('class'));
    var razmer = $('#form_razmer'+id).val();
    var price = $('#form_price'+id).val();
    var kolvo = $('#kolvo'+id).val();
    console.log(kolvo);
    var dlina = $('#dlina'+id).val();
    var user_id = $('#form_user'+id).val();
    var item_id = $('#form_item'+id).val();

        $.ajax({
            url: '/basket/ajaxadd',
            method: 'POST',
            dataType: 'html',
            data: {
                razmer:razmer,
                price:price,
                user_id:user_id,
                item_id:item_id,
                kolvo:kolvo,
                dlina:dlina
            },
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            success: function(res)
            {
                $('#bas_box').html(res);
                $('#but'+id).val('Добавлено');
                $('#but'+id).css('background-image',"url('../img/but_bg_h2.png')");
                $('#but'+id).css('color','black');
            },
            error: function(msg){
                console.log(msg);
            }
        });
    });
    
    $('body').on('click','.rqdel',function(e){
        e.preventDefault();
        $('#rqDel'+$(this).attr('data-id')).modal('show');
    });
    
    $('body').on('click','.nodel',function(e){
        $('.hidden').css('display','none');
        e.preventDefault();
    });
    
//    $('body').on('click','.sortOrders',function(e){
//        e.preventDefault();
//        $.ajax({
//            url: '/admin/order/sort',
//            method: 'POST',
//            dataType: 'html',
//            data: {
//                orderType:$(this).attr('data-type'),
//            },
//            headers: {
//                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
//            },
//            success: function(data)
//            {
//                $('.orders_box').html(data);
//            },
//            error: function(msg){
//                console.log(msg);
//            }
//        });
//    });
    
    $('body').on('click','.showCat',function(e){
        e.preventDefault();
        $('#catId').val($(this).attr('data-id'));
        $('#currentPage').val('');
        $.ajax({
            url: '/item/sort',
            method: 'GET',
            dataType: 'html',
            data: {
                catId:$(this).attr('data-id'),
            },
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            success: function(data)
            {
//                console.log('ok all');
//                console.log(data);
                $('.items').html(data);
            },
            error: function(msg){
                console.log(msg);
            }
        });
    });
    
//    $('body0').on('change','i-range',function(e){
//        console.log(e);
//    });
    window.onchangePrice =  function(t){
        var el = $('[data-type='+t+']');
//        console.log(el.val());
        $('.i-'+t).val(el.val());
    };
    
    $('body').on('click','.i-sort',function(e){
        e.preventDefault();
        var type = $(this).attr('data-type');
        if(type === 'cat'){
            $('.cat-sort').text('- '+$(this).children().first().text());
            $('.sub-sort').text('');
            $('#catId').val($(this).attr('data-id'));
            $('#subId').val('');
            $('.form-sort')[0].reset();
        }
        if(type === 'sub'){
            $('.sub-sort').text('- '+$(this).children().first().text());
            $('#catId').val($(this).attr('data-cat-id'));
            $('#subId').val($(this).attr('data-id'));
            $('.form-sort')[0].reset();
        }
        if(type === 'reset'){
            $('#catId').val('');
            $('#subId').val('');
            $('.cat-sort').text('');
            $('.sub-sort').text('');
            $('.form-sort')[0].reset();
        }
        $('#currentPage').val('1');
        $.ajax({
            url: '/item/sort',
            method: 'GET',
            dataType: 'html',
            data: {
                catId:$('#catId').val(),
                subId:$('#subId').val(),
                from:$('[name="ot"]').val(),
                to:$('[name="do"]').val(),
            },
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            success: function(data)
            {
//                console.log('ok all');
                $('.items').html(data);
            },
            error: function(msg){
                console.log(msg);
            }
        });
    });
    
    $('body').on('click','.deleteBasket',function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            method: 'GET',
            dataType: 'html',
//            data: {
//                catId:$('#catId').val(),
//                from:$('[name="ot"]').val(),
//                to:$('[name="do"]').val(),
//            },
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            success: function(data)
            {
//                console.log('ok all');
                $('.left').html(data);
            },
            error: function(msg){
                console.log(msg);
            }
        });        
    });
    
    $('body').on('click','.addAdresat',function(e){
        e.preventDefault();
        $('#adresat-modal').modal('show');
    });
    $('body').on('click','.profileEdit',function(e){
        e.preventDefault();
        $('#profile-edit-modal').modal('show');
    });
    $('body').on('click','.editPassword',function(e){
        e.preventDefault();
        $('#edit-pass-modal').modal('show');
    });
    
    $('body').on('click','.showMore',function(e){
        e.preventDefault();
        var page = $('#currentPage').val();
            $('#currentPage').val(++page);
//        var href = '/item/sort',//?page='+page+'&catId='+$('#catId').val();
////        console.log(href);
        $.ajax({
            url: '/item/sort',//?page='+page,//+'&catId='+$('#catId').val(),
            method: 'GET',
            dataType: 'html',
            data: {
                catId:$('#catId').val(),
                subId:$('#subId').val(),
                page:page,
                from:$('[name="ot"]').val(),
                to:$('[name="do"]').val()
            },
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            success: function(data)
            {
//                console.log(data);
                $('.items').append(data);
            },
            error: function(msg){
                console.log(msg);
            }
        });
    });
    ///Р’РµСЂС‚РёРєР°Р»СЊРЅРѕРµ РјРµРЅСЋ////
    $('#cssmenu li.has-sub > a').on('click', function(){
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        }
        else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });
    
    $('body').on('click','.editOrder',function(e){
        e.preventDefault();
        var modal = $(this).attr('data-modal');
        $('#'+modal).modal('show');
    });
    
    $('body').on('click','.editOrderItem',function(e){
        e.preventDefault();
        $.ajax({
            url: '/item/edit-modal/get?id='+$(this).attr('data-id'),
            method: 'GET',
            dataType: 'html',
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            success: function(data)
            {
//                console.log('ааякс прокатил =)',data);
                $('.modal-block').html(data);
                $('#editOrderItem').modal('show');
            },
            error: function(msg){
                console.log(msg);
            }
        });
    });
    
    $('body').on('click','.selectSize',function(e){
        e.preventDefault();
        $('#currentPrice').text($(this).next().val());
        $('#currentSize').text($(this).text());
        $('#form_razmer').val($(this).attr('data-size'));
        var picUrl = $('#photo_razmer'+$(this).attr('data-size')).val();
        console.log(picUrl);
        if(picUrl){
            $('.bigfoto').attr('src','/img/original/'+picUrl);
        } else {
            $('.bigfoto').attr('src','/img/original/net.jpg');
        }
    });
    
    $('body').on('click','.selectDlina',function(e){
        e.preventDefault();
        $('#currentPrice').text($(this).next().val()); 
        $('#currentDlina').text($(this).text());
        $('#form_dlina').val($(this).attr('data-dlina'));
        $('#form_count').val('1');
        $('.currentCount').text('1');
    });
    
    $('body').on('click','.minusCount',function(){
        var count = $('.currentCount').text();
        count--;
        if(count > 0){
            $('.currentCount').text(count);
            $('#form_count').val(count);
        }
    });
    $('body').on('click','.plusCount',function(){
        var count = $('.currentCount').text();
        count++;
        if(count > 0){
            $('.currentCount').text(count);
            $('#form_count').val(count);
        }
    });
    
    $('body').on('click','.showOrder',function(e){
        e.preventDefault();
        console.log($(this).attr('data-id'));
        $.ajax({
            url: '/order/show/'+$(this).attr('data-id'),//?page='+page,//+'&catId='+$('#catId').val(),
            method: 'GET',
            dataType: 'html',
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            success: function(data)
            {
                $('.this-content').html(data);
                $('#modal-ajax').modal('show');
            },
            error: function(msg){
                console.log(msg);
            }
        });
    });
 
    $('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');
    $('.date-time-picker').datetimepicker({
        locale: 'ru',
        inline: true,
        sideBySide: true
    });
});    
    /////////////////////////////Р¤СѓРЅРєС†РёРё//////////////////////////////////
function getNum($str){
    var res;
    if($str == 'Маленький')res=1;
    if($str == 'Средний')res=2;
    if($str == 'Большой')res=3;
    return res;    
}
function getStr($num){
    var res;
    if($num == 1)res='Маленький';
    if($num == 2)res='Средний';
    if($num == 3)res='Большой';
    return res;    
}
function getID($str,$id){
    var len = $str.length-$id.length;
    var res=''; var i=0;
    while(i<len)
    {
        res = res+$str.charAt(i);
        i++;
    }
return res;   
}
