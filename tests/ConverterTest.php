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
        $snakeCase = $this->converter->setFrom($from)->toPascalCase();

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

    /**
     * @dataProvider toKebapCaseProvider
     */
    public function testToKebapCase(string $from, string $expectedKebap): void
    {
        $snakeCase = $this->converter->setFrom($from)->toKebapCase();

        $this->assertSame($expectedKebap, $snakeCase);
    }

    /**
     * @return string[][]
     */
    public function toKebapCaseProvider(): array
    {
        return [
            ['test', 'test'],
            ['testIt', 'test-it'],
            ['testItNow', 'test-it-now'],
            ['pId', 'p-id'],
            ['oLiver', 'o-liver'],
        ];
    }

    /**
     * @dataProvider toCamelCaseProvider
     */
    public function testToCamelCase(string $from, string $expectedKebap): void
    {
        $snakeCase = $this->converter->setFrom($from)->toCamelCase();

        $this->assertSame($expectedKebap, $snakeCase);
    }

    /**
     * @return string[][]
     */
    public function toCamelCaseProvider(): array
    {
        return [
            ['test', 'test'],
            ['testIt', 'testIt'],
            ['testItNow', 'testItNow'],
            ['pId', 'pId'],
            ['oLiver', 'oLiver'],
        ];
    }

    /**
     * @dataProvider fromProvider
     */
    public function testFrom(string $input, string $expectedResult): void
    {
        $result = $this->converter->setFrom($input)->toSnakeCase();

        $this->assertSame($expectedResult, $result);
    }

    public function testSnakeCaseFrom(): void
    {
        $result = $this->converter->setFrom('snake_case')->toPascalCase();

        $this->assertSame('SnakeCase', $result);
    }

    /**
     * @return string[][]
     */
    public function fromProvider(): array
    {
        return [
            ['camelCase', 'camel_case'],
            ['PascalCase', 'pascal_case'],
            ['snake_case', 'snake_case'],
            ['kebap-case', 'kebap_case'],
        ];
    }

    public function testNotAllowedMethod(): void
    {
        $this->expectException(\Exception::class);

        $name = 'toWrongCase';
        $this->converter->setFrom('abc')->$name();
    }
}
