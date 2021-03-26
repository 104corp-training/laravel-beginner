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
    use WithoutMiddleware;  // 無視middleware,要測試middleware就註解他
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

    /**
     * 
     * test delete success
     * 
     */

    
    public function testDeleteSuccess(){

        Course::create([
            'id' => '999',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);

        $response = $this->delete( 'api/courses/999' );

        $response->assertStatus(200)
            ->assertExactJson([
                "success" => true
            ]);
    }
    
    /**
     * 
     * test delete fail
     * 
     * 
     */


    public function testDeleteFailed(){


        $response = $this->delete( 'api/courses/999' );

        $response->assertStatus(404)
            ->assertExactJson([
                "message" => "課程找不到"
            ]);

    }

    /**
     * test create success
     * 
     * 
     */

    /*  由於ID會一直變動所以先註解掉
    public function testCreateSuccess(){
        $response = $this->json(
            'post',
            'api/courses',
            [
                'name' => 'selly',
                'description' => 'test',
                'outline' => 'outline',
            ]);

        $response->assertStatus(200)
        ->assertExactJson([
            'success' => [
                'name' => 'selly',
                'description' => 'test',
                'outline' => 'outline',
                "updated_at" => '2021-03-23 14:00:00',
                "created_at" => '2021-03-23 14:00:00',
                'id' => 1005
            ]
        ]);
    }
    */



    /**
     * 
     * test create fail
     * 
     */

    
    public function testCreateFailed(){
        $response = $this->json(
            'post',
            'api/courses',
            [
                'hello' => 'selly',
                'nihao' => 'test',
                'world' => 'outline'
            ]);

        $response->assertStatus(422)
        ->assertExactJson([
            "message" => "驗證錯誤"
        ]);
    }
    

    /**
     * 
     * test update success
     * 
     */

    public function testUpdateSuccess(){
        $response = $this->json(
            'put',
            'api/courses/1',
            [
                'id' => 1 ,
                'name' => 'PHP基礎課程',
                'outline' => 'hello'
            ]
            );

        $response->assertStatus(200)
        ->assertExactJson([
            "success" => true
        ]);
    }

    /**
     * 
     * test update failed
     * 
     */

    
    public function testUpdateFailed(){
        $response = $this->json(
            'put',
            'api/courses/999',
            [
                'id' => 1 ,
                'name' => 'PHP基礎課程',
                'outline' => 'hello'
            ]
            );
        
        $response->assertStatus(404)
        ->assertExactJson([
            "message" => "課程找不到"
        ]);
    }
    
}
