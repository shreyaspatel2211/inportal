<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;


class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::all(); // You can add pagination or filters here
        return view('mentor', compact('mentors'));
    }

    public function show($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('mentors.show', compact('mentor'));
    }
}
