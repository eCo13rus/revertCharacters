<?php

require_once __DIR__ . '/../revertCharacters.php';

use PHPUnit\Framework\TestCase;

class StringReverterTest extends TestCase
{
    public function testRevertCharacters()
    {
        $this->assertEquals('Тевирп!', revertCharacters('Привет!'));
        $this->assertEquals('Онвад ен ьсиледив.', revertCharacters('Давно не виделись.'));
        $this->assertEquals('Абвдг! Еёжз ийклмн.', revertCharacters('Гдвба! Зжёе нмлкйи.'));
    }

    public function testEmptyString()
    {
        $this->assertEquals('', revertCharacters(''));
    }

    public function testPunctuationAndSpaces()
    {
        $this->assertEquals('Привет, мир!', revertCharacters('Тевирп, рим!'));
        $this->assertEquals('О, ты ж, как!', revertCharacters('О, ыт ж, как!'));
    }
}
