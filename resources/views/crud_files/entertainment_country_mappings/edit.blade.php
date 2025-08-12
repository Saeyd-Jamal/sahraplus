<div class="container">
    <h2>Edit entertainmentCountryMapping</h2>
    <form action="{{ route('entertainment_country_mappings.update', $entertainmentCountryMapping->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="entertainment_id" class="form-label">entertainment_id</label>
            <input type="text" class="form-control" name="entertainment_id" value="{{old("entertainment_id", $entertainmentCountryMapping["entertainment_id"])}}">
            @error("entertainment_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="country_id" class="form-label">country_id</label>
            <input type="text" class="form-control" name="country_id" value="{{old("country_id", $entertainmentCountryMapping["country_id"])}}">
            @error("country_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $entertainmentCountryMapping["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $entertainmentCountryMapping["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $entertainmentCountryMapping["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $entertainmentCountryMapping["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>