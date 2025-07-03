<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Business;
use App\Models\Sectors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\TeamMembers;
use App\Models\DocumentSubCategory;
use App\Models\DocumentCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class VentureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        $countries = Country::orderBy('nicename')->get();
        $categories = DocumentCategory::all();
        $subcategories = DocumentSubCategory::all();
        $sectors = Sectors::orderBy('sector_name')->get();
        return view('ventures', compact('countries', 'sectors', 'categories', 'subcategories'));
    }

    public function create()
    {
        $businesses = Business::all();
        return view('venture', compact('businesses'));
    }

    public function details($id)
    {
        $business = Business::where('id', $id)->get();

        return view('detail', compact('business'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'founding_date' => 'required|date',
        'pitch' => 'file|mimes:pdf,ppt,pptx|max:20480', // 20MB max
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
        'venture_description' => 'nullable|string|max:1000',
        'team_details' => 'nullable|string|max:1000',
        'traction' => 'nullable|string|max:1000',
        'fundraising' => 'nullable|string|max:1000',
        'impact' => 'nullable|array',
        'impact.*' => 'string',
        ]);
    
        $business = new Business();
        $business->company_name = $request->company_name;
        $business->tagline = $request->tagline;
        $business->founding_date = $request->founding_date;
        $business->pitch_video_url = $request->pitch_video_url;
        $business->full_address = $request->full_address;
        $business->phone_number = $request->phone_no;
        $business->stage = $request->stage;
        $business->description = $request->venture_description;
        $business->team_details = $request->team_details;
        $business->traction = $request->traction;
        $business->fundraising = $request->fundraising;
        $business->impact = $request->has('impact') ? implode(',', $request->impact) : null;
        $business->email = $request->email;
        $business ->user_id = Auth::id();
        $business->status = 'Pending';

        if ($request->hasFile('pitch')) {
            $folder = 'businesses/' . date('FY'); // Example: businesses/June2025
            $filename = Str::random(20) . '.' . $request->file('pitch')->getClientOriginalExtension();

            $path = $request->file('pitch')->storeAs('businesses/' . date('FY'), $filename, 'public');

            $business->pitch = $path; // Save relative path to DB
        }

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

        if ($request->has('documents')) {
            $documentData = [];

            foreach ($request->documents as $index => $doc) {
                // Check if file is present
                if (isset($doc['file']) && $doc['file'] instanceof \Illuminate\Http\UploadedFile) {
                    $file = $doc['file'];
                    $folder = 'businesses/' . date('FY');
                    $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

                    $path = $file->storeAs($folder, $filename, 'public');

                    $documentData[] = [
                        'category_id'     => $doc['category'] ?? null,
                        'sub_category_id' => $doc['sub_category'] ?? null,
                        'document_name'   => $doc['name'] ?? null,
                        'file_name'       => $filename,
                        'storage_path'    => $path,
                        'download_url'    => Storage::url($path),
                        'uploaded_at'     => now()->toDateTimeString(),
                    ];
                }
            }
            
            $business->documents = json_encode($documentData);
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

        $business->avg_customer = $request->avg_customer;
        $business->avg_revenue = $request->avg_revenue;
        $business->avg_expenditure = $request->avg_expenditure;

        $names = $request->input('membername');
        $designations = $request->input('designation');
        $descriptions = $request->input('description');
        $emails = $request->input('team_email');
        // $instagrams = $request->input('team_instagram');
        $facebooks = $request->input('team_facebook');
        // $tiktoks = $request->input('team_tiktok');
        $linkedins = $request->input('team_linkedin');
        $twitters = $request->input('team_twitter');
        // $youtubes = $request->input('team_youtube');

        $team = [];

        for ($i = 0; $i < count($names); $i++) {
            $team[] = [
                'name' => $names[$i] ?? null,
                'designation' => $designations[$i] ?? null,
                'description' => $descriptions[$i] ?? null,
                'email' => $emails[$i] ?? null,
                'socials' => [
                    // 'instagram' => $instagrams[$i] ?? null,
                    'facebook' => $facebooks[$i] ?? null,
                    // 'tiktok' => $tiktoks[$i] ?? null,
                    'linkedin' => $linkedins[$i] ?? null,
                    'twitter' => $twitters[$i] ?? null,
                    // 'youtube' => $youtubes[$i] ?? null,
                ]
            ];
        }
        // Save in businesses table as JSON
        $business->team_json = json_encode($team);

        $raisingFundValue = $request->input('raising_funds'); // Correct name from form

        $business->raising_fund = $raisingFundValue === 'yes' ? 1 : 0;

        if ($raisingFundValue === 'yes') {
            $business->amount = $request->input('amount');
            $business->type_of_funding = $request->input('type_of_fundings') ? implode(',', $request->input('type_of_fundings')) : null;
            $business->funding_round = $request->input('funding_rounds') ? implode(',', $request->input('funding_rounds')) : null;
        } else {
            $business->amount = null;
            $business->type_of_funding = null;
            $business->funding_round = null;
        }
        $business->save();
        if ($business->save()) {
            return redirect()->back()->with('success', 'Venture profile submitted successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong while saving the venture profile.');
        }
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = DocumentSubCategory::where('document_category', $categoryId)->get();

        return response()->json($subcategories);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'founding_date' => 'required|date',
            'pitch' => 'nullable|file|mimes:pdf,ppt,pptx|max:20480',
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
            'venture_description' => 'nullable|string|max:1000',
            'team_details' => 'nullable|string|max:1000',
            'traction' => 'nullable|string|max:1000',
            'fundraising' => 'nullable|string|max:1000',
            'impact' => 'nullable|array',
            'impact.*' => 'string',
        ]);

        $business = Business::findOrFail($id);

        // Basic Fields
        $business->company_name = $request->company_name;
        $business->tagline = $request->tagline;
        $business->founding_date = $request->founding_date;
        $business->pitch_video_url = $request->pitch_video_url;
        $business->full_address = $request->full_address;
        $business->phone_number = $request->phone_no;
        $business->stage = $request->stage;
        $business->description = $request->venture_description;
        $business->team_details = $request->team_details;
        $business->traction = $request->traction;
        $business->fundraising = $request->fundraising;
        $business->impact = $request->has('impact') ? implode(',', $request->impact) : null;
        $business->email = $request->email;
        $business ->user_id = Auth::id();
        $business->status = 'Pending';

        if ($request->hasFile('pitch')) {
            $folder = 'businesses/' . date('FY'); // Example: businesses/June2025
            $filename = Str::random(20) . '.' . $request->file('pitch')->getClientOriginalExtension();

            $path = $request->file('pitch')->storeAs('businesses/' . date('FY'), $filename, 'public');

            $business->pitch = $path; // Save relative path to DB
        }

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

        if ($request->filled('documents')) {

            // Current JSON‑encoded docs in DB (or empty array)
            $existingDocs  = json_decode($business->documents, true) ?? [];

            $documentData  = [];   // the array we will save back

            foreach ($request->documents as $index => $doc) {

                /** --------------------------------------------
                 *  Look up the existing entry (if there is one)
                 *  --------------------------------------------*/
                $existing = $existingDocs[$index] ?? null;

                /** --------------------------------------------
                 *  1. If user uploaded a NEW file
                 *  --------------------------------------------*/
                if (isset($doc['file']) && $doc['file'] instanceof UploadedFile) {

                    // (OPTIONAL) delete the old file to save space
                    if ($existing && !empty($existing['storage_path'])) {
                        Storage::disk('public')->delete($existing['storage_path']);
                    }

                    $file     = $doc['file'];
                    $folder   = 'businesses/' . date('FY');            // e.g. businesses/July2025
                    $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                    $path     = $file->storeAs($folder, $filename, 'public');

                    $documentData[] = [
                        'category_id'     => $doc['category']      ?? $existing['category_id']     ?? null,
                        'sub_category_id' => $doc['sub_category']  ?? $existing['sub_category_id'] ?? null,
                        'document_name'   => $doc['name']          ?? $existing['document_name']   ?? null,
                        'file_name'       => $filename,
                        'storage_path'    => $path,
                        'download_url'    => Storage::url($path),
                        'uploaded_at'     => now()->toDateTimeString(),
                    ];

                    /** --------------------------------------------
                     *  2. No new file – keep the old one
                     *  --------------------------------------------*/
                } elseif ($existing) {

                    // Just update the meta‑data; keep file info unchanged
                    $documentData[] = [
                        'category_id'     => $doc['category']      ?? $existing['category_id'],
                        'sub_category_id' => $doc['sub_category']  ?? $existing['sub_category_id'],
                        'document_name'   => $doc['name']          ?? $existing['document_name'],
                        'file_name'       => $existing['file_name'],
                        'storage_path'    => $existing['storage_path'],
                        'download_url'    => $existing['download_url'],
                        'uploaded_at'     => $existing['uploaded_at'],
                    ];

                    /** --------------------------------------------
                     *  3. A brand‑new entry without a file yet
                     *     (Rare, but handled for completeness)
                     *  --------------------------------------------*/
                } else {
                    $documentData[] = [
                        'category_id'     => $doc['category']     ?? null,
                        'sub_category_id' => $doc['sub_category'] ?? null,
                        'document_name'   => $doc['name']         ?? null,
                        'file_name'       => null,
                        'storage_path'    => null,
                        'download_url'    => null,
                        'uploaded_at'     => now()->toDateTimeString(),
                    ];
                }
            }

            // Persist the (possibly modified) list
            $business->documents = json_encode($documentData);
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

        $business->avg_customer = $request->avg_customer;
        $business->avg_revenue = $request->avg_revenue;
        $business->avg_expenditure = $request->avg_expenditure;

        $names = $request->input('membername');
        $designations = $request->input('designation');
        $descriptions = $request->input('description');
        $emails = $request->input('team_email');
        // $instagrams = $request->input('team_instagram');
        $facebooks = $request->input('team_facebook');
        // $tiktoks = $request->input('team_tiktok');
        $linkedins = $request->input('team_linkedin');
        $twitters = $request->input('team_twitter');
        // $youtubes = $request->input('team_youtube');
        $business->status = $request->status;

        $team = [];

        for ($i = 0; $i < count($names); $i++) {
            $team[] = [
                'name' => $names[$i] ?? null,
                'designation' => $designations[$i] ?? null,
                'description' => $descriptions[$i] ?? null,
                'email' => $emails[$i] ?? null,
                'socials' => [
                    // 'instagram' => $instagrams[$i] ?? null,
                    'facebook' => $facebooks[$i] ?? null,
                    // 'tiktok' => $tiktoks[$i] ?? null,
                    'linkedin' => $linkedins[$i] ?? null,
                    'twitter' => $twitters[$i] ?? null,
                    // 'youtube' => $youtubes[$i] ?? null,
                ]
            ];
        }
        // Save in businesses table as JSON
        $business->team_json = json_encode($team);

        $raisingFundValue = $request->input('raising_funds'); // Will be '1' or '0'

        $business->raising_fund = $raisingFundValue; // Just store it directly

        if ($raisingFundValue == '1') {
            $business->amount = $request->input('amount');
            $business->type_of_funding = $request->has('type_of_fundings')
                ? implode(',', $request->input('type_of_fundings'))
                : null;
            $business->funding_round = $request->has('funding_rounds')
                ? implode(',', $request->input('funding_rounds'))
                : null;
        } else {
            $business->amount = null;
            $business->type_of_funding = null;
            $business->funding_round = null;
        }

        $business->save();

        return redirect()->back()->with('success', 'Business updated successfully.');
    }
}