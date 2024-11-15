<?php

namespace App\Services;

class AttributeService
{
    public function transformAttributes(array $attributes):array
    {
        $array = [];
        foreach ($attributes as $item) {
            if (isset($item['key']) && isset($item['value'])) {
                $array[$item['key']] = $item['value'];
            }
        }
        return $array;
    }

}
