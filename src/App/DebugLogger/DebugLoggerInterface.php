<?php

/**
 * Интерфейс логгера, сохраняющего отладочную информацию в файл
 *
 * @author    andrey-tech
 * @copyright 2021 andrey-tech
 * @see https://github.com/andrey-tech/debug-logger-php
 * @license   MIT
 *
 * @version 2.0.0
 *
 * v1.0.0 (06.02.2021) Начальный релиз
 *
 */

declare(strict_types=1);

namespace App\DebugLogger;

interface DebugLoggerInterface
{
    /**
     * Возвращает единственный объект класса \App\DebugLogger\DebugLogger для заданного лог файла
     * @param string $logFileName Имя лог файла
     * @return DebugLogger
     */
    public static function instance(string $logFileName);

    /**
     * Сохраняет отладочную информацию в файл
     * @param mixed $info Отладочная информация (строка, массив, объект)
     * @param ?object $object Объект класса в котором вызывается метод
     * @param ?string $header Заголовок отладочной информации
     * @return void
     */
    public function save($info, $object, string $header);
}
