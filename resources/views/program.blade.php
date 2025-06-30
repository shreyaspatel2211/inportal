@extends('theme::layouts.app')

@section('content')

<div class="max-w-6xl px-5 mx-auto sm:mt-10 mt-5 lg:px-0">


    <div>
        <div class="mt-10">
            <h1 class="pt-5 text-5xl font-bold text-color"> Upcoming Programs </h1>
            <p class="text-balance mt-6">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae nulla dolorum architecto autem cum accusamus ea explicabo facere possimus,
                repudiandae illum cumque veniam aperiam odit animi fuga necessitatibus. Autem, voluptatem!</p>
        </div>
    </div>
    <hr class="bg-color my-5 sm:mt-10" style="height:1.9px;">

    <div>
        <h1 class="text-color text-xl font-bold text-center"> New Programs </h1>

        <div class="flex flex-wrap justify-center gap-6 mt-5">
            @foreach($programs as $program)

            <div class="border-2 rounded-md" style="width:450px;">
                <img style="width:450px; height:200px" src="{{ asset('storage/' . $program->image) }}" alt="img" />

                <div class="px-4 my-5">
                    <h1 class="text-xl font-bold text-color">{{ $program->program_name }}</h1>
                    <p>Start Date : {{ $program->program_start_date }} <br> End Date : {{ $program->program_end_date }}</p>
                </div>
                <div class="px-4 flex pt-2 pb-5">
                    <a href="{{ route('program.show', $program->id) }}">
                        <button class="bg-color font-medium text-white mt-3 px-4 py-2 rounded-md hover:bg-black hover:text-white">
                            View Details
                        </button>
                    </a>
                    <form action="{{ route('programss.apply', $program->id) }}" method="GET" class="ml-4">
                        @csrf
                        <button type="submit" class="bg-color font-medium text-white mt-3 px-4 py-2 rounded-md hover:bg-black hover:text-white">
                            Apply Now
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@if(session('message'))
    <script type="text/javascript">
        var message = "{{ session('message') }}";
        var messageType = "{{ session('message_type') }}"; // Get the type of message (success/error)

        // Toastr configuration with optional styling
        toastr.options = {
            "positionClass": "toast-top-right",  // Position the toast in the top-right corner
            "closeButton": true,  // Show the close button on the toast
            "progressBar": true,  // Show a progress bar on the toast
            "timeOut": 5000,  // Duration for the toast to stay visible (in milliseconds)
            "extendedTimeOut": 1000  // Extra time after hover (in milliseconds)
        };

        // Show the appropriate notification based on message type
        if (messageType === 'success') {
            toastr.success(message);  // Show success notification
        } else if (messageType === 'error') {
            toastr.error(message);  // Show error notification
        }
    </script>
@endif
