<?php

declare(strict_types=1);

namespace Opintat\Converter\Splitter;

trait SafeSplitTrait
{
    /**
     * @return string[]
     */
    private function safeSplit(string $regex, string $input): array
    {
        $parts = preg_split($regex, $input);

        if (is_array($parts)) {
            return $parts;
        }

        return [];
    }
}
