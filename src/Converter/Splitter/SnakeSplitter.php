<?php

declare(strict_types=1);

namespace Opintat\Converter\Splitter;

class SnakeSplitter implements SplitterInterface
{
    /**
     * @return string[]
     */
    public function split(string $input): array
    {
        return explode('_', strtolower($input));
    }
}
