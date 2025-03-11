@extends('layouts.master')
@section('title', __('Subscriptions'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Subscriptions') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-12 text-center mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSubscriptionModal">
                    {{ __('Create new subscription') }}
                </button>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('New subscription requests') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom"
                                id="subscription-requests-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-5p border-bottom-0">
                                            #
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Plan') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('User') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Start/End Date') }}
                                        </th>
                                        <th class="wd-5p border-bottom-0">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscription_requests as $subscription_request)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $subscription_request->plan->name }}</td>
                                            <td>{{ $subscription_request->user->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($subscription_request->start_date)->format('Y-m-d') }}
                                                /
                                                {{ \Carbon\Carbon::parse($subscription_request->end_date)->format('Y-m-d') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.subscription-requests.view', $subscription_request->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <form
                                                    action="{{ route('admin.subscription-requests.destroy', $subscription_request->id) }}"
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Subscriptions') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="subscriptions-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-5p border-bottom-0">
                                            #
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Plan') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('User') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Start/End Date') }}
                                        </th>
                                        <th class="wd-10p border-bottom-0">
                                            {{ __('Status') }}
                                        </th>
                                        <th class="wd-5p border-bottom-0">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscription_logs as $subscription)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $subscription->plan->name }}</td>
                                            <td>{{ $subscription->user->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($subscription->start_date)->format('Y-m-d') }} /
                                                {{ \Carbon\Carbon::parse($subscription->end_date)->format('Y-m-d') }}</td>
                                            <td>
                                                @if ($subscription->end_date >= now())
                                                    <span class="badge bg-success">{{ __('Active') }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('admin.subscriptions.destroy', $subscription->id) }}"
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
    <div class="modal" id="createSubscriptionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create new subscription') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.subscriptions.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        <div class="mb-3">
                            <label for="plan">{{ __('Plan') }}</label>
                            <select name="plan_id" id="plan" class="form-control" required>
                                <option value="" selected disabled>
                                    {{ __('Select Plan') }}
                                </option>
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="user">{{ __('User') }}</label>
                            <select name="user_id" id="user" class="form-control" required>
                                <option value="" selected disabled>
                                    {{ __('Select User') }}
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_date">{{ __('Start Date') }}</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date">{{ __('End Date') }}</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date">{{ __('Price') }}</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('Close') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </form>
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
            $('#subscriptions-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });

            $('#subscription-requests-datatable').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });

            @if ($errors->any())
                $('#createSubscriptionModal').modal('show');
            @endif
        });
    </script>
@endpush
