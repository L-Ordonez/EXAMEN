<?php

class CompleteRange {

    function build() {
        $output = array();
        for ($i = func_get_arg(0); $i <= func_get_arg(func_num_args() - 1); $i++) {
            $output[] += $i;
        }
        return implode(', ', $output);
    }

}

$CompleteRange = new CompleteRange;

echo $CompleteRange->build(1, 2, 4, 5);
echo '<br>';
echo $CompleteRange->build(2, 4, 9);
echo '<br>';
echo $CompleteRange->build(55, 58, 60);
