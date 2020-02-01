<?php

declare(strict_types=1);

namespace App;

class Converter
{
    private string $from;

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): Converter
    {
        $this->from = $from;

        return $this;
    }

    public function toSnakeCase(): string
    {
        // split on uppercase
        $parts = preg_split('/(?=[A-Z])/', lcfirst($this->from));

        // join with underscore
        return strtolower(
            join('_', $parts)
        );
    }
}
