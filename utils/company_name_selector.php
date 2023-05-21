<?php

function generateCompanyNameSelector($id=null, $initialValue=null, $initialId=null){
    $html = file_get_contents("./utils/company_name_selector_generator.html");
    if (!$id) $id = uniqid();
    $out = str_replace('__ID__', $id, $html);
    $out = str_replace('__INITIAL_VALUE__', $initialValue, $out);
    $out = str_replace('__INITIAL_ID__', $initialId, $out);
    return $out;
}


