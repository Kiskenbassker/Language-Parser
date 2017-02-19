<?php

function parse_accept_string($accept) {
    $lang_names = array();
    $accept_language = explode(", ", $accept);
    foreach($accept_language as $language) {
        if(stristr($language, ";")) {
            $lang_name = strstr($language, ";", true);
        } else {
            $lang_name = $language;
        }
    array_push($lang_names, $lang_name);
    }
    return($lang_names);
}

/**
 * @param $lang_names array returned by parse_accept_string() function
 * @return array of values after removing all the symbols after "-" symbol
 */
function parse_language_names($lang_names) {
    $lang_codes = array();
if(is_array($lang_names)) {
   foreach($lang_names as $lang_name) {
       if(stristr("-", $lang_name)) {
           $lang_code = strstr($lang_name, "-", true);
       } else {
           $lang_code = $lang_name;
       }
    array_push($lang_codes, $lang_code);
   }
}
    return $lang_codes;
}

/*$our_lang_names = parse_accept_string("fr-CH, fr;q=0.9, en;q=0.8, de;q=0.7");
$our_lang_codes = parse_language_names($our_lang_names);
var_dump($our_lang_names);*/

function parse_language($lang_codes) {
 
$lang_map = array(
    "en",
    "es",
    "de",
    "it",
    "fr",
    "pl",
    "ro",
    "kr",
    "jp",
    "cn",
    "gr",
    "ru",
    "bg",
    "br",
    "vn",
    "ee",
    "nl",
    "al",
    "se",
    "mn",
    "dk",
    "hu",
    "idn",
    "cz",
    "no",
    "tr",
    "in",
    "ge",
    "th"
);
    
    foreach($lang_codes as $lang_code) {
        if(in_array($lang_code, $lang_map)) {
            $lang = $lang_code;
            break;
        } else {
            $lang = "en";
        }
    }
    return($lang);
}

?>