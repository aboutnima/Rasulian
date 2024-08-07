<?php

namespace App\Enum;

use App\Traits\EnumToArray;

enum InsuranceType: string
{
    use EnumToArray;

    case Home = '0';
    case Auto = '1';
    case RecreationalVehicle = '2';
}
