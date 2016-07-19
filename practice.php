C:\Users\wyndows\Desktop\Bootcamp\git\debug\abqwebgeeks-debug\practice.php

<?php
// as an object set

$s = new SplObjectStorage();
$o1 = new StdClass;
$o2 = new StdClass;
$o3 = new StdClass;

$s->attach($o1);
$s->attach($o2);



var_dump($s->contains($o1));
var_dump($s->contains($o2));
var_dump($s->contains($o3));

$s->detach($o2);

var_dump($s->contains($o1));
var_dump($s->contains($o2));
var_dump($s->contains($o3));

?>


<?php
// as a map from objects to data

$s = new SplObjectStorage();

$o1 = new StdClass;
$o2 = new StdClass;
