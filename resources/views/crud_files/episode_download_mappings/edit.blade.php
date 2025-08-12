<div class="container">
    <h2>Edit episodeDownloadMapping</h2>
    <form action="{{ route('episode_download_mappings.update', $episodeDownloadMapping->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="episode_id" class="form-label">episode_id</label>
            <input type="text" class="form-control" name="episode_id" value="{{old("episode_id", $episodeDownloadMapping["episode_id"])}}">
            @error("episode_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $episodeDownloadMapping["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="quality" class="form-label">quality</label>
            <input type="text" class="form-control" name="quality" value="{{old("quality", $episodeDownloadMapping["quality"])}}">
            @error("quality")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control" name="url" value="{{old("url", $episodeDownloadMapping["url"])}}">
            @error("url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $episodeDownloadMapping["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $episodeDownloadMapping["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $episodeDownloadMapping["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $episodeDownloadMapping["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>