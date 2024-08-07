<?php

namespace App\Enum;

use App\Traits\EnumToArray;

enum ConsumerContactPreference: string
{
    use EnumToArray;

    case Email = '0';
    case Phone = '1';
}
