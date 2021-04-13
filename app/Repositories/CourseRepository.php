<?php

namespace App\Repositories;

use App\Exceptions\APIException;
use App\Models\Course;

class CourseRepository
{
    /**
     * @var Course
     */
    private $model;

    /**
     * CourseService constructor.
     * @param Course $model
     */
    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return Course
     */
    public function getCourseById($id): ?Course
    {
        return $this->model->find($id);
    }

    public function updateCourseById($id, $form) {
        if (! $course = Course::find($id)) {
            throw new APIException('課程找不到', 404);
        }
        $status = $course->update($form);
        return ['success' => $status];
    }
}
