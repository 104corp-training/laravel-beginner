<?php

namespace Tests\Feature;
use App\Hunter;
use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Exception\APIException;



class HunterTest extends TestCase
{
    use DatabaseTransactions;
    public function setUp(): void
    {
        # code...
        Carbon::setTestNow('2021-03-23 14:00:00');
        parent::setUp();
    }

    public function testShowSuccess()
    {
        Hunter::create([
            'id' => '998',
            'course_id' => 'test',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);
        $response = $this->json('get', '/api/hunter/998');
        $response->assertStatus(200)
            ->assertExactJson([
                    'course_id' => 'test',
                    'name' => '測試課程',
                    'description' => 'test',
                    'outline' => 'test',
                    'id' => 998,
                    "created_at" => "2021-03-23 14:00:00",
                    "updated_at" => "2021-03-23 14:00:00"
            ]);
    }

    public function testShowFailed()
    {
        # code...
        $response = $this->get('/api/hunter/998');
        $response->assertStatus(500)
            ->assertExactJson([
                "message" => "Cannot find this course",
            ]);
    }

    public function testCreateSuccess()
    {
        # code...
        $formData = [
            'name' => 'sally',
            'course_id' => 'sally',
            'description' => 'test',
            'outline' => 'outline',
            'updated_at' => "2021-03-23 14:00:00",
            'created_at' => "2021-03-23 14:00:00",
            'id' => 1010
        ];
        $response = $this->json(
            'POST',
            '/api/hunter',
            $formData
        );

        $response->assertStatus(200)
            ->assertExactJson(['success' => $formData]);
    }

    public function testCreateFailed()
    {
        # code...
        $formData = [
            'course_id' => 'test',
            'description' => 'test',
            'outline' => 'outline',
            'updated_at' => "2021-03-23 14:00:00",
            'created_at' => "2021-03-23 14:00:00",
            'id' => 1010
        ];
        $response = $this->json(
            'POST',
            '/api/hunter',
            $formData
        );
        $response->assertStatus(500)
            ->assertExactJson([
                "message"=>"Validation error"
            ]); 
    }

    public function testUpdateSuccess()
    {
        # code...
        Hunter::create([
            'id' => '998',
            'course_id' => 'test',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);
        $response = $this->put(
            '/api/hunter/998',
            ['name' => 'test111'],
        );
        $response->assertStatus(200)
            ->assertExactJson([
                'success' => true
            ]);

    }

    public function testUpdateFailed()
    {
        # code...
        $response = $this->put(
            'api/hunter/202020',
            ['name' => 'sss'],
        );
        $response->assertStatus(500)
            ->assertExactJson([
                'message' => "Cannot find this course",
            ]);
    }

    public function testDeleteSuccess()
    {
        # code...
        $response = $this->json(
            'delete',
            'api/hunter/3',
        );
        $response->assertStatus(200)
            ->assertExactJson([
                "success" => true
            ]);
    }

    public function testDeleteFailed()
    {
        # code...
        $response = $this->json(
            'delete',
            'api/hunter/20202',
        );
        $response->assertStatus(500)
            ->assertExactJson([
                'message' => 'Cannot find this course'
            ]);
    }
}
