<div class="container">
    <h2>Create comments</h2>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="short_id" class="form-label">short_id</label>
            <input type="text" class="form-control" name="short_id" value="{{old("short_id")}}">
            @error("short_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id")}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="parent_id" class="form-label">parent_id</label>
            <input type="text" class="form-control" name="parent_id" value="{{old("parent_id")}}">
            @error("parent_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="body" class="form-label">body</label>
            <input type="text" class="form-control" name="body" value="{{old("body")}}">
            @error("body")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="media_url" class="form-label">media_url</label>
            <input type="text" class="form-control" name="media_url" value="{{old("media_url")}}">
            @error("media_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="likes_count" class="form-label">likes_count</label>
            <input type="text" class="form-control" name="likes_count" value="{{old("likes_count")}}">
            @error("likes_count")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="replies_count" class="form-label">replies_count</label>
            <input type="text" class="form-control" name="replies_count" value="{{old("replies_count")}}">
            @error("replies_count")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_edited" class="form-label">is_edited</label>
            <input type="text" class="form-control" name="is_edited" value="{{old("is_edited")}}">
            @error("is_edited")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status")}}">
            @error("status")
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