<?php

declare(strict_types=1);

namespace Opintat\Converter\Splitter;

class SplitterFactory
{
    public function create(string $type): SplitterInterface
    {
        switch ($type) {
            case 'snake':
                return new SnakeSplitter();
            case 'kebap':
                return new KebapSplitter();
            case 'pascal':
                return new PascalSplitter();
            case 'camel':
            default:
                return new CamelSplitter();
        }
    }
}
