<form action="{{ route('pigeons.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        @foreach ($errors->all() as $error)
            <div class="col-12 mb-1">
                <div class="alert alert-danger">{{ $error }}</div>
            </div>
        @endforeach
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="{{ __('Enter name') }}" value="{{ old('name') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="band">{{ __('Band') }}</label>
                <input type="text" class="form-control" id="band" name="band"
                    placeholder="{{ __('Enter band') }}" value="{{ old('band') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="second_band">{{ __('Second Band') }}</label>
                <input type="text" class="form-control" id="second_band" name="second_band"
                    placeholder="{{ __('Enter second band') }}" value="{{ old('second_band') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="color">{{ __('Color') }}</label>
                <input type="text" class="form-control" id="color" name="color"
                    placeholder="{{ __('Enter color') }}" value="{{ old('color') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="location">{{ __('Location') }}</label>
                <input type="text" class="form-control" id="location" name="location"
                    placeholder="{{ __('Enter location') }}" value="{{ old('location') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="family">{{ __('Family') }}</label>
                <input type="text" class="form-control" id="family" name="family"
                    placeholder="{{ __('Enter family') }}" value="{{ old('family') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="last_owner">{{ __('Last Owner') }}</label>
                <input type="text" class="form-control" id="last_owner" name="last_owner"
                    placeholder="{{ __('Enter last owner') }}" value="{{ old('last_owner') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="rating">{{ __('Rating') }}</label>
                <input type="number" class="form-control" id="rating" name="rating"
                    placeholder="{{ __('Enter rating') }}" value="{{ old('rating') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="eye">{{ __('Eye') }}</label>
            <select class="form-control" id="eye" name="eye">
                <option value="">{{ __('Select eye') }}</option>
                <option value="Orange" {{ old('eye') == 'Orange' ? 'selected' : '' }}>{{ __('Orange') }}</option>
                <option value="Yellow" {{ old('eye') == 'Yellow' ? 'selected' : '' }}>{{ __('Yellow') }}</option>
                <option value="Pearl" {{ old('eye') == 'Pearl' ? 'selected' : '' }}>{{ __('Pearl') }}</option>
                <option value="Bull" {{ old('eye') == 'Bull' ? 'selected' : '' }}>{{ __('Bull') }}</option>
            </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="markings">{{ __('Markings') }}</label>
                <input type="text" class="form-control" id="markings" name="markings"
                    placeholder="{{ __('Enter markings') }}" value="{{ old('markings') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">{{ __('Status') }}</label>
                <select class="form-control" id="status" name="status">
                    <option value="">{{ __('Select status') }}</option>
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                    <option value="Breeder" {{ old('status') == 'Breeder' ? 'selected' : '' }}>{{ __('Breeder') }}</option>
                    <option value="Lost" {{ old('status') == 'Lost' ? 'selected' : '' }}>{{ __('Lost') }}</option>
                    <option value="Sold" {{ old('status') == 'Sold' ? 'selected' : '' }}>{{ __('Sold') }}</option>
                    <option value="On Loan" {{ old('status') == 'On Loan' ? 'selected' : '' }}>{{ __('On Loan') }}</option>
                    <option value="Widow" {{ old('status') == 'Widow' ? 'selected' : '' }}>{{ __('Widow') }}</option>
                    <option value="Dead" {{ old('status') == 'Dead' ? 'selected' : '' }}>{{ __('Dead') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sex">{{ __('Sex') }}</label>
                <select class="form-control" id="sex" name="sex">
                    <option value="unknown" {{ old('sex') == 'unknown' ? 'selected' : '' }}>
                        {{ __('Unknown') }}</option>
                    <option value="cock" {{ old('sex') == 'cock' ? 'selected' : '' }}>
                        {{ __('Cock') }}</option>
                    <option value="hen" {{ old('sex') == 'hen' ? 'selected' : '' }}>
                        {{ __('Hen') }}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row" id="sire-dam-container">
        <div class="col-md-6 col-12">
            <label for="sire">
                {{ __('Sire') }}
            </label>
            <select class="form-control select2-show-search" data-placeholder="{{ __('Choose sire') }}"
                id="sire" name="sire_id">
                <option value="">{{ __('Select sire') }}</option>
                @foreach ($sires as $sire)
                    <option value="{{ $sire->id }}" {{ old('sire') == $sire->id ? 'selected' : '' }}>
                        {{ $sire->band }} - {{ $sire->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-12">
            <label for="dam">
                {{ __('Dam') }}
            </label>
            <select class="form-control select2-show-search" data-placeholder="{{ __('Choose dam') }}"
                id="dam" name="dam_id">
                <option value="">{{ __('Select dam') }}</option>
                @foreach ($dams as $dam)
                    <option value="{{ $dam->id }}" {{ old('dam') == $dam->id ? 'selected' : '' }}>
                        {{ $dam->band }} - {{ $dam->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="notes">{{ __('Notes') }}</label>
                <textarea class="form-control" id="notes" name="notes" placeholder="{{ __('Enter notes') }}">{{ old('notes') }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="date_hatched">{{ __('Date Hatched') }}</label>
                <input type="date" class="form-control" id="date_hatched" name="date_hatched"
                    value="{{ old('date_hatched') }}">
            </div>
        </div>
    </div>
    <input type="hidden" name="pair_id" id="pair_id">
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
</form>
