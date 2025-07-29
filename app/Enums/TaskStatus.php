<?php

namespace App\Enums;

enum TaskStatus: string
{
    case Todo = 'todo';
    case Doing = 'doing';
    case Done = 'done';

    public function label(): string
    {
        return match ($this) {
            self::Todo => 'В очереди',
            self::Doing => 'В процессе',
            self::Done => 'Готово',
        };
    }
}
