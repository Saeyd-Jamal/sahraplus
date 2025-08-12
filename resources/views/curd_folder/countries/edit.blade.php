<div class="container">
    <h2>Edit country</h2>
    <form action="{{ route('countries.update', $country->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="code" class="form-label">code</label>
            <input type="text" class="form-control" name="code" value="{{old("code", $country["code"])}}">
            @error("code")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $country["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="dial_code" class="form-label">dial_code</label>
            <input type="text" class="form-control" name="dial_code" value="{{old("dial_code", $country["dial_code"])}}">
            @error("dial_code")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="currency_name" class="form-label">currency_name</label>
            <input type="text" class="form-control" name="currency_name" value="{{old("currency_name", $country["currency_name"])}}">
            @error("currency_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="symbol" class="form-label">symbol</label>
            <input type="text" class="form-control" name="symbol" value="{{old("symbol", $country["symbol"])}}">
            @error("symbol")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="currency_code" class="form-label">currency_code</label>
            <input type="text" class="form-control" name="currency_code" value="{{old("currency_code", $country["currency_code"])}}">
            @error("currency_code")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status", $country["status"])}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $country["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $country["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $country["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $country["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>