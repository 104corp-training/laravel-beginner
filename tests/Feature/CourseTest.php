<?php

namespace Tests\Feature;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
    // use DatabaseMigrations;
    /**
     * @throws BindingResolutionException
     */
    public function setUp(): void
    {
        Carbon::setTestNow('2021-03-23 14:00:00');
        parent::setUp();
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSuccess()
    {
        // $response = $this->postJson('/user', ['name' => 'Sally']);
        // $this->json('POST', '/user', ['name' => 'Sally']);

        Course::create([
            'id' => '999',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);
        $response = $this->get('/api/courses/999');

        $response->assertStatus(200)
            ->assertExactJson([
                "data" => [
                    'name' => '測試課程',
                    'description' => 'test',
                    'outline' => 'test',
                    'students' => [],
                ],
                "metadata" => Carbon::now(),
            ]);
    }

    public function testFailed()
    {
        $response = $this->get('/api/courses/999');

        $response->assertStatus(404)
            ->assertExactJson([
                "message" => "找不到對應課程",
            ]);
    }

    /**
     * Test create is success
     */
    public function testCreateSuccess()
    {
        Course::create([
            'id' => '999',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);
        $response = $this->get('/api/courses/999');

        $response->assertStatus(200)
            ->assertExactJson([
                "data" => [
                        'name' => '測試課程',
                        'description' => 'test',
                        'outline' => 'test',
                        'students' => [],
                ],

                "metadata" => Carbon::now(),
            ]);
    }

    /**
     * Test create is failed
     */
    public function testCreateFailed()
    {
        $response = $this->json(
                'POST',
                '/api/courses',
                [
                    'error' => 'error',
                    'test' => 'test',
                ]
            );

        $response->assertStatus(422)->assertExactJson( ["message" => "驗證錯誤"] );
    }

    /**
     * Test update is success
     */
    public function testUpdateSuccess()
    {
        Course::create([
            'id' => '999',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);

        $response = $this->json(
            'PUT',
            '/api/courses/999',
            [
                'name' => 'hello'
            ]
        );

        $response->assertStatus(200)->assertExactJson( ["success" => true] );
    }

    /**
     * Test update is failed
     */
    public function testUpdateFailed()
    {
        $response = $this->json(
            'PUT',
            '/api/courses/999',
            [
                'name' => 'hello'
            ]
        );

        $response->assertStatus(404)->assertExactJson( ["message" => "課程找不到"] );
    }

    /**
     * Test delete is success
     */
    public function testDeleteSuccess()
    {
        Course::create([
            'id' => '999',
            'name' => '測試刪除課程',
            'description' => 'test',
            'outline' => 'test',
        ]);

        $response = $this->json(
            'DELETE',
            '/api/courses/999'
        );

        $response->assertStatus(200)->assertExactJson( ["success" => true] );
    }

    /**
     * Test delete is failed
     */
    public function testDeleteFailed()
    {
        $response = $this->json(
            'DELETE',
            '/api/courses/9999'
        );

        $response->assertStatus(404)->assertExactJson( ["message" => "課程找不到"] );
    }
}
