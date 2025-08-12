<div class="container">
    <h2>Create currencies</h2>
    <form action="{{ route('currencies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="currency_name" class="form-label">currency_name</label>
            <input type="text" class="form-control" name="currency_name" value="{{old("currency_name")}}">
            @error("currency_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="currency_symbol" class="form-label">currency_symbol</label>
            <input type="text" class="form-control" name="currency_symbol" value="{{old("currency_symbol")}}">
            @error("currency_symbol")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="currency_code" class="form-label">currency_code</label>
            <input type="text" class="form-control" name="currency_code" value="{{old("currency_code")}}">
            @error("currency_code")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_primary" class="form-label">is_primary</label>
            <input type="text" class="form-control" name="is_primary" value="{{old("is_primary")}}">
            @error("is_primary")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="currency_position" class="form-label">currency_position</label>
            <input type="text" class="form-control" name="currency_position" value="{{old("currency_position")}}">
            @error("currency_position")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="no_of_decimal" class="form-label">no_of_decimal</label>
            <input type="text" class="form-control" name="no_of_decimal" value="{{old("no_of_decimal")}}">
            @error("no_of_decimal")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="thousand_separator" class="form-label">thousand_separator</label>
            <input type="text" class="form-control" name="thousand_separator" value="{{old("thousand_separator")}}">
            @error("thousand_separator")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="decimal_separator" class="form-label">decimal_separator</label>
            <input type="text" class="form-control" name="decimal_separator" value="{{old("decimal_separator")}}">
            @error("decimal_separator")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by")}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by")}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by")}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at")}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>