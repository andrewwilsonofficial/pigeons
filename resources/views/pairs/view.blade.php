@extends('layouts.master')
@section('title', $pair->name)

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('View pigeon') }} - {{ $pair->name }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $pair->name }}
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
                                        <textarea class="form-control" readonly>{{ $pair->notes }}</textarea>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <p>
                                            {{ __('Unique ID') }}: {{ $pair->id }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                                <img src="{{ $pair->qr_code }}" alt="{{ $pair->band }}" class="img-fluid">
                                <a href="{{ $pair->qr_code }}" download="{{ $pair->band }} - {{ $pair->id }}.png"
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
                                    {{ __('Edit pair') }}
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
                                            <strong>{{ __('Name') }}:</strong> {{ $pair->name }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Description') }}:</strong> {{ $pair->description }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Date paired') }}:</strong> {{ $pair->date_paired }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Date separated') }}:</strong> {{ $pair->date_separated }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Sire') }}:</strong> {{ $pair->cock->band }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Dam') }}:</strong> {{ $pair->hen->band }}
                                        </p>
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
