<?php

function singularName($name) {
    $name = explode(' ',$name);
    if (count($name) == 1) return substr($name[0], 0,-2);
    else if (count($name) == 2) return substr($name[0], 0,-2).'й '.str_replace('катки','каток',$name[1]);

}
