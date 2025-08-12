<div class="container">
    <h2>Create subtitles</h2>
    <form action="{{ route('subtitles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="language_name" class="form-label">language_name</label>
            <input type="text" class="form-control" name="language_name" value="{{old("language_name")}}">
            @error("language_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control" name="url" value="{{old("url")}}">
            @error("url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="subtitable_type" class="form-label">subtitable_type</label>
            <input type="text" class="form-control" name="subtitable_type" value="{{old("subtitable_type")}}">
            @error("subtitable_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="subtitable_id" class="form-label">subtitable_id</label>
            <input type="text" class="form-control" name="subtitable_id" value="{{old("subtitable_id")}}">
            @error("subtitable_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="default" class="form-label">default</label>
            <input type="text" class="form-control" name="default" value="{{old("default")}}">
            @error("default")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>