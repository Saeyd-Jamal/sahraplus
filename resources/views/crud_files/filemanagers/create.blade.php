<div class="container">
    <h2>Create filemanagers</h2>
    <form action="{{ route('filemanagers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="file_url" class="form-label">file_url</label>
            <input type="text" class="form-control" name="file_url" value="{{old("file_url")}}">
            @error("file_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="file_name" class="form-label">file_name</label>
            <input type="text" class="form-control" name="file_name" value="{{old("file_name")}}">
            @error("file_name")
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