<?php

declare(strict_types=1);

namespace Test;

use Opintat\Converter\Converter;
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
     * @dataProvider toSnakeCaseProvider
     */
    public function testToSnakeCase(string $from, string $expectedSnake): void
    {
        $snakeCase = $this->converter->setFromCamelCase($from)->toSnakeCase();

        $this->assertSame($expectedSnake, $snakeCase);
    }

    /**
     * @return string[][]
     */
    public function toSnakeCaseProvider(): array
    {
        return [
            ['test', 'test'],
            ['test', 'test'],
            ['testIt', 'test_it'],
            ['testItNow', 'test_it_now'],
            ['PDF', 'p_d_f'],
            ['OLIver', 'o_l_iver'],
        ];
    }

    /**
     * @dataProvider toPascalCaseProvider
     */
    public function testToPascal(string $from, string $expectedSnake): void
    {
        $snakeCase = $this->converter->setFromCamelCase($from)->toPascalCase();

        $this->assertSame($expectedSnake, $snakeCase);
    }

    /**
     * @return string[][]
     */
    public function toPascalCaseProvider(): array
    {
        return [
            ['test', 'Test'],
            ['Test', 'Test'],
            ['TestIt', 'TestIt'],
            ['TestItNow', 'TestItNow'],
            ['PDF', 'PDF'],
            ['OLIver', 'OLIver'],
        ];
    }
}
