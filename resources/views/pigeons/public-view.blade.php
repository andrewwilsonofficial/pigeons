@extends('layouts.pigeon')
@section('title', $pigeon->band)

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ $pigeon->band }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12- text-center">
                                <img src="{{ $pigeon->cover }}" width="300" alt="image" class="img-fluid">
                            </div>
                            <div class="col-12- text-center">
                                <h2>
                                    {{ __('Information') }}
                                </h2>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            {{ __('Main information') }}
                                        </h4>
                                        <p>
                                            <strong>{{ __('Name') }}:</strong> {{ $pigeon->name }}
                                        </p>
                                        <p>
                                            <strong>{{ __('DOB') }}:</strong> {{ $pigeon->date_hatched }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Sex') }}:</strong> {{ $pigeon->sex }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Band') }}:</strong> {{ $pigeon->band }}
                                        </p>
                                        <p>
                                            <strong>{{ __('2nd band') }}:</strong> {{ $pigeon->second_band }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            {{ __('Meta information') }}
                                        </h4>
                                        <p>
                                            <strong>{{ __('Status') }}:</strong> {{ $pigeon->status }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Location') }}:</strong> {{ $pigeon->date_hatched }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Family') }}:</strong> {{ $pigeon->family }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Last owner') }}:</strong> {{ $pigeon->last_owner }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Rating') }}:</strong> {{ $pigeon->rating }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            {{ __('Color and markings') }}
                                        </h4>
                                        <p>
                                            <strong>{{ __('Color') }}:</strong> {{ $pigeon->color }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Eye') }}:</strong> {{ $pigeon->eye }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Leg') }}:</strong> {{ $pigeon->leg }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Markings') }}:</strong> {{ $pigeon->markings }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            {{ __('Sire') }} & {{ __('Dam') }}
                                        </h4>
                                        <p>
                                            <strong>{{ __('Sire') }}:</strong>
                                            @if (!$pigeon->sire->id)
                                                {{ $pigeon->sire->name }}
                                            @else
                                                <a href="{{ route('pigeons.publicPigeon', $pigeon->sire->id) }}"
                                                    target="_blank">
                                                    {{ $pigeon->sire->name }}
                                                </a>
                                            @endif
                                        </p>
                                        <p>
                                            <strong>{{ __('Sire band') }}:</strong>
                                            @if (!$pigeon->sire->id)
                                                {{ $pigeon->sire->band }}
                                            @else
                                                <a href="{{ route('pigeons.publicPigeon', $pigeon->sire->id) }}"
                                                    target="_blank">
                                                    {{ $pigeon->sire->band }}
                                                </a>
                                            @endif
                                        </p>
                                        <p>
                                            <strong>{{ __('Dam') }}:</strong>
                                            @if (!$pigeon->dam->id)
                                                {{ $pigeon->dam->name }}
                                            @else
                                                <a href="{{ route('pigeons.publicPigeon', $pigeon->dam->id) }}"
                                                    target="_blank">
                                                    {{ $pigeon->dam->name }}
                                                </a>
                                            @endif
                                        </p>
                                        <p>
                                            <strong>{{ __('Dam band') }}:</strong> 
                                            @if (!$pigeon->dam->id)
                                                {{ $pigeon->dam->band }}
                                            @else
                                                <a href="{{ route('pigeons.publicPigeon', $pigeon->dam->id) }}"
                                                    target="_blank">
                                                    {{ $pigeon->dam->band }}
                                                </a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
