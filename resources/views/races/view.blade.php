@extends('layouts.master')
@section('title', $race->name)

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('View race') }} - {{ $race->name }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $race->name }}
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
                                        <textarea class="form-control" readonly>{{ $race->description }}</textarea>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <p>
                                            {{ __('Unique ID') }}: {{ $race->id }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                                <img src="{{ $race->qr_code }}" alt="{{ $race->band }}" class="img-fluid">
                                <a href="{{ $race->qr_code }}" download="{{ $race->band }} - {{ $race->id }}.png"
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
                                <a href="{{ route('races.edit', $race->id) }}" class="btn btn-primary">
                                    {{ __('Edit race') }}
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            {{ __('Main information') }}
                                        </h4>
                                        <p>
                                            <strong>{{ __('Race type') }}:</strong> {{ $race->type }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Race date') }}:</strong> {{ $race->date }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Club name') }}:</strong> {{ $race->club_name }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Club number') }}:</strong> {{ $race->club_number }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Club location') }}:</strong> {{ $race->club_location }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Combine name') }}:</strong> {{ $race->combine_name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            {{ __('Distance information') }}
                                        </h4>
                                        <p>
                                            <strong>{{ __('Release point name') }}:</strong>
                                            {{ $race->release_point_name }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Release longitude') }}:</strong> {{ $race->release_longitude }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Release latitude') }}:</strong> {{ $race->release_latitude }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Destination point name') }}:</strong>
                                            {{ $race->destination_point_name }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Destination longitude') }}:</strong>
                                            {{ $race->destination_longitude }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Destination latitude') }}:</strong>
                                            {{ $race->destination_latitude }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Destination') }}:</strong> {{ $race->race_distance }}
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
                                            <strong>{{ __('Release temperature') }}:</strong>
                                            {{ $race->release_temperature }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Release weather') }}:</strong> {{ $race->release_weather }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Release notes') }}:</strong> {{ $race->release_notes }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Destination temperature') }}:</strong>
                                            {{ $race->destination_temperature }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Destination weather') }}:</strong>
                                            {{ $race->destination_weather }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Destination notes') }}:</strong> {{ $race->destination_notes }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            {{ __('Competition & release time information') }}
                                        </h4>
                                        <p>
                                            <strong>{{ __('Total birds') }}:</strong> {{ $race->total_birds }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Total lofts') }}:</strong> {{ $race->total_lofts }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Release time') }}:</strong> {{ $race->release_time }}
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

            $('#races-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });
        });
    </script>
@endpush
