<?php

/**
 * Интерфейс логгера, сохраняющего отладочную информацию в файл
 *
 * @author    andrey-tech
 * @copyright 2021-2022 andrey-tech
 * @see https://github.com/andrey-tech/debug-logger-php
 * @license   MIT
 *
 * @version 1.0.2
 *
 * v1.0.0 (06.02.2021) Начальный релиз
 * v1.0.1 (03.06.2022) Исправлена сигнатура метода instance()
 * v1.0.2 (05.06.2022) Изменена сигнатура метода instance()
 *
 */

declare(strict_types=1);

namespace App\DebugLogger;

interface DebugLoggerInterface
{
    /**
     * Возвращает единственный объект класса логгера для заданного лог файла
     * @param string $logFileName Имя лог файла
     * @return DebugLoggerInterface
     */
    public static function instance(string $logFileName): DebugLoggerInterface;

    /**
     * Сохраняет отладочную информацию в файл
     * @param mixed $info Отладочная информация (строка, массив, объект)
     * @param ?object $object Объект класса в котором вызывается метод
     * @param ?string $header Заголовок отладочной информации
     * @return void
     */
    public function save($info, $object, string $header);
}
