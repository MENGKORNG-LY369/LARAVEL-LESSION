<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowStudentResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::list();
        $students = StudentResource::collection($students);
        return response()->json(['success' => true, 'data' => $students], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Student::store($request);
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'Student created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        if ($student) {
            $student = new ShowStudentResource($student);
        }
        return response()->json([
            'success' => $student ? true : false,
            'data' => $student ? $student : [],
            'message' => $student ? "Student successfully found": "Student not found with id $id"
        ], $student ? 200 : 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student ? Student::store($request, $id) : '';
        return response()->json([
            'success' => $student ?  true : false,
            'data' => $student ? $student : [],
            'message' => $student ? 'Student updated successfully' : "Student not found with id $id"
        ], $student ?  200 : 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::find($id)->delete();
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Student deleted successfully'
        ], 200);
    }
}