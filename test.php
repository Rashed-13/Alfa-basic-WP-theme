<?php 

function full_name( string $name, $callBack, $arr){
    echo "Your full name is {$name}\n";
    $callBack("your girl-friend is", $arr);
}

function callback($text, $glist){
    echo "Now {$text} {$glist[1]}";
}
full_name("Rashed", "callback", array("Momo", "Khadiza"));