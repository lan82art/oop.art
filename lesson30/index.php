<script src="../vendor/components/jquery/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<!--<label>Укажите страну</label>
<select name="country">
    <option value="0"></option>
    <option value="1">Ukraine</option>
    <option value="2">Georgia</option>
</select>
<br/>
<label>Select city</label>
<select name="city">
    <option value="0"></option>
</select>-->
<!--
<script type="text/javascript">
    jQuery(document).ready(function(){
       jQuery('select[name="country"]').bind('change', function () {
           jQuery('select[name="city"]').empty();
           jQuery.get('city.php',({country: jQuery('select[name="country"]').val()}),
               function(data){
                   data2 = JSON.parse(data);
                   data = data2;
                   for(var id in data){
                       jQuery('select[name="city"]').append(jQuery('<option value="'+id+'">'+data[id]+'</option>'));
                   }
            });
       });
    });
</script>
-->
<!--<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('select[name="country"]').bind('change',function () {
            jQuery('select[name="city"]').empty();
            jQuery.ajax({
                url: 'city.php',
                type: 'get',
                data: 'country=' + jQuery('select[name="country"]').val(),
                dataType: 'json',
                success:function (data) {
                    for(var id in data){
                        jQuery('select[name="city"]').append(jQuery('<option value="'+id+'">'+data[id]+'</option>'));
                    }
                }
            })
        })
    })
</script>-->
<a id="otpr23">Вызвать</a>
<div id="modal_form">
    <span id="modal_close" style="font-size: 15px; font-weight: bold;">X</span>
    <span class="qwe">OrderCall</span>
    <div class="bor"></div>
    <div class="q-obr">
        <input name="name23" placeholder="Enter name" type="text" style="margin-bottom: 20px;" class="inp2">
        <span id="name_error"></span>
        <input name="phone23" placeholder="Enter phone" type="text" style="margin-bottom: 20px;" class="inp2">
        <span id="phone_error"></span>
        <input name="else23" placeholder="Enter something else" type="text" style="margin-bottom: 50px;" class="inp2">
        <span id="else_error"></span>
        <a class="submit-button" id="otpr">Send</a>
    </div>
</div>
<div id="overlay"></div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#otpr').click(function () {
            jQuery('#name_error').html('');
            jQuery('#phone_error').html('');
            jQuery('#else_error').html('');
            var error = 0;

            if (jQuery('input[name="name23"]').val().length < 4 ){
                jQuery('input[name="name23"]').val('');
                jQuery('#name_error').html('Wrong name');
                error = 1;
            }
            if (jQuery('input[name="phone23"]').val().length < 5 ){
                jQuery('input[name="phone23"]').val('');
                jQuery('#phone_error').html('Wrong phone');
                error = 1;
            }
            if (jQuery('input[name="else23"]').val().length < 10 ){
                jQuery('input[name="else23"]').val('');
                jQuery('#else_error').html('Wrong other');
                error = 1;
            }
            if (error == 0){
                jQuery.ajax({
                    url: 'city.php',
                    type: 'post',
                    data: 'name='+ jQuery('input[name="name23"]').val() +'&phone='+jQuery('input[name="phone23"]').val()+'&other='+jQuery('input[name="else23"]').val(),
                    dataType: 'json',
                    success: function() {
                        jQuery('#modal_close').trigger('click');

                    }
                })
            }
        });
        jQuery('#otpr23').click(function (event) {

            event.preventDefault();

            jQuery('#overlay').fadeIn(400,
                function(){
                    jQuery('#modal_form').css('display', 'block'). animate({opacity:1, top: '40%'}, 1000);
                });


        });
        jQuery('#modal_close, #overlay').click(function () {
                jQuery('#modal_form').animate({opacity:0, top: '40%'},200,
                    function () {
                        jQuery(this).css('display','none');
                        jQuery('#overlay').fadeOut(400);
                    });
            });
    });
</script>
<?php