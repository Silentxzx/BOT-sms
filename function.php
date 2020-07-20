<?php

function acak( $length ) {

    $str = "";

    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));

    $max = count($characters) - 1;

    for ($i = 0; $i < $length; $i++) {

        $rand = mt_rand(0, $max);

        $str .= $characters[$rand];

    }

    return $str;

}

function acak_angka( $length ) {

    $str = "";

    $characters = array_merge(range('0','9'));

    $max = count($characters) - 1;

    for ($i = 0; $i < $length; $i++) {

        $rand = mt_rand(0, $max);

        $str .= $characters[$rand];

    }

    return $str;

}
