@extends('layouts.master')
@section('title', __('Pairs'))

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
        });
    </script>
@endpush
