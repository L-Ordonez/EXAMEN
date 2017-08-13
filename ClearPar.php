<?php

class ClearPar {

    private $par = ['(', ')'];

    function build($string) {
        $chars = str_split($string);
        $output = '';
        $temp = '';
        $i = 0;
        foreach ($chars as $char) {
            if ($char == $this->par[$i]) {
                $temp .= $char;
                $i++;
                if ($i == 2) {
                    $output .= $temp;
                    $temp = '';
                    $i = 0;
                }
            }
        }
        return $output;
    }

}

$ClearPar = new ClearPar;

echo $ClearPar->build('()())()');
echo '<br>';
echo $ClearPar->build('()(()');
echo '<br>';
echo $ClearPar->build(')(');
echo '<br>';
echo $ClearPar->build('((()');
