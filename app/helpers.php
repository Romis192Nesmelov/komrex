<?php

function singularName($name) {
    $name = explode(' ',$name);
    if (count($name) == 1) return substr($name[0], 0,-2);
    else if (count($name) == 2) {
        $lastLettersInFirstWord = substr($name[0], strlen($name[0])-4,4);
        $cutFirstWord = substr($name[0], 0,-2);

        $lastLettersInSecondWord = substr($name[1], strlen($name[1])-4,4);
        $cutSecondWord = substr($name[1], 0,-4);

        if ($lastLettersInFirstWord == 'ры') $name[0] = $cutFirstWord;
        elseif ($lastLettersInFirstWord == 'ые') $name[0] = $cutFirstWord.'й';

        if ($lastLettersInSecondWord == 'ки') $name[1] = $cutSecondWord.'ок';
        elseif ($lastLettersInSecondWord == 'ые') $name[1] = $cutSecondWord.'ый';

        return $name[0].' '.$name[1];
    }

}
