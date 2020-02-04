<?php

declare(strict_types=1);

namespace Opintat\Converter\Generator;

final class PascalGenerator implements GeneratorInterface
{
    /**
     * @param string[] $from
     */
    public function generate(array $from): string
    {
        $pascal = '';

        $max = count($from);
        for ($i = 0; $i < $max; ++$i) {
            $pascal .= ucfirst($from[$i]);
        }

        return $pascal;
    }
}
