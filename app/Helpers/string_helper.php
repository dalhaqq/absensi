<?php

function str_studly(string $value): string
{
    return implode('', explode(' ', ucwords(str_replace(['-', '_'], ' ', $value))));
}

function str_snake(string $value, string $delimiter = '_'): string
{
    return implode($delimiter, array_map('strtolower', preg_split('/(?=[A-Z])/', $value)));
}