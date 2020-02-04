<?php

declare(strict_types=1);

namespace Opintat\Converter\Splitter;

class PascalSplitter implements SplitterInterface
{
    use SafeSplitTrait;

    /**
     * @return string[]
     */
    public function split(string $input): array
    {
        $parts = $this->safeSplit('/(?=[A-Z])/', $input);

        if (! $parts[0]) {
            array_shift($parts);
        }

        $result = [];

        foreach ($parts as $part) {
            $result[] = strtolower($part);
        }

        return $result;
    }
}
