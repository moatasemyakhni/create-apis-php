<?php
    function is_palindrome($string) {
        $string = str_replace(' ', '', $string);
        $reverse = strrev($string);
        if($string == $reverse) {
            $palindrome = true;
        }else {
            $palindrome = false;
        }
        $pal = [
            'stringName' => $string,
            'palindrome' => $palindrome,
        ];
        return json_encode($pal);
    }
    echo is_palindrome($_GET['string']);
?>