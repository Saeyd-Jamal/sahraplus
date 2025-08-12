<div class="container">
    <h2>Edit language</h2>
    <form action="{{ route('languages.update', $language->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="key" class="form-label">key</label>
            <input type="text" class="form-control" name="key" value="{{old("key", $language["key"])}}">
            @error("key")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="value" class="form-label">value</label>
            <input type="text" class="form-control" name="value" value="{{old("value", $language["value"])}}">
            @error("value")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="language" class="form-label">language</label>
            <input type="text" class="form-control" name="language" value="{{old("language", $language["language"])}}">
            @error("language")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="file" class="form-label">file</label>
            <input type="text" class="form-control" name="file" value="{{old("file", $language["file"])}}">
            @error("file")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $language["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $language["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $language["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $language["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>