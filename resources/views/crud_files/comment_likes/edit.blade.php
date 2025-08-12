<div class="container">
    <h2>Edit commentLike</h2>
    <form action="{{ route('comment_likes.update', $commentLike->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="comment_id" class="form-label">comment_id</label>
            <input type="text" class="form-control" name="comment_id" value="{{old("comment_id", $commentLike["comment_id"])}}">
            @error("comment_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $commentLike["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>