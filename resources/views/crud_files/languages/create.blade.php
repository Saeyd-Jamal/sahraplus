<div class="container">
    <h2>Create languages</h2>
    <form action="{{ route('languages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="key" class="form-label">key</label>
            <input type="text" class="form-control" name="key" value="{{old("key")}}">
            @error("key")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="value" class="form-label">value</label>
            <input type="text" class="form-control" name="value" value="{{old("value")}}">
            @error("value")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="language" class="form-label">language</label>
            <input type="text" class="form-control" name="language" value="{{old("language")}}">
            @error("language")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="file" class="form-label">file</label>
            <input type="text" class="form-control" name="file" value="{{old("file")}}">
            @error("file")
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