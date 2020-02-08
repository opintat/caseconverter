# CaseConverter

CaseConverter is a PHP Modul to convert
- Snake case
- Kebap case
- Pascal case
- Camel case

from one to the other.

## Installation
`composer require opintat/caseconverter`

## Usage

First require vendor autoload.
```javascript
// Load Composer's autoloader  
require 'vendor/autoload.php';
```

Automatic input type detection.

```
$converter = new Converter();

$snake = $converter->setFrom('SnakeCase')->toSnakeCase();
echo $snake; // => snake_case

$camel = $converter->setFrom('camel-case')->toCamelCase();
echo $camel; // => camelCase

$kebap = $converter->setFrom('kebapCase')->toKebapCase();
echo $kebap; // => kebap-case

$pascal = $converter->setFrom('pascal_case')->to'PascalCase();
echo $pascal; // => PascalCase
```
