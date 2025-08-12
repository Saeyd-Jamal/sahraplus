<div class="container">
    <h2>Edit avatar</h2>
    <form action="{{ route('avatars.update', $avatar->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="text" class="form-control" name="image" value="{{old("image", $avatar["image"])}}">
            @error("image")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="guest" class="form-label">guest</label>
            <input type="text" class="form-control" name="guest" value="{{old("guest", $avatar["guest"])}}">
            @error("guest")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="child" class="form-label">child</label>
            <input type="text" class="form-control" name="child" value="{{old("child", $avatar["child"])}}">
            @error("child")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>