<?php

namespace Core;

class WebHandler
{
    public function __construct(
        private readonly Calculate $calculate, //Добавляй сюда какие хочешь зависимости. Не забудь передать их в index.php
    )
    {
    }

    public function __invoke(): void //можешь почитать про метод __invoke
    {
        //тут обрабатывай логику для хттп запроса

        var_dump('hello from web');
    }
}
