<?php
$b = 10;
?>
<script src="../vendor/components/jquery/jquery.min.js"></script>

<script type="text/javascript">
    function inSize(event) {
        var height = Number(event.target.style.height.substring(0,event.target.style.height.length - 2));
        event.target.style.height = (height + 15) + 'px';
    }
    $(document).ready( function () {
        $('div').bind('click',inSize);
        }
    )

/*
    document.write('Hello world <br/>');
    var a = 12;
    var b =
    var c = a + b;
    document.write(c + '<br />');

    var mas = ['123','456','789'];
    for (var i =0; i < mas.length; i++){
        document.write(mas[i] + '<br />');
    }

    if (c === 100) {
        document.write('=100');
    } else if( c > 100){
        document.write('>100');
    } else  {
        document.write('<100');
    }
/*
    if(confirm('is 18?')){
        alert('true');
    } else {
        alert('false');
    }

    var name = prompt('enter name', 'olidhofgldfg');
    //alert('Hello' + name);
    document.write('Hello ' + name);
    */
</script>
<div style="height: 50px; width: 50px;background-color: red; float: left;"></div>
<div style="height: 50px; width: 50px;background-color: green;float: left"></div>
<div style="height: 50px; width: 50px;background-color: blue;float: left"></div>
<div style="clear: both;"></div>
<br />
<p class="scolor" style="color: red;">Red</p>
<script type="text/javascript">
    $(document).ready(function (){
        $('.scolor').click(function () {
            if($(this).css('color') == 'rgb(0, 0, 255)'){
                $(this).css('color','red');
                $(this).html('Red');
            } else {
                $(this).css('color','blue');
                $(this).html('Blue');
            }
        });
    });
</script>