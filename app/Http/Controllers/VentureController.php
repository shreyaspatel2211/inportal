<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Business;
use App\Models\Sectors;
use Auth;
use Illuminate\Support\Str;
use App\Models\TeamMembers;


class VentureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        $countries = Country::orderBy('nicename')->get();
        $sectors = Sectors::orderBy('sector_name')->get();
        return view('ventures', compact('countries', 'sectors'));
    }

    public function create()
    {
        $businesses = Business::all();
        return view('venture', compact('businesses'));
    }

    public function details($id)
    {
        $businesses = Business::with('teamMember')->findOrFail($id);
        $members = [];
        $team = $businesses->teamMember;

        if ($team) {
            for ($i = 1; $i <= 4; $i++) {
                $name = $team->{"m{$i}_name"};
                $designation = $team->{"m{$i}_designation"};
                $description = $team->{"m{$i}_description"};

                if ($name || $designation || $description) {
                    $members[] = [
                        'name' => $name,
                        'designation' => $designation,
                        'description' => $description,
                    ];
                }
            }
        }
        return view('detail', compact('businesses', 'members'));
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'company_name' => 'required|string|max:255',
        'tagline' => 'required|string|max:255',
        'founding_date' => 'required|date',
        'pitch' => 'required|string',
        'pitch_video_url' => 'nullable|url',
        'full_address' => 'required|string',
        'phone_no' => 'nullable|string',
        'stage' => 'required|string',
        'customers' => 'nullable|array',
        'customer_base' => 'nullable|array',
        'sectors' => 'nullable|array',
        'sectors.*' => 'string',
        'email' => 'required|email|max:255',
        'countries' => 'nullable|array',
        'countries.*' => 'string',
        'website' => 'nullable|url',
        'instagram' => 'nullable|url',
        'facebook' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'twitter' => 'nullable|url',
        'youtube' => 'nullable|url',
        'tiktok' => 'nullable|url',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'documents' => 'nullable|array',
        'documents.*' => 'nullable|file|mimes:pdf,doc,docx,zip,txt|max:5120',
        'venture_description' => 'nullable|string|max:1000',
        'team_details' => 'nullable|string|max:1000',
        'traction' => 'nullable|string|max:1000',
        'fundraising' => 'nullable|string|max:1000',
        'impact' => 'nullable|string|max:1000',
        ]);

        $business = new Business();
        $business->company_name = $request->company_name;
        $business->tagline = $request->tagline;
        $business->founding_date = $request->founding_date;
        $business->pitch = $request->pitch;
        $business->pitch_video_url = $request->pitch_video_url;
        $business->full_address = $request->full_address;
        $business->phone_number = $request->phone_no;
        $business->stage = $request->stage;
        $business->description = $request->venture_description;
        $business->team_details = $request->team_details;
        $business->traction = $request->traction;
        $business->fundraising = $request->fundraising;
        $business->impact = $request->impact;
        $business->email = $request->email;
        $business ->user_id = Auth::id();
        $business->status = 'Pending';

        if ($request->hasFile('logo')) {
            $folder = 'businesses/' . date('FY'); // Example: businesses/June2025
            $filename = Str::random(20) . '.' . $request->file('logo')->getClientOriginalExtension();
            
            $path = $request->file('logo')->storeAs($folder, $filename, 'public');

            $business->logo = $path; // Use $path here safely
        }


        if ($request->hasFile('background_image')) {
            $folder = 'businesses/' . date('FY'); // e.g. businesses/June2025
            $filename = Str::random(20) . '.' . $request->file('background_image')->getClientOriginalExtension();

            $path = $request->file('background_image')->storeAs($folder, $filename, 'public');

            // Save just the path OR JSON, depending on your usage
            $business->background_image = $path; 
        }

        if ($request->hasFile('documents')) {
            $docs = [];
            foreach ($request->file('documents') as $doc) {
                $folder = 'businesses/' . date('FY');
                $filename = Str::random(20) . '.' . $doc->getClientOriginalExtension();

                $path = $doc->storeAs($folder, $filename, 'public');

                $docs[] = [
                    'download_link' => $path,
                    'original_name' => $doc->getClientOriginalName(),
                ];
            }

            // Save the array as JSON
            $business->documents = json_encode($docs);
        }

        // Handle arrays
        $business->what = $request->customers ? implode(',', $request->customers) : null;
        $business->where = $request->customer_base ? implode(',', $request->customer_base) : null;
        $business->sectors = $request->sectors ? implode(',', $request->sectors) : null;
        $business->countries = $request->countries ? implode(',', $request->countries   ) : null;

        $business->website = $request->website;
        $business->instagram = $request->instagram;
        $business->facebook = $request->facebook;
        $business->linkedin = $request->linkedin;
        $business->twitter = $request->twitter;
        $business->youtube = $request->youtube;
        $business->tiktok = $request->tiktok;
        
        $business->save();

        $names = $request->input('membername');
        $designations = $request->input('designation');
        $descriptions = $request->input('description');

        TeamMembers::create([
            'business_id' => $business->id,
            'm1_name' => $names[0] ?? null,
            'm1_designation' => $designations[0] ?? null,
            'm1_description' => $descriptions[0] ?? null,
            'm2_name' => $names[1] ?? null,
            'm2_designation' => $designations[1] ?? null,
            'm2_description' => $descriptions[1] ?? null,
            'm3_name' => $names[2] ?? null,
            'm3_designation' => $designations[2] ?? null,
            'm3_description' => $descriptions[2] ?? null,
            'm4_name' => $names[3] ?? null,
            'm4_designation' => $designations[3] ?? null,
            'm4_description' => $descriptions[3] ?? null,
        ]);
        if ($business->save()) {
            return redirect()->back()->with('success', 'Venture profile submitted successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong while saving the venture profile.');
        }
    }
}