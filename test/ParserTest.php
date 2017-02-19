<?php

use PHPUnit\Framework\TestCase;

final class ParsingTest extends TestCase
{
    
	public function testSingleLang(): void # перебор
	    {
	    $lang_map_cases = array( # массив запросов языков и ожидаемых ответов 
            array(
                "test_string" => "en-US,en;q=0.8", #строка с локалью и без
                "expected_sring" => "en",
                "error_message" => "Ошибка в обработке с языком en c локалью"
            ),    
            array(
                "test_string" => "en-US", #сообщение с локалью
                "expected_sring" => "en",
                "error_message" => "Ошибка в обработке с языком en"
            ),    
            array(
                "test_string" => "fr-CH, fr;q=0.9, en;q=0.8, de;q=0.7, *;q=0.5", #сообщение с локалью и без из нескольких языков которые поддерживаются на сайте
                "expected_sring" => "fr",
                "error_message" => "Ошибка в обработке с языком fr"
            ),    
            array(
                "test_string" => "da, en-gb;q=0.8, en;q=0.7", #сообщение с локалью - main language is not accessable (Danish)
                "expected_sring" => "da",
                "error_message" => "Ошибка в обработке с языком da"
            ),    
            array(
                "test_string" => "es,en;q=0.8", #сообщение с локалью
                "expected_sring" => "es",
                "error_message" => "Ошибка в обработке с языком es"
            ),    
            array(
                "test_string" => "de-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "de",
                "error_message" => "Ошибка в обработке с языком de"
            ),    
            array(
                "test_string" => "it-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "it",
                "error_message" => "Ошибка в обработке с языком it"
            ),    
            array(
                "test_string" => "pl-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "pl",
                "error_message" => "Ошибка в обработке с языком pl"
            ),    
            array(
                "test_string" => "ro-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "ro",
                "error_message" => "Ошибка в обработке с языком ro"
            ),    
            array(
                "test_string" => "kr-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "kr",
                "error_message" => "Ошибка в обработке с языком kr"
            ),    
            array(
                "test_string" => "jp-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "jp",
                "error_message" => "Ошибка в обработке с языком jp"

            ),    
            array(
                "test_string" => "gr-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "gr",
                "error_message" => "Ошибка в обработке с языком gr"
            ),    
            array(
                "test_string" => "ru-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "ru",
                "error_message" => "Ошибка в обработке с языком ru"
            ),    
            array(
                "test_string" => "bg-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "bg",
                "error_message" => "Ошибка в обработке с языком bg"
            ),    
            array(
                "test_string" => "br,en;q=0.8", #сообщение с локалью
                "expected_sring" => "br",
                "error_message" => "Ошибка в обработке с языком br"
            ),    
            array(
                "test_string" => "vn-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "vn",
                "error_message" => "Ошибка в обработке с языком vn"
            ),    
            array(
                "test_string" => "et-US,en;q=0.8", #сообщение с локалью эстоский яззык
                "expected_sring" => "et",
                "error_message" => "Ошибка в обработке с языком et"
            ),    
            array(
                "test_string" => "nl-US,en;q=0.8", #сообщение с локалью
                "expected_sring" => "nl",
                "error_message" => "Ошибка в обработке с языком nl"
            )        
        ); # end of array of test data

	        $i=0;
			while ($i<=count($lang_map_cases))
			{
                #foreach ($j as $key => $value) {
                            # code...
                        echo "\n______________________\n";

                        echo " ожидаемое Значение: ", $lang_map_cases[$i]["expected_sring"],"\n";
                        
                        echo "Тестовая строка: ", $lang_map_cases[$i]["test_string"],"\n"; 	

                        $expected = $lang_map_cases[$i]["expected_sring"]; # ожидаемый проверяемый элемент из массива языков на сайте
                        $our_lang_names = parse_accept_string($lang_map_cases[$i]["test_string"]);
                        $our_lang_codes = parse_language_names($our_lang_names);
                       	$actual = parse_language($our_lang_codes);
                            #$lang_map_cases[$i]["test_string"]); 

        		        $this->assertEquals($expected, $actual, $lang_map_cases[$i]["error_message"]); 
        		        $i++;
                #};                      
            };# конец цикла

	        
	    }
	    # цикл перебора элементов массива с кодом языков
	
	
/*
	public function testSingleLangRu(): void # russian
		    {
		    	
		    	$expected = 'ru';
		    	$actual = parse_language_names('ru-US');

		        $this->assertEquals($expected, $actual, "ошибка в обработке языка с указание локали");

		        $actual = parse_language_names('ru');
		        $this->assertEquals($expected, $actual,"ошибка в обработке языка без указания локали");
		    }
*/








    /*public function testSingleLangEn(): void # english
    {
        $this->assertEquals(
            'en',
            parse_language('en')
        );
    }
    public function testSingleLangRo(): void #romanian
    {
        $this->assertEquals(
            'ro',
            parse_language('ro')
        );
    }
    public function testSingleLangGr(): void # greece
    {
        $this->assertEquals(
            'gr',
            parse_language('gr')
        );
    }
    public function testSingleLangDe(): void #german 
    {
        $this->assertEquals(
            'de',
            parse_language('de')
        );
    }
    public function testSingleLangIdn(): void
    {
        $this->assertEquals(
            'idn',
            parse_language('idn')
        );
    }
    public function testSingleLangHu(): void # humgarian
    {
        $this->assertEquals(
            'hu',
            parse_language('hu')
        );
    }
    public function testSingleLangNo(): void #norway
    {
        $this->assertEquals(
            'no',
            parse_language('no')
        );
    }
    public function testSingleLangBr(): void #portugalian brazil
    {
        $this->assertEquals(
            'br',
            parse_language('br')
        );
    }
    public function testSingleLangSe(): void #Svenska
    {
        $this->assertEquals(
            'se',
            parse_language('se')
        );
    }
    public function testSingleLangTr(): void #Turkey
    {
        $this->assertEquals(
            'tr',
            parse_language('tr')
        );
    }
    public function testSingleLangBg(): void #bolgarian
    {
        $this->assertEquals(
            'bg',
            parse_language('bg')
        );
    }*/



}
?>