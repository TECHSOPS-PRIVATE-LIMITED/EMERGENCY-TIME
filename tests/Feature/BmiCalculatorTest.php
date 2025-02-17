<?php

namespace Tests\Feature;

use Tests\TestCase;

class BmiCalculatorTest extends TestCase
{
    public function test_bmi_page_loads()
    {
        $response = $this->get('/bmi-calculator');
        $response->assertStatus(200);
    }

    public function test_can_calculate_bmi_metric()
    {
        $response = $this->post('/bmi-calculator', [
            'weight' => 70,
            'height' => 175,
            'unit' => 'metric'
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('bmi', 22.86);
        $response->assertViewHas('category', 'Normal weight');
    }

    public function test_can_calculate_bmi_imperial()
    {
        $response = $this->post('/bmi-calculator', [
            'weight' => 154,
            'height' => 69,
            'unit' => 'imperial'
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('bmi', 22.74);
        $response->assertViewHas('category', 'Normal weight');
    }

    public function test_validation_rejects_invalid_inputs()
    {
        $response = $this->post('/bmi-calculator', [
            'weight' => 'not-a-number',
            'height' => -1,
            'unit' => 'invalid-unit'
        ]);

        $response->assertStatus(302);
        $response->assertInvalid(['weight', 'height', 'unit']);
    }
}
