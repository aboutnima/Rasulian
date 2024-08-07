<?php

namespace App\Http\Controllers;

use App\Enum\InsuranceType;
use App\Enum\UserContactPreference;
use App\Http\Requests\Insurance\StoreRequest;
use App\Models\User;

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

    public function store(StoreRequest $request)
    {
        $user = User::firstOrCreate([
            'email' => $request->validated('email')
        ], [
            'firstname' => $request->validated('firstname'),
            'lastname' => $request->validated('lastname'),
            'phone' => $request->validated('phone'),
            'contact_preference' => $request->validated('contact_preference'),
            'city' => $request->validated('city'),
            'state' => $request->validated('state'),
            'zipcode' => $request->validated('zipcode'),
        ]);

        foreach ($request->validated('type') as $type) {
            $user->insurance()->create([
                'type' => $type
            ]);
        }

        return to_route('insurance.index')->with('success', 'Your insurance has been successfully submitted');
    }
}
