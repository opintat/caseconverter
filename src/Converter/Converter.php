<?php

declare(strict_types=1);

namespace Opintat\Converter;

class Converter
{
    /**
     * @var string[]
     */
    private array $from;

    public function setFromCamelCase(string $from): Converter
    {
        $parts = preg_split('/(?=[A-Z])/', $from);

//        var_dump($parts);
        if (! $parts[0]) {
            array_shift($parts);
        }

        $result = [];

        foreach ($parts as $part) {
            $result[] = strtolower($part);
        }

        $this->from = $result;

        return $this;
    }

    public function toSnakeCase(): string
    {
        return join('_', $this->from);
    }

    public function toCamelCase(): string
    {
        $camel = $this->from[0];

        for ($i = 1; $i < count($this->from); ++$i) {
            $camel .= $this->from[$i];
        }

        return $camel;
    }

    public function toPascalCase(): string
    {
        $camel = '';

        for ($i = 0; $i < count($this->from); ++$i) {
            $camel .= ucfirst($this->from[$i]);
        }

        return $camel;
    }

    public function toKebapCase(): string
    {
        return '';
    }
}
