<?php

namespace App\Enum;

use App\Traits\EnumToArray;

enum InsuranceStatus: string
{
    use EnumToArray;

    case Pending = '0';
    case Checked = '1';
}
