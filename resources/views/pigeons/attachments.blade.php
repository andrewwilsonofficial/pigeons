@extends('layouts.master')
@section('title', __('Videos & images') . ' - ' . $pigeon->band)

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Videos & images') }} - {{ $pigeon->band }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-12 text-center">
                <h4>
                    {{ __('Allowed formats: jpg, png, mp4, mov') }}
                </h4>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-0">
                            <input id="attachments" type="file" name="files" accept=".jpg, .png, .mp4, .mov, image/jpeg, image/png, video/mp4, video/quicktime" multiple>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row" id="attachment-container">
                    @foreach ($attachments as $attachment)
                        <x-pigeons.attachment :attachment="$attachment" />
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection

@push('plugin-scripts')
    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script>
        $(function() {
            $('#attachments').FancyFileUpload({
                url: '{{ route('pigeons.updateAttachments', $pigeon->id) }}',
                params: {
                    pigeon_id: '{{ $pigeon->id }}',
                    _token: '{{ csrf_token() }}'
                },
                maxfilesize: 70 * 1024 * 1024,
                added: function(e, data) {
                    this.find('.ff_fileupload_actions button.ff_fileupload_start_upload').click();
                },
                uploadcompleted: function(e, data) {
                    data.ff_info.RemoveFile();
                    $('#attachment-container').append(data.result.element);
                },
            });
        });
    </script>
@endpush
