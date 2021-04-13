<?php

namespace Tests\Feature;

use App\History;
use App\Models\Course;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp(): void
    {
        Carbon::setTestNow('2021-03-23 14:00:00');
        parent::setUp();
    }

    public function testSuccess()
    {
        /* 先建一筆課程與history對應 */
        Course::create([
            'id' => '999',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);

        History::create([
            'id' => '999',
            'course_id' => '999',
            'description' => 'test',
            'course_date' => Carbon::now(),
        ]);

        $response = $this->get('/api/courses/histories/999');

        $response->assertStatus(200)
            ->assertExactJson([
                    [
                    'course_date' => Carbon::now()->format('Y-m-d H:i:s'),
                    'description' => 'test',
                    ]
        ]);
    }

}
