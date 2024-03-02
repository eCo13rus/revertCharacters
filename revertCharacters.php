<?php

function revertCharacters(string $text): string
{
    // Используем регулярное выражение для поиска слов, учитывая Unicode
    return preg_replace_callback('/\b\p{L}+\b/u', function ($matches) {
        $word = $matches[0];
        $reverted = '';

        // Переворачиваем слово, сохраняя регистр каждой буквы
        for ($i = 0; $i < mb_strlen($word); $i++) {
            $char = mb_substr($word, $i, 1);
            $revertedChar = mb_substr($word, mb_strlen($word) - $i - 1, 1);

            // Сохраняем регистр исходного символа
            $reverted .= mb_strtolower($char) === $char ? mb_strtolower($revertedChar) : mb_strtoupper($revertedChar);
        }

        return $reverted;
    }, $text);
}


$text = "Гдвба! Зжёе нмлкйи.\n";

print_r(revertCharacters($text));



