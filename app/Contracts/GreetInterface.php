<?php

namespace App\Contracts;

interface GreetInterface
{
    /**
     * 挨拶をする関数.
     *
     * @return string 挨拶メッセージ.
     */
    public function greet(): string;
}
