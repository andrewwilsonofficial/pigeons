@extends('layouts.master')
@section('title', __('Pigeons'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('My pigeons') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-12 text-center mb-3">
                <a href="{{ route('pigeons.create') }}" class="btn btn-primary">
                    {{ __('Add a new pigeon') }}
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('My pigeons') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="pigeons-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-5p border-bottom-0">
                                            #
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Image') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('DOB') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Name') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Band') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('2nd band') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Sire') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Dam') }}
                                        </th>
                                        <th class="wd-5p border-bottom-0">
                                            {{ __('Sex') }}
                                        </th>
                                        <th class="wd-15p border-bottom-0">
                                            {{ __('Description') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Notes') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Status') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Location') }}
                                        </th>
                                        <th class="wd-5p border-bottom-0">
                                            {{ __('Rating') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pigeons as $pigeon)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('pigeons.view', ['pigeon' => $pigeon->id]) }}">
                                                    <img src="{{ asset('assets/images/' . $pigeon->cover) }}"
                                                        alt="image" class="img-fluid">
                                                </a>
                                            </td>
                                            <td>{{ $pigeon->date_hatched }}</td>
                                            <td>
                                                <a href="{{ route('pigeons.view', ['pigeon' => $pigeon->id]) }}">
                                                    {{ $pigeon->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('pigeons.view', ['pigeon' => $pigeon->id]) }}">
                                                    {{ $pigeon->band }}
                                                </a>
                                            </td>
                                            <td>

                                            </td>
                                            <td>{{ $pigeon->sire->name }}</td>
                                            <td>{{ $pigeon->dam->name }}</td>
                                            <td class="text-center align-middle">
                                                @if ($pigeon->sex == 'cock')
                                                    <img src="{{ asset('assets/images/male.png') }}" width="30"
                                                        alt="male pigeon" class="img-fluid mx-auto d-block">
                                                @elseif ($pigeon->sex == 'hen')
                                                    <img src="{{ asset('assets/images/female.png') }}" width="30"
                                                        alt="female pigeon" class="img-fluid mx-auto d-block">
                                                @else
                                                    <img src="{{ asset('assets/images/unknown-gender.webp') }}"
                                                        width="30" alt="unknown gender pigeon"
                                                        class="img-fluid mx-auto d-block">
                                                @endif
                                            </td>
                                            <td>{{ $pigeon->description }}</td>
                                            <td>{{ $pigeon->notes }}</td>
                                            <td>{{ $pigeon->status }}</td>
                                            <td>{{ $pigeon->location }}</td>
                                            <td>{{ $pigeon->rating }}</td>
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
            $('#pigeons-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });
        });
    </script>
@endpush
