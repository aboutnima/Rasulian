<?php

namespace Tests\Feature;

use App\Enum\InsuranceType;
use App\Enum\ConsumerContactPreference;
use App\Models\Consumer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class InsuranceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_displays_the_index_page()
    {
        $response = $this->get(route('insurance.index'));

        $response->assertStatus(200);
        $response->assertInertia(function ($page) {
            $page->component('Insurance')
                ->has('insuranceType')
                ->has('consumerContactPreference')
                ->has('states');
        });
    }

    #[Test]
    public function it_stores_a_new_insurance_request()
    {
        // Data
        $type = [
            InsuranceType::Home->value,
            InsuranceType::Auto->value
        ];
        $data = [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'contact_preference' => ConsumerContactPreference::Phone->value,
            'city' => 'Houston',
            'state' => '0',
            'zipcode' => '77001',
        ];

        // Create consumer and it`s insurances
        $response = $this->post(route('insurance.store'), [
            ...$data,
            'type' => $type,
        ]);
        $response->assertRedirect(route('insurance.index'));
        $response->assertSessionHas('success', 'Your insurance has been successfully submitted');

        // Check consumer
        $this->assertDatabaseHas('consumers', $data);

        // Check consumer`s insurances
        $consumer = Consumer::where('email', $data['email'])->first();
        foreach ($type as $value) {
            $this->assertDatabaseHas('insurances', [
                'consumer_id' => $consumer->id,
                'type' => $value,
            ]);
        }
    }
}
