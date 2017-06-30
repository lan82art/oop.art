<?php
/*class A{
    public function b($name){
        if(is_array($name)) {
            foreach ($name as $n) {
                echo $n . '<br/>';
            }
            return $name;
        } else return $name;
    }
}
$a = new A;
$name = array(1,2,3,4,5);
echo $a->b($name);*/

abstract class A{
    abstract public function aa();

    public function bb()
    {
        echo 'Hello';
    }
}

abstract class B extends A {
    /*public function aa(){
        echo 'abstract';
    }*/
    public function bb2()
    {
        echo 'Hello';
    }
    abstract public function cc();
}

class C extends B {
    public function aa(){
        echo 'abstract';
    }

    public function cc()
    {
        echo 'abstract2';
    }

    public function bb()
    {
        echo 'No static';
    }
}

$ccc = new C;
$ccc->aa();
echo '<br/>';
$ccc->cc();

interface AA{
    public function a();
}
interface BB{
    public function b();
}
interface CC{
    public function c();
}

class D implements BB,CC,AA{
    public function a()
    {
        echo 'A<br/>';
    }
    public function b()
    {
        echo 'B<br/>';
    }
    public function c()
    {
        echo 'C<br/>';
    }
}
$d = new D;
$d->a();
$d->b();
$d->c();

