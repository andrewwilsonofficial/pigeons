@extends('layouts.master')
@section('title', $season->name)

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('View pigeon') }} - {{ $season->name }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $season->name }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button class="btn btn-danger">
                                    {{ __('Delete') }}
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <h4>
                                            {{ __('Notes') }}
                                        </h4>
                                        <textarea class="form-control" readonly>{{ $season->notes }}</textarea>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <p>
                                            {{ __('Unique ID') }}: {{ $season->id }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                                <img src="{{ $season->qr_code }}" alt="{{ $season->band }}" class="img-fluid">
                                <a href="{{ $season->qr_code }}" download="{{ $season->band }} - {{ $season->id }}.png"
                                    class="btn btn-primary mt-2">
                                    {{ __('Download QR code') }}
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12- text-center">
                                <h2>
                                    {{ __('Information') }}
                                </h2>
                            </div>
                            <div class="col-12 text-center mb-3">
                                <button class="btn btn-primary">
                                    {{ __('Edit season') }}
                                    <i class="fa fa-edit"></i>
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            {{ __('Main information') }}
                                        </h4>
                                        <p>
                                            <strong>{{ __('Name') }}:</strong> {{ $season->name }}
                                        </p>
                                        <p>
                                            <strong>{{ __('From') }}:</strong> {{ $season->from }}
                                        </p>
                                        <p>
                                            <strong>{{ __('To') }}:</strong> {{ $season->to }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            {{ __('Pairs in this season') }}
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="pairs-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Name') }}</th>
                                                        <th>{{ __('Description') }}</th>
                                                        <th>{{ __('Sire') }}</th>
                                                        <th>{{ __('Dam') }}</th>
                                                        <th>{{ __('Mated') }}</th>
                                                        <th>{{ __('Separated') }}</th>
                                                        <th>{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($season->pairs as $pair)
                                                        <tr>
                                                            <td>{{ $pair->name }}</td>
                                                            <td>{{ $pair->description }}</td>
                                                            <td>{{ $pair->sire }}</td>
                                                            <td>{{ $pair->dam }}</td>
                                                            <td>{{ $pair->mated }}</td>
                                                            <td>{{ $pair->separated }}</td>
                                                            <td>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            {{ __('Comments') }}
                                        </h3>
                                        <div class="card-options">
                                            <button class="btn btn-primary">
                                                {{ __('Add comment') }}
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="comments-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Comment') }}</th>
                                                        <th>{{ __('Created at') }}</th>
                                                        <th>{{ __('Actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ([] as $comment)
                                                        <tr>
                                                            <td>{{ $comment->comment }}</td>
                                                            <td>{{ $comment->created_at }}</td>
                                                            <td>
                                                                <a href="{{ route('comments.edit', $comment->id) }}"
                                                                    class="btn btn-primary">
                                                                    {{ __('Edit') }}
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <form
                                                                    action="{{ route('comments.destroy', $comment->id) }}"
                                                                    method="POST" style="display: inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger">
                                                                        {{ __('Delete') }}
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-data.js') }}"></script>
    <script>
        $(function() {
            $('#comments-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });

            $('#pairs-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });

            $('#medical-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });
        });
    </script>
@endpush
