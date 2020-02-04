<?php

declare(strict_types=1);

namespace Opintat\Converter\Generator;

interface GeneratorInterface
{
    /**
     * @param string[] $from
     */
    public function generate(array $from): string;
}
