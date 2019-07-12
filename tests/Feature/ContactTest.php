<?php

namespace Tests\Feature;

use Illuminate\Http\Testing\File;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function it_upload_and_map_fields()
    {
        $temp = tmpfile();
        $rowsSize = $this->faker->numberBetween(5,10);
        $colsSize = $this->faker->numberBetween(5,10);
        for ($r = 0; $r < $rowsSize; $r++) {
            $fields = [
                $this->faker->numberBetween(0, 100),
                $this->faker->phoneNumber,
            ];
            for ($c = 2; $c < $colsSize; $c++) {
                $fields[$c] = $this->faker->word;
            }
            fputcsv($temp, $fields);
        }
        fseek($temp, 0);
        $file = new File('test.csv', $temp);

        $this->post('/files', compact('file'))
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success'
            ]);

        $fields = array_fill(0, $colsSize, '');
        $fields[0] = 'team_id';
        $fields[1] = 'phone';

        $this->post('/contacts', compact('fields'))
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success'
            ]);
    }
}
