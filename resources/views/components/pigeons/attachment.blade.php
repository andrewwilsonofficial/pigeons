<div class="col-lg-3">
    <div class="card">
        <a href="{{ asset('attachments/' . $attachment->filename) }}" target="_blank">
            <img src="{{ route('pigeons.attachmentCover', $attachment->id) }}" class="img-fluid" alt="image">
        </a>
        <form action="{{ route('pigeons.deleteAttachment', $attachment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </div>
</div>
