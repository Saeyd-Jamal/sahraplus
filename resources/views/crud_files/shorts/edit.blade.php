<div class="container">
    <h2>Edit short</h2>
    <form action="{{ route('shorts.update', $short->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" name="title" value="{{old("title", $short["title"])}}">
            @error("title")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{old("description", $short["description"])}}">
            @error("description")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="video_path" class="form-label">video_path</label>
            <input type="text" class="form-control" name="video_path" value="{{old("video_path", $short["video_path"])}}">
            @error("video_path")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="poster_path" class="form-label">poster_path</label>
            <input type="text" class="form-control" name="poster_path" value="{{old("poster_path", $short["poster_path"])}}">
            @error("poster_path")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="aspect_ratio" class="form-label">aspect_ratio</label>
            <input type="text" class="form-control" name="aspect_ratio" value="{{old("aspect_ratio", $short["aspect_ratio"])}}">
            @error("aspect_ratio")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="likes_count" class="form-label">likes_count</label>
            <input type="text" class="form-control" name="likes_count" value="{{old("likes_count", $short["likes_count"])}}">
            @error("likes_count")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="comments_count" class="form-label">comments_count</label>
            <input type="text" class="form-control" name="comments_count" value="{{old("comments_count", $short["comments_count"])}}">
            @error("comments_count")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="shares_count" class="form-label">shares_count</label>
            <input type="text" class="form-control" name="shares_count" value="{{old("shares_count", $short["shares_count"])}}">
            @error("shares_count")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="share_url" class="form-label">share_url</label>
            <input type="text" class="form-control" name="share_url" value="{{old("share_url", $short["share_url"])}}">
            @error("share_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_featured" class="form-label">is_featured</label>
            <input type="text" class="form-control" name="is_featured" value="{{old("is_featured", $short["is_featured"])}}">
            @error("is_featured")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status", $short["status"])}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>