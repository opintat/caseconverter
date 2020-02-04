<?php

declare(strict_types=1);

namespace Opintat\Converter\Splitter;

interface SplitterInterface
{
    /**
     * @return string[]
     */
    public function split(string $input): array;
}
