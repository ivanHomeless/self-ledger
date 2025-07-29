<?php

namespace App\Enums;

enum MessageTemplate: string
{
    case Friendly = 'friendly';
    case Formal = 'formal';
    case Promo = 'promo';
}
