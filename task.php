<?php

//1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа,
// третий – операция. Обязательно использовать оператор return.

function arithmeticOperations(int $arg1, int $arg2, string $operation): float
{
    if($operation == 'Sum') {
        return $arg1 + $arg2;
    }
    if($operation == 'Subtract') {
        return $arg1 - $arg2;
    }
    if($operation == 'Multiply') {
        return $arg1 * $arg2;
    }
    if($operation == 'Divide') {
        return $arg1 / $arg2;
    }
    else {
        return 0;
    }
};

//2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1,
//$arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения
//операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное
//значение (использовать switch).

function mathOperation($arg1, $arg2, $operation)
{
   switch ($operation) {
        case 'Sum': echo arithmeticOperations($arg1, $arg2, 'Sum'); break;
        case 'Subtract': echo arithmeticOperations($arg1, $arg2, 'Subtract'); break;
        case 'Multiply': echo arithmeticOperations($arg1, $arg2, 'Multiply'); break;
        case 'Divide': echo arithmeticOperations($arg1, $arg2, 'Divide'); break;
        default: echo "Unknown operation";
   }
};
mathOperation(2, 5, 'Multiply');