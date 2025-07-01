<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programs;
use App\Models\ProgramMembers;
use Auth;
use App\Models\Form;
use Illuminate\Support\Str;


class ProgramController extends Controller
{
     public function index()
    {
        $programs = Programs::latest()->get();
        return view('program', compact('programs')); // Adjust view path if needed
    }
    public function details($id)
    {
        $programs = Programs::findOrFail($id);
        return view('program-details', compact('programs'));
    }
    // public function applyToProgram($programId)
    // {
    //     $userId = Auth::id();

    //     // Optional: Prevent duplicate applications
    //     $alreadyApplied = ProgramMembers::where('program_id', $programId)
    //         ->where('user_id', $userId)
    //         ->exists();

    //     if ($alreadyApplied) {
    //         return redirect()->back()->with('message', 'You have already applied to this program.');
    //     }
    //     // Create new entry
    //     ProgramMembers::create([
    //         'program_id' => $programId,
    //         'user_id' => $userId,
    //     ]);

    //     return redirect()->back()->with('message', 'Application submitted successfully!')->with('message_type', 'success');

    // }
    
    public function showApplyForm(Programs $program)
    {
        // Step 1: Get the form by ID
        $form = Form::find($program->form_id);
        
        // Step 2: Check if form exists and has custom_field
        if (!$form || !$form->custom_field) {
            return back()->with('error', 'Form not found or custom fields are empty.');
        }

        // Step 3: Decode the custom fields
        $customFields = json_decode($form->custom_field, true);
        
        return view('program.apply', compact('program', 'customFields'));
    }

    public function submitApplication(Request $request, Programs $program)
    {
        $form = Form::find($program->form_id);
        $userId = Auth::id();

        if (!$form || !$form->custom_field) {
            return back()->with('error', 'Form not found.');
        }

        $customFields = json_decode($form->custom_field, true);
        
        $data = [];
        $imagePath = null;
        $filePath = null;

        foreach ($customFields as $key => $field) {
            $type = strtolower($field['field_type']);

            if ($type === 'image' && $request->hasFile($key)) {
                $folder = 'program_members/' . date('FY');
                $filename = Str::random(20) . '.' . $request->file($key)->getClientOriginalExtension();

                $image = $request->file($key);
                $imagePath = $image->storeAs($folder, $filename, 'public');
                continue;
            }

            if ($type === 'file' && $request->hasFile($key)) {
                $file = $request->file($key);
                $filePath = $file->store('uploads/files', 'public');
                continue;
            }

            $data[$key] = $request->input($key);
        }

        ProgramMembers::create([
            'program_id' => $program->id,
            'member_data' => json_encode($data),
            'image' => $imagePath,
            'file' => $filePath,
            'user_id' => $userId,
        ]);

        return redirect()->back()->with('success', 'Application submitted!');
    }
}
