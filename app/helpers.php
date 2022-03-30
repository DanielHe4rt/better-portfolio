<?php

if (!function_exists('portfolio_info')) {
    function portfolio_info(string $key): array
    {
        $field =  collect(config('portfolio.base-information'))
            ->first(fn ($item) => $item['name'] == $key);

        if (is_null($field)) {
            throw new Exception('Field not found.');
        }

        return $field;
    }
}
