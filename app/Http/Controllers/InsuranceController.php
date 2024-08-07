<?php

namespace App\Http\Controllers;

use App\Enum\InsuranceType;
use App\Enum\UserContactPreference;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index()
    {
        return inertia('Insurance', [
            'insuranceType' => fn () => InsuranceType::fullCase(),
            'userContactPreference' => fn () => UserContactPreference::fullCase(),
            'states' => fn () => [
                ['name' => 'TX', 'value' => '0'],
                ['name' => 'LA', 'value' => '1'],
            ]
        ]);
    }
}
