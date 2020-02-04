<?php

declare(strict_types=1);

namespace Opintat\Converter\Generator;

class CamelGenerator implements GeneratorInterface
{
    /**
     * @param string[] $from
     */
    public function generate(array $from): string
    {
        $camel = $from[0];

        $max = count($from);
        for ($i = 1; $i < $max; ++$i) {
            $camel .= ucfirst($from[$i]);
        }

        return $camel;
    }
}
