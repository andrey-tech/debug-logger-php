<?php

/**
 * Обработчик исключений к классах пространства имен \App\DebugLogger
 *
 * @author    andrey-tech
 * @copyright 2019-2021 andrey-tech
 * @see https://github.com/andrey-tech/debug-logger-php
 * @license   MIT
 *
 * @version 2.0.0
 *
 * v1.0.0 (28.05.2019) Начальный релиз
 * v1.0.1 (26.06.2019) Изменения для пространства имен \App
 * v2.0.0 (06.02.2021) Изменение пространства имен на \App\DebugLogger
 *
 */

declare(strict_types=1);

namespace App\DebugLogger;

use Exception;

class DebugLoggerException extends Exception
{
    /**
     * Конструктор
     * @param string $message Сообщение об исключении
     * @param int $code Код исключения
     * @param Exception|null $previous Предыдущее исключение
     */
    public function __construct(string $message = '', $code = 0, Exception $previous = null)
    {
        parent::__construct('DebugLogger: ' . $message, $code, $previous);
    }
}
