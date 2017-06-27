<link rel="stylesheet" type="text/css" href="style.css" />
<script src="../vendor/components/jquery/jquery.min.js"></script>
<div class="desc"><h2>oighousdfhklghjpdkgsjpiodghpjdfjhdghjghjdghj<br/>wliwhuhgiowurtwrhwrthfghfgh</h2></div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        count = 1;
        setInterval(function () {
            if (count == 2){
                jQuery('.desc').css('color', 'green');
                count = 3;
            } else if (count == 1){
                jQuery('.desc').css('color', 'red');
                count = 2;
            } else  {
                jQuery('.desc').css('color', 'blue');
                count = 1;
            }
        }, 1500);
    });
</script>

<form>
    <label>Male</label>
    <input type="radio" name="gender" value="1" />
    <label>Female</label>
    <input type="radio" name="gender" value="2" /><br/>
    <span id="error"></span>
    <input type="text" name="login"/><br />
    <input type="submit" id="enter" value="Send" />
</form>

<script type="text/javascript">
jQuery(document).ready(function () {
    jQuery('#enter').click(function () {
        var login = jQuery('input[name="login"]').val();
        var gender = jQuery('input[name="gender"]:checked').val();
        if(login.length >=4){
            jQuery('#error').html('');
        }  else {
            jQuery('#error').html('<p style="color: red;">WrongLogin</p>');
        }
        if(gender){
            if(gender == 1){
                alert('You are male');
            } else {
                alert('You are female');
            }
        } else {
            alert('Chose gender');
        }
        return false; //отменяет стандартное действие, форма не отправится
    });
});
</script>
<br />

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#otpr23').click(function (event) {
            event.preventDefault();
            jQuery('#overlay').fadeIn(400,
            function(){
                jQuery('#modal_form').css('display', 'block'). animate({opacity:1, top: '60%'}, 1000);
            });

        });
        jQuery('#modal_close, #overlay').click(
            function () {
                jQuery('#modal_form').animate({opacity:0, top: '40%'},200,
                    function () {
                        jQuery(this).css('display','none');
                        jQuery('#overlay').fadeOut(400);
                    });
            });
    });
</script>

<a id="otpr23">Вызвать</a>
<div id="modal_form">
    <span id="modal_close" style="font-size: 15px; font-weight: bold;">X</span>
    <span class="qwe">OrderCall</span>
    <div class="bor"></div>
    <div class="q-obr">
        <input name="name23" placeholder="Enter name" type="text" style="margin-bottom: 20px;" class="inp2">
        <input name="phone23" placeholder="Enter phone" type="text" style="margin-bottom: 50px;" class="inp2">
        <a class="submit-button" id="otpr">Send</a>
    </div>
</div>
<div id="overlay"></div>

<p id="load" style="cursor:pointer;">Loading data</p>
<div id="information"></div>
<br /><br /><br />
<script type="text/javascript">
    function funcBefore() {
        jQuery('#information').text('Loading...');
    }
    function funcSuccess(data) {
        jQuery('#information').text(data);
    }

    jQuery(document).ready(function () {
        jQuery('#load').bind('click',function () {
            var name = 'user';
            var pass = '1234';
            jQuery.ajax({
                url: 'content.php',
                type: 'POST',
                data: 'name='+name+'&password='+pass,
                dataType: 'html',
                beforeSend: funcBefore,
                success: funcSuccess
            });
        });
    });
</script>

<?php

