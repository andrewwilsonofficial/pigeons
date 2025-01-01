@extends('layouts.master')
@section('title', __('Medications'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Medications') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-12 text-center mb-3">
                <a href="{{ route('medications.create') }}" class="btn btn-primary">
                    {{ __('Add a new medication') }}
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Medications') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="medications-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-5p border-bottom-0">
                                            {{ __('Date') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Name') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Dosage') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Applied to') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Comments') }}
                                        </th>
                                        <th class="wd-5p border-bottom-0">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medication_logs as $medication_log)
                                        <tr>
                                            <td>
                                                {{ $medication_log->date }}
                                            </td>
                                            <td>
                                                {{ $medication_log->medication->name }}
                                            </td>
                                            <td>
                                                {{ $medication_log->dosage }}
                                            </td>
                                            <td>
                                                {{ $medication_log->pigeons->count() }}
                                            </td>
                                            <td>
                                                {{ $medication_log->comments }}
                                            </td>
                                            <td>
                                                <a href="{{ route('medications.edit', $medication_log->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('medications.destroy', $medication_log->id) }}"
                                                    method="POST" class="d-inline">
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
            $('#medications-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });
        });
    </script>
@endpush
