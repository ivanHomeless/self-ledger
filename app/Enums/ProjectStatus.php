<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case Draft      = 'draft';
    case InProgress = 'in_progress';
    case Done       = 'done';
    case OnHold     = 'on_hold';

    public function label(): string
    {
        return match ($this) {
            self::Draft      => 'Черновик',
            self::InProgress => 'В работе',
            self::Done       => 'Завершён',
            self::OnHold     => 'Пауза',
        };
    }
}
