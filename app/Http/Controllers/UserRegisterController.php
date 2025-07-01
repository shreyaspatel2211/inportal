<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Sectors;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Http;
use App\Models\Entrepreneur;
use App\Models\Investor;
use App\Models\Mentor;

class UserRegisterController extends Controller
{
    public function showForm()
    {
            $countries = Country::orderBy('nicename')->get();
            return view('register_form', compact('countries')); // Use your actual Blade view name
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'country.*' => 'string|max:255',
            'region' => 'required|string|max:255',
            'user_type' => 'required|string|max:255',
        ]);

        // Determine role_id based on user_type
        $role_id = match ($request->user_type) {
            'Entrepreneur' => 12,
            'Investor' => 13,
            'Partner/NGO' => 15,
            default => 13,
        };

        $defaultPassword = 'trdsy2025';

        $baseUsername = strtolower($validated['first_name']) . strtolower($validated['last_name']);
        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        $user = User::create([
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'username' => $username,
            'phone_number' => $validated['phone'],
            'email' => $validated['email'],
            'country' => $request->country,
            'state' => $validated['region'],
            'user_type' => $validated['user_type'],
            'password' => $defaultPassword, 
            'role_id' => $role_id,
        ]);

        if($request->user_type === 'Entrepreneur') {
            $entrepreneur = Entrepreneur::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'], 
                'phone_number' => $validated['phone'],
                'email' => $validated['email'],
                'country' => $request->country,
                'region' => $validated['region'],
                'user_id' => $user->id
            ]);
        } elseif($request->user_type === 'Investor') {
            $investor = Investor::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'], 
                'phone_number' => $validated['phone'],
                'email' => $validated['email'],
                'country' => $request->country,
                'region' => $validated['region'],
                'user_id' => $user->id
            ]);
        } elseif($request->user_type === 'Mentor') {
            $mentor = Mentor::create([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'phone_number' => $validated['phone'],
                'email' => $validated['email'],
                'country' => $request->country,
                'city' => $validated['region'],
                'user_id' => $user->id
            ]);
        }

    
        Mail::to($user->email)->send(new UserRegistered($user));

        // Prepare phone number and message
        $phone = '+233' . ltrim($validated['phone'], '0');
        $message = "Welcome {$user->name}!\nUsername: {$user->username}\nPhone: {$user->phone_number}\nEmail: {$user->email}\nCountry: {$user->country}\nUser Type: {$user->user_type}\nPassword: trdsy2025";

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->get(env('HUBTEL_BASE_URL'), [
                'clientid' => env('HUBTEL_CLIENT_ID'),
                'clientsecret' => env('HUBTEL_CLIENT_SECRET'),
                'from' => env('HUBTEL_SENDER_ID'),
                'to' => $phone,
                'content' => $message,
            ]);

            if ($response->successful()) {
                return redirect()->route('login')->with('success', 'User registered successfully.');
            } else {
                \Log::error('Hubtel SMS Failed:', $response->json());
            }

        } catch (\Exception $e) {
            \Log::error('Exception while sending SMS: ' . $e->getMessage());
        }

        return redirect()->route('login')->with(['message' => 'User Registered Successfully!', 'message_type' => 'success']);
    }
}
