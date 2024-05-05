<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Imports\StudentImport;
use App\Imports\CourseImport;
use App\Imports\StudentTermCourseImport;
use App\Imports\StudentTermImport;
use App\Imports\TermImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function importStudent(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:10240', // Adjust max file size if needed
        ]);
        try {
            Excel::import(new StudentImport, $request->file('file'));
        } catch (\Throwable $th) {
            // Handle any exceptions or errors during the import process
            return back()->withErrors([$th->getMessage()]);
        }
        return redirect()->back()->with('success', 'Student imported successfully!');
    }
    public function importCourse(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:10240', // Adjust max file size if needed
        ]);
        try {Excel::import(new CourseImport, $request->file('file'));
    } catch (\Throwable $th) {
        // Handle any exceptions or errors during the import process
        return back()->withErrors([$th->getMessage()]);
    }
        return redirect()->back()->with('success', 'Course imported successfully!');
    }
    public function importTerm(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:10240', // Adjust max file size if needed
        ]);
        try {Excel::import(new TermImport, $request->file('file'));
    } catch (\Throwable $th) {
        // Handle any exceptions or errors during the import process
        return back()->withErrors([$th->getMessage()]);
    }
        return redirect()->back()->with('success', ' Term  imported successfully!');
    }
    public function importStudentTerm(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:10240', // Adjust max file size if needed
        ]);
        try {Excel::import(new StudentTermImport, $request->file('file'));
    } catch (\Throwable $th) {
        // Handle any exceptions or errors during the import process
        return back()->withErrors([$th->getMessage()]);
    }
        return redirect()->back()->with('success', 'Student Term  imported successfully!');
    }
    public function importStudentTermCourse(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx|max:10240', // Adjust max file size if needed
        ]);
        try {Excel::import(new StudentTermCourseImport, $request->file('file'));
    } catch (\Throwable $th) {
        // Handle any exceptions or errors during the import process
        return back()->withErrors([$th->getMessage()]);
    }
        return redirect()->back()->with('success', 'Student Term Course imported successfully!');
    }
}