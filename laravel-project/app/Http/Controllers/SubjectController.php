<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function subject() {
        $subjects = Subject::all();

        return view('subject', [
            'title' => 'Subject Page',
            'subjects' => $subjects
        ]);
    }
}
