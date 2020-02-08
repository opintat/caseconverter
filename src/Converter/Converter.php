<?php

declare(strict_types=1);

namespace Opintat\Converter;

use Opintat\Converter\Generator\GeneratorFactory;
use Opintat\Converter\Splitter\SplitterFactory;

/**
 * @method toPascalCase() string
 * @method toCamelCase()  string
 * @method toKebapCase()  string
 * @method toSnakeCase()  string
 */
final class Converter
{


    /**
     * @var string[]
     */
    private array $from = [];

    private GeneratorFactory $generatorFactory;

    private SplitterFactory $splitterFactory;

    private Detector $detector;

    /**
     * @var string[]
     */
    protected array $allowedMethods = [
        'toPascalCase' => 'pascal',
        'toCamelCase'  => 'camel',
        'toKebapCase'  => 'kebap',
        'toSnakeCase'  => 'snake',
    ];

    public function __construct(
        ?GeneratorFactory $generatorFactory = null,
        ?SplitterFactory $splitterFactory = null,
        ?Detector $detector = null
    ) {
        $this->generatorFactory = $generatorFactory ?? new GeneratorFactory();
        $this->splitterFactory = $splitterFactory ?? new SplitterFactory();
        $this->detector = $detector ?? new Detector();
    }

    public function setFrom(string $from): Converter
    {
        $this->from = (new SplitterFactory())
            ->create($this->detector->detect($from))
            ->split($from);

        return $this;
    }

    /**
     * @param mixed[] $arguments
     */
    public function __call(string $name, array $arguments): string
    {
        if (! in_array($name, array_keys($this->allowedMethods))) {
            throw new \Exception(sprintf('Method %s not allowed!', $name));
        }

        return $this->generatorFactory
            ->create($this->allowedMethods[$name])
            ->generate($this->from);
    }
}
