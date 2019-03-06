<?php

function expressionMatcher(string $expression): bool
{
    $valid = true;
    $stack = new SplStack();

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = substr($expression, $i, 1);

        switch ($char) {
            case '(':
            case '{':
            case '[':
                $stack->push($char);
                break;
            case ')':
            case '}':
            case ']':
                if ($stack->isEmpty()) {
                    $valid = false;
                } else {
                    $last = $stack->pop();
                    if (($char == ")" && $last != "(") || ($char == "}" && $last != "{") || ($char == "]" && $last != "["))  {
                        $valid = false;
                    }
                }
                break;
        }

        if (!$valid) {
            break;
        }

        if (!$stack->isEmpty()) {
            $valid = false;
        }

        return $valid;
    }
}

$expressions = [];
$expressions[] = "8 * (9 - 2) + { (4 * 5) / (2 * 2) }";
$expressions[] = "5 * 8 * 9 / (3 * 2) )";
$expressions[] = "[{ (2 * 7) + (15 - 3) ]";

foreach ($expressions as $expression) {
    $valid = expressionMatcher($expression);

    if ($valid)
        echo "Expression is Valid", PHP_EOL;
    else
        echo "Expression is not Valid", PHP_EOL;

}