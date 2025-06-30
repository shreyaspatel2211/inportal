@component('mail::message')

<img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px; margin-bottom: 20px;">

# 🌟 You're Invited to Collaborate on a DealRoom!

Hi {{ $recipient->name ?? 'there' }},

You've been specially invited to collaborate in the **DealRoom**:  
> **{{ $dealroom->name ?? 'Untitled DealRoom' }}**

{{-- As a valued {{ ucfirst($type) }}, your presence is important to the success of this opportunity. --}}

---

### 🔍 DealRoom Details:

- **Created By:** {{ auth()->user()->name ?? 'Admin' }}
- **Date Created:** {{ \Carbon\Carbon::parse($dealroom->created_at)->format('F j, Y') }}

@if(!empty($dealroom->description))
- **Description:**  
  {{ $dealroom->description }}
@endif

---

@component('mail::button', ['url' => url('/dealrooms/' . $dealroom->id)])
🔗 Access DealRoom
@endcomponent

If the button doesn't work, copy and paste the link below into your browser:  
`{{ url('/dealrooms/' . $dealroom->id) }}`

---

Thank you,  
**The TradeSynch Team**  
{{ config('app.name') }}

@endcomponent
