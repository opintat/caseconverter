<?php

declare(strict_types=1);

namespace Opintat\Converter\Generator;

class GeneratorFactory
{
    public function create(string $type): GeneratorInterface
    {
        switch ($type) {
            case 'snake':
                return new SnakeGenerator();
            case 'kebap':
                return new KebapGenerator();
            case 'pascal':
                return new PascalGenerator();
            case 'camel':
            default:
                return new CamelGenerator();
        }
    }
}
