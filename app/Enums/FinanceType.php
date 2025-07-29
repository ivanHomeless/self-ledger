<?php

namespace App\Enums;

enum FinanceType: string
{
    case Income = 'income';
    case Expense = 'expense';

    public function label(): string
    {
        return match ($this) {
            self::Income => 'Доход',
            self::Expense => 'Расход',
        };
    }
}
