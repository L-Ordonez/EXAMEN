<?php

$xml = new SimpleXMLElement('<employees/>');

foreach ($employees as $i => $employee) {
    $xmlemp = $xml->addChild('employee' . $i);
    foreach ($employee as $j => $data) {
        if (is_array($data)) {
            $xmldata = $xmlemp->addChild($j);
            foreach ($data as $k => $skill) {
                $xmldata->addChild('skill', $skill->skill);
            }
        } else {
            $xmldata = $xmlemp->addChild($j, $data);
        }
    }
}

Header('Content-type: text/xml');
print($xml->asXML());
