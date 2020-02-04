<?php

declare(strict_types=1);

namespace Opintat\Converter\Splitter;

class KebapSplitter implements SplitterInterface
{
    /**
     * @return string[]
     */
    public function split(string $input): array
    {
        return explode('-', strtolower($input));
    }
}
