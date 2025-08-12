<div class="container">
    <h2>Create avatars</h2>
    <form action="{{ route('avatars.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="text" class="form-control" name="image" value="{{old("image")}}">
            @error("image")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="guest" class="form-label">guest</label>
            <input type="text" class="form-control" name="guest" value="{{old("guest")}}">
            @error("guest")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="child" class="form-label">child</label>
            <input type="text" class="form-control" name="child" value="{{old("child")}}">
            @error("child")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>