@extends('layouts.master')
@section('title', __('Edit contact'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Edit contact') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Edit contact') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                    <div class="col-12 mb-1">
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first_name">{{ __('First Name') }}</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $contact->first_name }}" placeholder="{{ __('Enter first name') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="middle_name">{{ __('Middle Name') }}</label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $contact->middle_name }}" placeholder="{{ __('Enter middle name') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Last Name') }}</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $contact->last_name }}" placeholder="{{ __('Enter last name') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="street">{{ __('Street') }}</label>
                                        <input type="text" class="form-control" id="street" name="street" value="{{ $contact->street }}" placeholder="{{ __('Enter street') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="city">{{ __('City') }}</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ $contact->city }}" placeholder="{{ __('Enter city') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="state">{{ __('State') }}</label>
                                        <input type="text" class="form-control" id="state" name="state" value="{{ $contact->state }}" placeholder="{{ __('Enter state') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="country">{{ __('Country') }}</label>
                                        <input type="text" class="form-control" id="country" name="country" value="{{ $contact->country }}" placeholder="{{ __('Enter country') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="postal_code">{{ __('Postal Code') }}</label>
                                        <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $contact->postal_code }}" placeholder="{{ __('Enter postal code') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="phone">{{ __('Phone') }}</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}" placeholder="{{ __('Enter phone') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" placeholder="{{ __('Enter email') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="website">{{ __('Website') }}</label>
                                        <input type="text" class="form-control" id="website" name="website" value="{{ $contact->website }}" placeholder="{{ __('Enter website') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="relationship">{{ __('Relationship') }}</label>
                                        <input type="text" class="form-control" id="relationship" name="relationship" value="{{ $contact->relationship }}" placeholder="{{ __('Enter relationship') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="notes">{{ __('Notes') }}</label>
                                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="{{ __('Enter notes') }}">{{ $contact->notes }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection

@push('plugin-scripts')
@endpush