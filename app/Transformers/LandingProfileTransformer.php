<?php

namespace App\Transformers;

class LandingProfileTransformer
{
    public function handle(array $fields): array
    {
        $result = [];

        foreach ($fields as $field) {
            $values = [
                'value' => $field['value'],
                'enabled' => $field['enabled'],
            ];
            $result[$field['slug']] = $values;
        }

        return $result;
    }
}
