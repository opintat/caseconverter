<?php

declare(strict_types=1);

namespace Opintat\Converter\Splitter;

class CamelSplitter implements SplitterInterface
{
    use SafeSplitTrait;

    /**
     * @return string[]
     */
    public function split(string $input): array
    {
        $parts = $this->safeSplit('/(?=[A-Z])/', $input);

        $result = [];

        foreach ($parts as $part) {
            $result[] = strtolower($part);
        }

        return $result;
    }
}
