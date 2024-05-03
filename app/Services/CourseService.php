<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Course;

class CourseService
{
    public function getAllCourses()
    {
        return app(ServiceWrapper::class)(function () {
            return Course::all();
        });
    }
    

    public function registerCourse($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            //upload image
            $file = $data['image'];
            $destinationPath = 'assets/images/course/';
            $file_name = rand(1, 9999) . '-' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $file_name);
            $data['image'] = $destinationPath . $file_name;
            //add course
            $course = Course::create($data);
            //set cat 
            $course->categories()->attach($data['category_id']);

            return $course;
        });
    }

    public function deleteCourse($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return $data->delete();
        });
    }
}
