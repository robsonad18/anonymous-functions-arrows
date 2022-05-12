<?php

require __DIR__ . "/main.php";


echo "<h1>Funções anonimas e arrow functions</h1>";

echo "<hr><h2>Exemplo 1</h2>";

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$numberReference = 9;
$filter = function (int $item) use ($numberReference) {
    return $item > $numberReference;
};

$numbers = array_filter($numbers, $filter);

echo '<pre>';
print_r($numbers);
echo '</pre>';

echo "<hr><h2>Exemplo 2</h2>";

$format = function (string $text) {
    return mb_strtolower("__" . $text . "__");
};

echo '<pre>';
print_r($format("Robson"));
echo '</pre>';

echo '<pre>';
print_r($format("Lucas"));
echo '</pre>';

echo '<pre>';
print_r($format("Farias"));
echo '</pre>';

echo "<hr><h2>Exemplo 3</h2>";

$functions = [
    "up" => function (string $text) {
        return mb_strtoupper($text);
    },
    "down" => function (string $text) {
        return mb_strtolower($text);
    },
    "hide" => function (string $text) {
        return str_pad("", strlen($text), "*");
    }
];

echo '<pre>';
print_r($functions["up"]("robson"));
echo '</pre>';

echo '<pre>';
print_r($functions["down"]("ROBSON"));
echo '</pre>';

echo '<pre>';
print_r($functions["hide"]("robson"));
echo '</pre>';

echo "<hr><h2>Exemplo 4</h2>";

function getFunction($type)
{
    switch ($type) {
        case "up":
            return function (string $text) {
                return mb_strtoupper($text);
            };
        case "down":
            return function (string $text) {
                return mb_strtolower($text);
            };
        case "hide":
            return function (string $text) {
                return str_pad("", strlen($text), "*");
            };
    }
}

echo '<pre>';
print_r(getFunction("up")("robson"));
echo '</pre>';

echo '<pre>';
print_r(getFunction("down")("ROBSON"));
echo '</pre>';

echo '<pre>';
print_r(getFunction("hide")("robson"));
echo '</pre>';

echo "<hr><h2>Exemplo 5</h2>";

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$numbers = array_filter($numbers, fn (int $item) => $item > 5);

echo '<pre>';
print_r($numbers);
echo '</pre>';

echo "<hr><h2>Exemplo 6</h2>";

$arrowFunctions = [
    "numbers" => fn (string $text) => preg_replace("/\D/", "", $text)
];

echo '<pre>';
print_r($arrowFunctions["numbers"]("Robson2020"));
echo '</pre>';

echo "<hr><h2>Exemplo 7</h2>";

function getArrowFunction(string $type)
{
    switch ($type) {
        case "numbers":
            return fn (string $text) => preg_replace("/\D/", "", $text);
    }
}

echo '<pre>';
print_r(getArrowFunction("numbers")("lucas2066"));
echo '</pre>';
