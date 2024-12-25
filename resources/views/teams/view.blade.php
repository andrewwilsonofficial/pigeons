@extends('layouts.master')
@section('title', $team->name)

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('View pigeon') }} - {{ $team->name }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $team->name }}
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
                                            {{ __('Description') }}
                                        </h4>
                                        <textarea class="form-control" readonly>{{ $team->description }}</textarea>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <p>
                                            {{ __('Unique ID') }}: {{ $team->id }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                                <img src="{{ $team->qr_code }}" alt="{{ $team->band }}" class="img-fluid">
                                <a href="{{ $team->qr_code }}" download="{{ $team->band }} - {{ $team->id }}.png"
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
                                    {{ __('Edit team') }}
                                    <i class="fa fa-edit"></i>
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            {{ __('Pigeons') }}
                                        </h3>
                                        <div class="card-options">
                                            <button class="btn btn-primary">
                                                {{ __('Add a pigeon') }}
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="pigeons-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Name') }}</th>
                                                        <th>{{ __('Band') }}</th>
                                                        <th>{{ __('DOB') }}</th>
                                                        <th>{{ __('Sex') }}</th>
                                                        <th>{{ __('Status') }}</th>
                                                        <th>{{ __('Actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($team->pigeons() as $pigeon)
                                                        <tr>
                                                            <td>{{ $pigeon->name }}</td>
                                                            <td>{{ $pigeon->band }}</td>
                                                            <td>{{ $pigeon->date_hatched }}</td>
                                                            <td>{{ $pigeon->sex }}</td>
                                                            <td>{{ $pigeon->status }}</td>
                                                            <td>
                                                                <a href="{{ route('pigeons.view', $pigeon->id) }}"
                                                                    class="btn btn-primary">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
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

            $('#pigeons-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });
        });
    </script>
@endpush
