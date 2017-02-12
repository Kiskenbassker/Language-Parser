<?php


$lang_map = array(
    "en" => "English",
    "es" => "Español",
    "de" => "Deutsch",
    "it" => "Italiano",
    "fr" => "Français",
    "pl" => "Polski",
    "ro" => "Română",
    "kr" => "한국어",
    "jp" => "日本語",
    "cn" => "中國人",
    "gr" => "Ελληνικά",
    "ru" => "Русский",
    "bg" => "Български",
    "br" => "Português (BR)",
    "vn" => "Tiếng Việt",
    "ee" => "Еesti",
    "nl" => "Nederlands",
    "al" => "Shqiptar",
    "se" => "Svenska",
    "mn" => "Монгол",
    "dk" => "Dansk",
    "hu" => "Magyar",
    "idn" => "Indonesia",
    "cz" => "eština",
    "no" => "orsk",
    "tr" => "ürk",
    "in" => "हिन्दी",
    "ge" => "ართული",
    "th" => "าษาไทย"
);


 /*function parse_language(){
     $accept = "ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4";
     $accept_language = explode(",", $accept);
     var_dump($accept_language);
     $accept_language1 = $accept_language[0];
     
 }*/

function parse_language_name($lang_name) {
    
    if(stristr($lang_name, "-")) {
        $lang_arr = explode("-", $lang_name);
        $lang_code = $lang_arr[0];
    } else {
        $lang_code = $lang_name;
    }   
    echo $lang_code;
}

parse_language_name("en-US");

?>