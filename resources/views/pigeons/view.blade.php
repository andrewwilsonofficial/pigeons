@extends('layouts.master')
@section('title', $pigeon->band)

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('View pigeon') }} - {{ $pigeon->band }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $pigeon->band }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button class="btn btn-info">
                                    {{ __('Videos & images') }}
                                    <i class="fa fa-image"></i>
                                </button>
                                <button class="btn btn-primary">
                                    {{ __('Pedigree') }}
                                    <i class="fa fa-tree"></i>
                                </button>
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
                                        <textarea class="form-control" readonly>{{ $pigeon->notes }}</textarea>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <h4>
                                            {{ $pigeon->band }}
                                        </h4>
                                        <p>
                                            {{ __('Pigeon unique ID') }}: {{ $pigeon->id }}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="onoffswitch2 mt-1">
                                                    <input type="checkbox" name="is_public" id="is_public"
                                                        class="onoffswitch2-checkbox"
                                                        {{ $pigeon->is_public ? 'checked' : '' }}>
                                                    <label for="is_public" class="onoffswitch2-label"></label>
                                                </p>
                                            </div>
                                            <div class="col-md-9">
                                                <label
                                                    class="form-check-label {{ $pigeon->is_public ? 'text-success' : 'text-danger' }}"
                                                    for="is_public">
                                                    {{ __('Viewable by the public') }}
                                                </label>
                                            </div>
                                            <form action="{{ route('pigeons.update', $pigeon->id) }}" method="POST"
                                                id="is_public_form">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="is_public"
                                                    value="{{ $pigeon->is_public ? 0 : 1 }}">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12 text-center">
                                <img src="{{ $pigeon->qr_code }}" alt="{{ $pigeon->band }}" class="img-fluid">
                                <a href="{{ $pigeon->qr_code }}" download="{{ $pigeon->band }} - {{ $pigeon->id }}.png"
                                    class="btn btn-primary mt-2">
                                    {{ __('Download QR code') }}
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12- text-center">
                                <img src="{{ asset('assets/images/' . $pigeon->cover) }}" width="300" alt="image"
                                    class="img-fluid">
                            </div>
                            <div class="col-12- text-center">
                                <h2>
                                    {{ __('Information') }}
                                </h2>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary">
                                    {{ __('Edit pigeon') }}
                                    <i class="fa fa-edit"></i>
                                </button>
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
                                            <strong>{{ __('Sire') }}:</strong> {{ $pigeon->sire->name }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Sire band') }}:</strong> {{ $pigeon->sire->band }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Dam') }}:</strong> {{ $pigeon->dam->name }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Dam band') }}:</strong> {{ $pigeon->dam->band }}
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
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addComment">
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
                                                    @foreach ($pigeon->comments as $comment)
                                                        <tr>
                                                            <td>{{ $comment->comment }}</td>
                                                            <td>{{ $comment->created_at }}</td>
                                                            <td>
                                                                <button class="btn btn-primary">
                                                                    {{ __('Edit') }}
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            {{ __('Race history') }}
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="races-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Name') }}</th>
                                                        <th>{{ __('Date') }}</th>
                                                        <th>{{ __('Distance') }}</th>
                                                        <th>{{ __('Total birds') }}</th>
                                                        <th>{{ __('Total entered') }}</th>
                                                        <th>{{ __('Arrived?') }}</th>
                                                        <th>{{ __('Place') }}</th>
                                                        <th>{{ __('Avg speed') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ([] as $race)
                                                        <tr>
                                                            <td>{{ $race->name }}</td>
                                                            <td>{{ $race->date }}</td>
                                                            <td>{{ $race->distance }}</td>
                                                            <td>{{ $race->total_birds }}</td>
                                                            <td>{{ $race->total_entered }}</td>
                                                            <td>{{ $race->arrived }}</td>
                                                            <td>{{ $race->place }}</td>
                                                            <td>{{ $race->avg_speed }}</td>
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
                                            {{ __('Medical history') }}
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="medical-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Date') }}</th>
                                                        <th>{{ __('Name') }}</th>
                                                        <th>{{ __('Dosage') }}</th>
                                                        <th>{{ __('Comment') }}</th>
                                                        <th>{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ([] as $medical)
                                                        <tr>
                                                            <td>{{ $medical->date }}</td>
                                                            <td>{{ $medical->name }}</td>
                                                            <td>{{ $medical->dosage }}</td>
                                                            <td>{{ $medical->comment }}</td>
                                                            <td>{{ $medical->action }}</td>
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
                                            {{ __('Related pigeons') }}
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="accordion" id="accordionChildren">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingChildren">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseChildren"
                                                        aria-expanded="false" aria-controls="collapseChildren">
                                                        {{ __('Children') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseChildren" class="accordion-collapse collapse"
                                                    aria-labelledby="headingChildren" data-bs-parent="#accordionChildren">
                                                    <div class="accordion-body">
                                                        {{ __('No data available ') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFullSiblings">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFullSiblings"
                                                        aria-expanded="false" aria-controls="collapseFullSiblings">
                                                        {{ __('Full Siblings') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseFullSiblings" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFullSiblings"
                                                    data-bs-parent="#accordionChildren">
                                                    <div class="accordion-body">
                                                        {{ __('No data available ') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingHalfSiblingsSire">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseHalfSiblingsSire" aria-expanded="false"
                                                        aria-controls="collapseHalfSiblingsSire">
                                                        {{ __('Half Siblings By Sire Only') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseHalfSiblingsSire" class="accordion-collapse collapse"
                                                    aria-labelledby="headingHalfSiblingsSire"
                                                    data-bs-parent="#accordionChildren">
                                                    <div class="accordion-body">
                                                        {{ __('No data available ') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingHalfSiblingsDam">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseHalfSiblingsDam" aria-expanded="false"
                                                        aria-controls="collapseHalfSiblingsDam">
                                                        {{ __('Half Siblings By Dam Only') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseHalfSiblingsDam" class="accordion-collapse collapse"
                                                    aria-labelledby="headingHalfSiblingsDam"
                                                    data-bs-parent="#accordionChildren">
                                                    <div class="accordion-body">
                                                        {{ __('No data available ') }}
                                                    </div>
                                                </div>
                                            </div>
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
    <div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="addCommentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('comments.store', ['id' => $pigeon->id, 'type' => 'pigeon']) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCommentLabel">{{ __('Add comment') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="comment">{{ __('Comment') }}</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"
                                placeholder="{{ __('Enter comment') }}"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('Close') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add comment') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

            $('#medical-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });

            $('#is_public').change(function() {
                $('#is_public_form').submit();
            });
        });
    </script>
@endpush
