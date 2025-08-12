<div class="container">
    <h2>Edit subtitle</h2>
    <form action="{{ route('subtitles.update', $subtitle->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="language_name" class="form-label">language_name</label>
            <input type="text" class="form-control" name="language_name" value="{{old("language_name", $subtitle["language_name"])}}">
            @error("language_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control" name="url" value="{{old("url", $subtitle["url"])}}">
            @error("url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="subtitable_type" class="form-label">subtitable_type</label>
            <input type="text" class="form-control" name="subtitable_type" value="{{old("subtitable_type", $subtitle["subtitable_type"])}}">
            @error("subtitable_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="subtitable_id" class="form-label">subtitable_id</label>
            <input type="text" class="form-control" name="subtitable_id" value="{{old("subtitable_id", $subtitle["subtitable_id"])}}">
            @error("subtitable_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="default" class="form-label">default</label>
            <input type="text" class="form-control" name="default" value="{{old("default", $subtitle["default"])}}">
            @error("default")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>