<div class="container">
    <h2>Edit like</h2>
    <form action="{{ route('likes.update', $like->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="entertainment_id" class="form-label">entertainment_id</label>
            <input type="text" class="form-control" name="entertainment_id" value="{{old("entertainment_id", $like["entertainment_id"])}}">
            @error("entertainment_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $like["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_like" class="form-label">is_like</label>
            <input type="text" class="form-control" name="is_like" value="{{old("is_like", $like["is_like"])}}">
            @error("is_like")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="profile_id" class="form-label">profile_id</label>
            <input type="text" class="form-control" name="profile_id" value="{{old("profile_id", $like["profile_id"])}}">
            @error("profile_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $like["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $like["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $like["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $like["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $like["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>