<?php

class ChangeString {

    private $abcl = 'abcdefghijklmnñopqrstuvwxyz';

    private function find($str, $char) {
        $i = strpos($str, $char);
        if ($i !== false) {
            $i = ($i + 1) % strlen($str);
            return $str[$i];
        } else {
            return false;
        }
    }

    function build($string) {
        $chars = str_split($string);
        $output = '';
        foreach ($chars as $char) {
            $valL = $this->find($this->abcl, $char);
            if ($valL) {
                $output .= $valL;
                continue;
            }
            $valU = $this->find(strtoupper($this->abcl), strtoupper($char));
            if ($valU) {
                $output .= $valU;
            } else {
                $output .= $char;
            }
        }
        return $output;
    }

}

$ChangeString = new ChangeString;

echo $ChangeString->build('123 abcd*3').'<br>';
echo $ChangeString->build('**Casa 52').'<br>';
echo $ChangeString->build('**Casa 52Z');
