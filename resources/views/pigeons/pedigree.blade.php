@extends('layouts.master')
@section('title', $pigeon->band . ' - ' . __('Pedigree'))

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pedigree.css') }}">
@endpush

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ $pigeon->band }} - {{ __('Pedigree') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="pedigree-tree">
                <!-- Main Person -->
                <div class="pedigree-generation pedigree-g1">
                    <div class="pedigree-member">
                        <div class="pedigree-card pedigree-main-person">
                            <img src="{{ $pigeon->cover }}" alt="{{ $pigeon->band }}"
                                class="pedigree-profile-pic">
                            <div class="pedigree-name">
                                {{ $pigeon->band }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parents -->
                <div class="pedigree-generation pedigree-g2">
                    <div class="pedigree-member pedigree-father-side">
                        <div class="pedigree-card">
                            <img src="{{ $pigeon->sire->cover }}" alt="{{ $pigeon->sire->band }}"
                                class="pedigree-profile-pic">
                            <div class="pedigree-name">
                                {{ $pigeon->sire->band }}
                            </div>
                        </div>
                    </div>
                    <div class="pedigree-member pedigree-mother-side">
                        <div class="pedigree-card">
                            <img src="{{ $pigeon->dam->cover }}" alt="{{ $pigeon->dam->band }}"
                                class="pedigree-profile-pic">
                            <div class="pedigree-name">
                                {{ $pigeon->dam->band }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grandparents -->
                <div class="pedigree-generation pedigree-g3">
                    <div class="pedigree-member pedigree-father-side">
                        <div class="pedigree-card">
                            <img src="{{ $pigeon->sire->sire->cover }}" alt="{{ $pigeon->sire->sire->band }}"
                                class="pedigree-profile-pic">
                            <div class="pedigree-name">
                                {{ $pigeon->sire->sire->band }}
                            </div>
                        </div>
                    </div>
                    <div class="pedigree-member pedigree-father-side">
                        <div class="pedigree-card">
                            <img src="{{ $pigeon->sire->dam->cover }}" alt="{{ $pigeon->sire->dam->band }}"
                                class="pedigree-profile-pic">
                            <div class="pedigree-name">
                                {{ $pigeon->sire->dam->band }}
                            </div>
                        </div>
                    </div>
                    <div class="pedigree-spacer"></div>
                    <div class="pedigree-member pedigree-mother-side">
                        <div class="pedigree-card">
                            <img src="{{ $pigeon->dam->sire->cover }}" alt="{{ $pigeon->dam->sire->band }}"
                                class="pedigree-profile-pic">
                            <div class="pedigree-name">
                                {{ $pigeon->dam->sire->band }}
                            </div>
                        </div>
                    </div>
                    <div class="pedigree-member pedigree-mother-side">
                        <div class="pedigree-card">
                            <img src="{{ $pigeon->dam->dam->cover }}" alt="{{ $pigeon->dam->dam->band }}"
                                class="pedigree-profile-pic">
                            <div class="pedigree-name">
                                {{ $pigeon->dam->dam->band }}
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
