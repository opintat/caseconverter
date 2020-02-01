<?php

declare(strict_types=1);

namespace Test;

use App\Converter;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    private Converter $converter;

    protected function setUp(): void
    {
        $this->converter = new Converter();
    }

    public function testCreateObject(): void
    {
        $this->assertInstanceOf(Converter::class, $this->converter);
    }

    /**
     * @dataProvider fromProvider
     *
     * @param mixed $from
     */
    public function testFrom($from): void
    {
        $this->converter->setFrom($from);

        $this->assertSame($from, $this->converter->getFrom());
    }

    /**
     * @return string[][]
     */
    public function fromProvider(): array
    {
        return [
            ['test'],
            ['Test'],
            ['Test'],
            ['TestIt'],
        ];
    }

    /**
     * @dataProvider toSnakeCaseProvider
     */
    public function testToSnakeCase(string $from, string $expectedSnake): void
    {
        $snakeCase = $this->converter->setFrom($from)->toSnakeCase();

        $this->assertSame($expectedSnake, $snakeCase);
    }

    /**
     * @return string[][]
     */
    public function toSnakeCaseProvider(): array
    {
        return [
            ['test', 'test'],
            ['Test', 'test'],
            ['TestIt', 'test_it'],
            ['TestItNow', 'test_it_now'],
            ['PDF', 'p_d_f'],
            ['OLIver', 'o_l_iver'],
        ];
    }
}
