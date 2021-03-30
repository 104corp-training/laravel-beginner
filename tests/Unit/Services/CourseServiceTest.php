<?php

namespace Tests\Unit\Services;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Repositories\CourseRepository;
use App\Services\CourseService;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Mockery;
use Tests\TestCase;

class CourseServiceTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     */
    public function setUp(): void
    {
        Carbon::setTestNow('2021-03-23 14:00:00');
        parent::setUp();
    }

    /**
     * @testdox 找不到對應課程
     */
    public function testGetCourseById()
    {
        $testCourseId = 1;
        $expected = [
            'name' => 'Laravel 程式設計',
            'description' => 'test',
            'outline' => 'test',
            'students' => [],
        ];
        $expectedModel = new Course();
        $expectedModel->fill($expected);

        $mockRepo = Mockery::mock(CourseRepository::class)->makePartial();
        $mockRepo->shouldReceive('getCourseById')
            ->once()
            ->with($testCourseId)
            ->andReturn($expectedModel);

        $service = new CourseService($mockRepo);
        $actual = $service->getCourseById($testCourseId);
        $actualJson = $actual->response()->content();

        $expectedJson = json_encode([
            'data' => $expected,
            'metadata' => Carbon::now(),
        ]);
        $this->assertInstanceOf(CourseResource::class, $actual);
        $this->assertEquals($expectedJson, $actualJson);
    }

    /**
     * @testdox 測試取得不到資料
     *  
     */
    public function testGetByEmpty()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('course not found');

        $testCourseId = 999;
        $mockRepo = Mockery::mock(CourseRepository::class)->makePartial();
        $mockRepo->shouldReceive('getCourseById')
            ->once()
            ->with($testCourseId)
            ->andReturn(null);

        $service = new CourseService($mockRepo);
        $service->getCourseById($testCourseId);
    }

    /**
     * @testdox 測試刪除不存在的資料
     * 
     * 
     */

    /*
    public function testDeleteCourseById()
    {
        $testCourseId = 1;
        $expected = [
            'name' => '',
            'description' => '',
            'outline' => '',
            'students' => [],
        ];
    }
    */

    /**
      * @testdox 測試post
      */


    /**
     * 
     * @testdox 測試put
     * 
     */
    

    public function testPutCourseById()
    {
        $testCourseId = 1 ;
        $expected = [
            'name' => 'PHP 基礎設計pro',
            'description' => 'hello',
            'outline' => 'whoami',
            'students' => [],
        ];

        
    }
}
