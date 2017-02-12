<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */
final class ParsingTest extends TestCase
{

    public function testSingleLang(): void
    {
        $this->assertEquals(
            'ru',
            parse_language('ru')
        );
    }
}

?>