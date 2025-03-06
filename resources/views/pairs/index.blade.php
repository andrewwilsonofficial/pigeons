@extends('layouts.master')
@section('title', __('Pairs'))

@push('plugin-styles')
    <style>
        #sire-dam-container {
            display: none !important;
        }
    </style>
@endpush
@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Pairs') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-12 text-center mb-3">
                <a href="{{ route('pairs.create') }}" class="btn btn-primary">
                    {{ __('Add a new pair') }}
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Pairs') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="pairs-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-5p border-bottom-0">
                                            #
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Name') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Description') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Sire') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Dam') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Mated') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Separated') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Season') }}
                                        </th>
                                        <th class="wd-5p border-bottom-0">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pairs as $pair)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('pair', ['pair' => $pair->id]) }}">
                                                    {{ $pair->name }}
                                                </a>
                                            </td>
                                            <td>{{ $pair->description }}</td>
                                            <td>{{ $pair->cock->name }}</td>
                                            <td>{{ $pair->hen->name }}</td>
                                            <td>{{ $pair->date_paired }}</td>
                                            <td>{{ $pair->date_separated }}</td>
                                            <td>{{ $pair->season->name }}</td>
                                            <td>
                                                <a href="{{ route('pairs.edit', $pair->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div class="btn-group mt-2 mb-2">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown">
                                                        {{ __('Actions') }}
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="{{ route('pair', $pair->id) }}">
                                                                {{ __('View full record') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#viewChildrenModal" class="view-children"
                                                                data-id="{{ $pair->id }}">
                                                                {{ __('View children') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('pair.pdf', $pair->id) }}" target="_blank">
                                                                {{ __('Download Breeding card PDF') }}
                                                            </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="add-child"
                                                                data-id="{{ $pair->id }}">
                                                                {{ __('Add Child Pigeon') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" data-id="{{ $pair->id }}"
                                                                class="add-to-season">
                                                                {{ __('Add to season') }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <form action="{{ route('pairs.destroy', $pair->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
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
        <!-- End Row -->

    </div>
    <!-- CONTAINER CLOSED -->
    <div class="modal fade" id="viewChildrenModal" tabindex="-1" role="dialog" aria-labelledby="viewChildrenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewChildrenModalLabel">
                        {{ __('View Children') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addChildModal" tabindex="-1" role="dialog" aria-labelledby="addChildModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addChildModalLabel">
                        {{ __('Add Child Pigeon') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-forms.pigeon />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addToSeasonModal" tabindex="-1" role="dialog" aria-labelledby="addToSeasonModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToSeasonModalLabel">
                        {{ __('Add to Season') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addToSeasonForm" method="POST" action="{{ route('pairs.addToSeason') }}">
                        @csrf
                        <input type="hidden" name="pair_id" id="season_pair_id">
                        <div class="mb-3">
                            <label for="season_id" class="form-label">{{ __('Season') }}</label>
                            <select class="form-select" name="season_id" id="season_id" required>
                                <option value="" selected disabled>{{ __('Select Season') }}</option>
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}">{{ $season->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Add to Season') }}</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
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
            $('#pairs-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });

            $(document).on('click', '.view-children', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('pairs.getChildrens') }}",
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('#viewChildrenModal .modal-body').html(response);
                        $('#viewChildrenModal').modal('show');
                    }
                });
            });

            $(document).on('click', '.add-child', function() {
                var id = $(this).data('id');
                $('#pair_id').val(id);
                $('#addChildModal').modal('show');
            });

            $(document).on('click', '.add-to-season', function() {
                var id = $(this).data('id');
                $('#season_pair_id').val(id);
                $('#addToSeasonModal').modal('show');
            });
        });
    </script>
@endpush
