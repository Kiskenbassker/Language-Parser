<?php
class languageParser
{
/**
 * Exploding the Accept-Language string by comma
 * @param string $accept is an Accept-Language header value, i.e. fr-CH, fr;q=0.9, en;q=0.8, de;q=0.7, *;q=0.5
 * @return array
 */
    private function parse_accept_string($accept)
    {
        $lang_names = array();
        $accept_language = explode(", ", $accept);
        foreach ($accept_language as $language) {
            if (stristr($language, ";")) {
                $lang_name = strstr($language, ";", true);
            } else {
                $lang_name = $language;
            }
            array_push($lang_names, $lang_name);
        }
        return ($lang_names);
    }

    /**
     * Removing all the symbols after "-" in array, returned parse_accept_string() function
     * @param $lang_names array
     * @return array
     */
    private function parse_language_names($lang_names)
    {
        $lang_codes = array();
        if (is_array($lang_names)) {
            foreach ($lang_names as $lang_name) {
                if (stristr("-", $lang_name)) {
                    $lang_code = strstr($lang_name, "-", true);
                } else {
                    $lang_code = $lang_name;
                }
                array_push($lang_codes, $lang_code);
            }
        }
        return $lang_codes;
    }
    /**
     * Comparing values in array returned by parse_language_names() function with our language array and returning language code.
     * @param string $accept is an Accept-Language header value, i.e. fr-CH, fr;q=0.9, en;q=0.8, de;q=0.7, *;q=0.5
     * @return string
     */

    public function parse_language($accept)
    {
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

        $lang_names = $this->parse_accept_string($accept);
        $lang_codes = $this->parse_language_names($lang_names);

        foreach ($lang_codes as $lang_code) {
            if (in_array($lang_code, $lang_map)) {
                $lang = $lang_code;
                break;
            } else {
                $lang = "en";
            }
        }
        echo $lang;
        return ($lang);
    }
}
?>