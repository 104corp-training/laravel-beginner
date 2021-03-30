<?php

namespace Tests\Feature;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
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
        //$response = $this->postJson('/user', ['name' => 'Sally']);
        //$this->json('POST', '/user', ['name' => 'Sally']);

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

    public function testCreateSuccess()
    {
        $data = [
            'id' => 999,
            'name' => 'test',
            'description' => 'test',
            'outline' => 'test'

        ];
        $response = $this->json(
            'POST',
            '/api/courses',
            $data
        );
        
        $response->assertStatus(200)
        ->assertExactJson([
            $data
        ]);
    }

    public function testCreateFailed(){
        $response = $this->json(
            'POST',
            'api/courses',
            [
                'test' => 'test',
                'test1' => 'test',
                'test2' => 'test'
            ]);

        $response->assertStatus(422)
        ->assertExactJson([
            "message" => "驗證錯誤"
        ]);
    }

    public function testDeleteSuccess(){

        Course::create([
            'id' => '999',
            'name' => 'test',
            'description' => 'test',
            'outline' => 'test',
        ]);

        $response = $this->delete( 'api/courses/999' );

        $response->assertStatus(200)
            ->assertExactJson([
                "success" => true
            ]);
    }
    
    public function testDeleteFailed(){


        $response = $this->delete( 'api/courses/999' );

        $response->assertStatus(404)
            ->assertExactJson([
                "message" => "課程找不到"
            ]);

    }

    public function testUpdateSuccess(){
        $response = $this->json(
            'put',
            'api/courses/13',
            [
                'id' => '13' ,
                'name' => 'Search Engine',
                'description' => 'test'
            ]
            );

        $response->assertStatus(200)
        ->assertExactJson([
            "success" => true
        ]);
    }

    public function testUpdateFailed(){
        $response = $this->json(
            'put',
            'api/courses/999',
            [
                'id' => '13' ,
                'name' => 'Search Engine',
                'outline' => 'test'
            ]
            );
        
        $response->assertStatus(404)
        ->assertExactJson([
            "message" => "課程找不到"
        ]);
    }
}
