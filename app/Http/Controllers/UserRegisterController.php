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
            'country.*' => 'string|max:255', // validates each selected country
            'region' => 'required|string|max:255',
            'user_type' => 'required|string|max:255',
        ]);
        $role_id = 12;
        if($request->user_type === 'Entrepreneur') {
            $role_id = 12; 
        } elseif($request->user_type === 'Investor') {
            $role_id = 13; 
        } elseif($request->user_type === 'Mentor') {
            $role_id = 16; 
        }

        $defaultPassword = 'trdsy2025';
        $encryptedPassword = '$2y$10$MVbLhKxElrnq5jOCb5ERue4XAe5D89l2RHmOEYFW3REmk1ncTRh2.';
        $user = User::create([
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'username' => strtolower($validated['first_name']) . '' . strtolower($validated['last_name']), 
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

            return redirect()->route('login')->with('success', 'User registered successfully.');

            
            if ($response->successful()) {
                return redirect()->route('login')->with('success', 'User registered successfully.');
            } 
            else {
                \Log::error('Hubtel SMS Failed:', $response->json());
            }

        } catch (\Exception $e) {
            \Log::error('Exception while sending SMS: ' . $e->getMessage());
        }

        return redirect()->route('login')->with(['message' => 'User Registered Successfully!', 'message_type' => 'success']);


    }
}
