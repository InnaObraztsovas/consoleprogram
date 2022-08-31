<?php

namespace Core;

class CliHandler
{
    public function __construct(
        private readonly Calculate $calculate, //Добавляй сюда какие хочешь зависимости. Не забудь передать их в index.php
    )
    {
    }

    public function __invoke(): void
    {
        //тут обрабатывай логику для консоли

        //$this->calculate->calculateFullAmount(); Можешь это раскоментировать и добавить другие классы прямо в конструктор этого класса
        var_dump('hello from cli');
    }
}
