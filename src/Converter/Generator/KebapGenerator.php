<?php

declare(strict_types=1);

namespace Opintat\Converter\Generator;

final class KebapGenerator implements GeneratorInterface
{
    /**
     * @param string[] $from
     */
    public function generate(array $from): string
    {
        return join('-', $from);
    }
}
