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
            <th class="wd-5p border-bottom-0">
                {{ __('Sex') }}
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
        @foreach ($pigeons as $pigeon)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('pigeons.view', ['pigeon' => $pigeon->id]) }}">
                        <img src="{{ $pigeon->cover }}" alt="image" class="img-fluid">
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
                <td class="text-center align-middle">
                    @if ($pigeon->sex == 'cock')
                        <img src="{{ asset('assets/images/male.png') }}" width="30" alt="male pigeon"
                            class="img-fluid mx-auto d-block">
                    @elseif ($pigeon->sex == 'hen')
                        <img src="{{ asset('assets/images/female.png') }}" width="30" alt="female pigeon"
                            class="img-fluid mx-auto d-block">
                    @else
                        <img src="{{ asset('assets/images/unknown-gender.webp') }}" width="30"
                            alt="unknown gender pigeon" class="img-fluid mx-auto d-block">
                    @endif
                </td>
                <td>{{ $pigeon->status }}</td>
                <td>
                    <a href="{{ route('pigeons.view', $pigeon->id) }}" class="btn btn-primary btn-sm" target="_blank">
                        {{ __('View') }}
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
