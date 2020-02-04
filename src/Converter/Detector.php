<?php

declare(strict_types=1);

namespace Opintat\Converter;

final class Detector
{
    public const CAMEL_CASE = 'camle';

    public const SNAKE_CASE = 'snake';

    public const PASCAL_CASE = 'pascal';

    public const KEBAP_CASE = 'kebap';

    public function detect(string $input): string
    {
        $withDelimiter = [
            '-' => self::KEBAP_CASE,
            '_' => self::SNAKE_CASE,
        ];

        foreach ($withDelimiter as $char => $type) {
            if (false !== strpos($input, $char)) {
                return $type;
            }
        }

        if (ctype_upper($input[0])) {
            return self::PASCAL_CASE;
        }

        return self::CAMEL_CASE;
    }
}
