<div class="container">
    <h2>Edit videoStreamContentMapping</h2>
    <form action="{{ route('video_stream_content_mappings.update', $videoStreamContentMapping->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="video_id" class="form-label">video_id</label>
            <input type="text" class="form-control" name="video_id" value="{{old("video_id", $videoStreamContentMapping["video_id"])}}">
            @error("video_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $videoStreamContentMapping["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="quality" class="form-label">quality</label>
            <input type="text" class="form-control" name="quality" value="{{old("quality", $videoStreamContentMapping["quality"])}}">
            @error("quality")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control" name="url" value="{{old("url", $videoStreamContentMapping["url"])}}">
            @error("url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $videoStreamContentMapping["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $videoStreamContentMapping["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $videoStreamContentMapping["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $videoStreamContentMapping["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>