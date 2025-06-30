@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                    {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">{{ __('voyager::generic.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('voyager::generic.name') }}"
                                       value="{{ old('name', $dataTypeContent->name ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('voyager::generic.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('voyager::generic.email') }}"
                                       value="{{ old('email', $dataTypeContent->email ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('voyager::generic.password') }}</label>
                                @if(isset($dataTypeContent->password))
                                    <br>
                                    <small>{{ __('voyager::profile.password_hint') }}</small>
                                @endif
                                <input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password">
                            </div>
                            {{-- <div class="form-group">
                                <label for="status">{{ __('status') }}</label><br>
                                <input type="checkbox" name="status" id="status" class="toggleswitch"
                                    data-on="{{ __('on') }}"
                                    data-off="{{ __('off') }}"
                                    {{ old('status', $dataTypeContent->status ?? false) ? 'checked' : '' }}>
                            </div> --}}
                            <div class="form-group">
    <label for="status">{{ __('Status') }}</label>
    <select name="status" id="status" class="form-control">
        <option value="Pending" {{ old('status', $dataTypeContent->status ?? 'Pending') == 'Pending' ? 'selected' : '' }}>Pending</option>
        <option value="Approved" {{ old('status', $dataTypeContent->status ?? 'Pending') == 'Approved' ? 'selected' : '' }}>Approved</option>
        <option value="Rejected" {{ old('status', $dataTypeContent->status ?? 'Pending') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
        <option value="Suspended" {{ old('status', $dataTypeContent->status ?? 'Pending') == 'Suspended' ? 'selected' : '' }}>Suspended</option>
    </select>
</div>
                            <div class="form-group">
                                <label for="username">{{ __('Username') }}</label><br>
                                <input type="text" name="username" id="username" class="form-control"
                                value="{{ old('username', $dataTypeContent->username ?? '') }}"
                                placeholder="{{ __('Enter username') }}">
                            </div>

                            <div class="form-group">
    <label for="phone_number">{{ __('Phone Number') }}</label><br>
    <input type="tel" name="phone_number" id="phone_number" class="form-control"
        value="{{ old('phone_number', $dataTypeContent->phone_number ?? '') }}"
        placeholder="{{ __('Enter phone number') }}">
</div>

<div class="form-group">
    <label for="country">{{ __('Country') }}</label><br>
    <input type="text" name="country" id="country" class="form-control"
        value="{{ old('country', $dataTypeContent->country ?? '') }}"
        placeholder="{{ __('Enter country') }}">
</div>

<div class="form-group">
    <label for="state">{{ __('State') }}</label><br>
    <input type="text" name="state" id="state" class="form-control"
        value="{{ old('state', $dataTypeContent->state ?? '') }}"
        placeholder="{{ __('Enter state') }}">
</div>

<label>Select one of the User:</label><br>
<select style="width: 100%; padding: 1rem; font-size: 1rem; border: 1px solid #ccc; border-radius: 0.375rem;" name="user_type" required>
    <option value="Entrepreneur">Entrepreneur</option>
    <option value="Investor">Investor</option>
    {{-- <option value="Business">Business</option> --}}
    <option value="Partner/NGO">Partner/NGO</option>
</select>
<br><br>

<label>Select one of the Role:</label><br>
<select style="width: 100%; padding: 1rem; font-size: 1rem; border: 1px solid #ccc; border-radius: 0.375rem;" name="role_id" required>
    <option value="12">Entrepreneur</option>
    <option value="13">Investor</option>
    {{-- <option value="14">Business</option> --}}
    <option value="15">Partner/NGO</option>
</select>
<br><br>


                            @can('editRoles', $dataTypeContent)
                                <div class="form-group">
                                    <label for="default_role">{{ __('voyager::profile.role_default') }}</label>
                                    @php
                                        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};

                                        $row     = $dataTypeRows->where('field', 'user_belongsto_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                                <div class="form-group">
                                    <label for="additional_roles">{{ __('voyager::profile.roles_additional') }}</label>
                                    @php
                                        $row     = $dataTypeRows->where('field', 'user_belongstomany_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                            @endcan
                            @php
                            if (isset($dataTypeContent->locale)) {
                                $selected_locale = $dataTypeContent->locale;
                            } else {
                                $selected_locale = config('app.locale', 'en');
                            }

                            @endphp
                            <div class="form-group">
                                <label for="locale">{{ __('voyager::generic.locale') }}</label>
                                <select class="form-control select2" id="locale" name="locale">
                                    @foreach (Voyager::getLocales() as $locale)
                                    <option value="{{ $locale }}"
                                    {{ ($locale == $selected_locale ? 'selected' : '') }}>{{ $locale }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                @if(isset($dataTypeContent->avatar))
                                    <img src="{{ filter_var($dataTypeContent->avatar, FILTER_VALIDATE_URL) ? $dataTypeContent->avatar : Voyager::image( $dataTypeContent->avatar ) }}" style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
                                @endif
                                <input type="file" data-name="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>
        <div style="display:none">
            <input type="hidden" id="upload_url" value="{{ route('voyager.upload') }}">
            <input type="hidden" id="upload_type_slug" value="{{ $dataType->slug }}">
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
        });
    </script>
@stop
