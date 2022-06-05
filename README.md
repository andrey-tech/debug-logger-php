# Debug Logger PHP

Простой логгер на PHP7+, сохраняющий отладочную информацию в файл вместе с данными об объеме используемой оперативной памяти и прошедшем времени.  

[![Latest Stable Version](https://poser.pugx.org/andrey-tech/debug-logger-php/v)](https://packagist.org/packages/andrey-tech/debug-logger-php)
[![Total Downloads](https://poser.pugx.org/andrey-tech/debug-logger-php/downloads)](https://packagist.org/packages/andrey-tech/debug-logger-php)
[![License](https://poser.pugx.org/andrey-tech/debug-logger-php/license)](https://packagist.org/packages/andrey-tech/debug-logger-php)


# Содержание

<!-- MarkdownTOC levels="1,2,3,4,5,6" autoanchor="true" autolink="true" -->

- [Требования](#%D0%A2%D1%80%D0%B5%D0%B1%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)
- [Установка](#%D0%A3%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0)
- [Класс `DebugLogger`](#%D0%9A%D0%BB%D0%B0%D1%81%D1%81-debuglogger)
    - [Методы класса](#%D0%9C%D0%B5%D1%82%D0%BE%D0%B4%D1%8B-%D0%BA%D0%BB%D0%B0%D1%81%D1%81%D0%B0)
    - [Дополнительные параметры](#%D0%94%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5-%D0%BF%D0%B0%D1%80%D0%B0%D0%BC%D0%B5%D1%82%D1%80%D1%8B)
    - [Примеры](#%D0%9F%D1%80%D0%B8%D0%BC%D0%B5%D1%80%D1%8B)
    - [Пример результатов логирования](#%D0%9F%D1%80%D0%B8%D0%BC%D0%B5%D1%80-%D1%80%D0%B5%D0%B7%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%82%D0%BE%D0%B2-%D0%BB%D0%BE%D0%B3%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)
        - [Формат логирования](#%D0%A4%D0%BE%D1%80%D0%BC%D0%B0%D1%82-%D0%BB%D0%BE%D0%B3%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)
- [Автор](#%D0%90%D0%B2%D1%82%D0%BE%D1%80)
- [Лицензия](#%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F)

<!-- /MarkdownTOC -->

<a id="%D0%A2%D1%80%D0%B5%D0%B1%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F"></a>
## Требования

- PHP >= 7.0;
- Произвольный автозагрузчик классов, реализующий стандарт [PSR-4](https://www.php-fig.org/psr/psr-4/).

<a id="%D0%A3%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0"></a>
## Установка

Установка через composer:
```
$ composer require andrey-tech/debug-logger-php:"^2.0"
```

или добавить

```
"andrey-tech/debug-logger-php": "^2.0"
```

в секцию require файла composer.json.

<a id="%D0%9A%D0%BB%D0%B0%D1%81%D1%81-debuglogger"></a>
## Класс `DebugLogger`

Класс `\App\DebugLogger\DebugLogger` обеспечивает логирование отладочной информации в файл.  
При возникновении ошибок выбрасывается исключение класса `\App\DebugLogger\DebugLoggerException`. 

<a id="%D0%9C%D0%B5%D1%82%D0%BE%D0%B4%D1%8B-%D0%BA%D0%BB%D0%B0%D1%81%D1%81%D0%B0"></a>
### Методы класса

- `static instance(string $logFileName = 'debug.log'): DebugLogger`  
    Возвращает единственный объект класса `DebugLogger` **для заданного лог-файла** `$logFileName`.
    + `$logFileName` - имя лог-файла.
- `save(mixed $info, object $object = null, string $header = null): void` Сохраняет подлежащую логированию информацию в файл.
    + `$info` - строка, массив или объект для логирования;
    + `$object` - ссылка на объект класса в котором выполняется логирование;
    + `$header` - строка заголовка для сохраняемой в лог файл информации.

<a id="%D0%94%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5-%D0%BF%D0%B0%D1%80%D0%B0%D0%BC%D0%B5%D1%82%D1%80%D1%8B"></a>
### Дополнительные параметры

Дополнительные параметры устанавливаются через публичные свойства класса `\App\DebugLogger\DebugLogger`:

| Нестатическое свойство | По умолчанию | Описание                                                                                                            |
|------------------------|--------------|---------------------------------------------------------------------------------------------------------------------|
| `$isActive`            | false        | Включает или выключает логирование для конкретного файла, задаваемого параметром `$logFileName` метода `instance()` |

| Статическое свойство | По умолчанию | Описание                                                                                                                                                                                 |
|----------------------|--------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `$logFileDir`        | `temp/`      | Устанавливает каталог, в котором сохраняются лог-файлы                                                                                                                                   |
| `mkdirMode`          | 0755         | Устанавливает режим доступа для создаваемых каталогов для хранения лог файлов в виде восьмеричного числа                                                                                 |
| `$uniqIdLength`      | 7            | Длина уникального буквенно-цифрового [a-z0-9]+ идентификатора объекта класса `DebugLogger` для сохранения в лог файле,  позволяющего находить записи, созданные одним и тем же процессом |

<a id="%D0%9F%D1%80%D0%B8%D0%BC%D0%B5%D1%80%D1%8B"></a>
### Примеры 

```php
use App\DebugLogger\DebugLogger;
use App\DebugLogger\DebugLoggerException;

try {
    // Устанавливаем каталог для сохранения лог-файлов
    DebugLogger::$logFileDir = 'logs/';

    $logFileName = 'debug_extensions.log';
    $logger = DebugLogger::instance($logFileName);

    // Включаем логирование
    $logger->isActive = true;

    // Сохраняем информацию о всех скомпилированных и загруженных модулях PHP
    $logger->save(get_loaded_extensions(), null, 'PHP modules');
    
    // Сохраняем версию движка Zend PHP
    $logger->save(zend_version(), null, 'Zend engine');

} catch (DebugLoggerException $e) {
    printf('Ошибка (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}
```

<a id="%D0%9F%D1%80%D0%B8%D0%BC%D0%B5%D1%80-%D1%80%D0%B5%D0%B7%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%82%D0%BE%D0%B2-%D0%BB%D0%BE%D0%B3%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F"></a>
### Пример результатов логирования

```
*** ytoqjz5 [2020-06-14 12:57:18.420258 +00:00 Δ- s, 0.69/2.00 MiB] ********************
PHP modules
[
    "Core",
    "bcmath",
    "calendar",
    "ctype"
]

*** ytoqjz5 [2020-06-14 12:57:18.421359 +00:00 Δ0.001101 s, 0.69/2.00 MiB] ********************
Zend engine
3.2.0
```

<a id="%D0%A4%D0%BE%D1%80%D0%BC%D0%B0%D1%82-%D0%BB%D0%BE%D0%B3%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F"></a>
#### Формат логирования

```
*** ytoqjz5 [2020-06-14 12:57:18,421359 +00:00 Δ0.001101 s, 0.69/2.00 MiB] ********************
Zend engine
3.2.0
```

- `ytoqjz5` - уникальный буквенно-цифровой [a-z0-9]+ идентификатор объекта класса `DebugLogger`, позволяющий находить в лог файле записи, созданные одним и тем же процессом;
- `2020-06-14 12:57:18.421359 +00:00` - дата и время сохранения информации с точностью до микросекунд;
- `Δ0.001101 s` - время, прошедшее с момента предыдущего сохранения информации в секундах и микросекундах;
- `0.69/2.00 MiB` - данные об используемой оперативной памяти в единицах количества информации с [двоичными приставками](https://ru.wikipedia.org/wiki/%D0%94%D0%B2%D0%BE%D0%B8%D1%87%D0%BD%D1%8B%D0%B5_%D0%BF%D1%80%D0%B8%D1%81%D1%82%D0%B0%D0%B2%D0%BA%D0%B8):
    + `0.69` - максимальный объем памяти, который был выделен PHP-скрипту системой;
    + `2.00` - реальный объем памяти, выделенный PHP-скрипту системой;
- 'Zend engine' - заголовок для сохраняемой информации, задаваемый параметром `$header` метода `save()`;
- '3.2.0' - сохраняемая информация, задаваемая параметром `$info` метода `save()`.
   
<a id="%D0%90%D0%B2%D1%82%D0%BE%D1%80"></a>
## Автор

© 2019-2022 andrey-tech

<a id="%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F"></a>
## Лицензия

Данная библиотека распространяется на условиях лицензии [MIT](./LICENSE).
