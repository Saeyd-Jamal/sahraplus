<div class="container">
    <h2>Edit mobileSetting</h2>
    <form action="{{ route('mobile_settings.update', $mobileSetting->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $mobileSetting["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" class="form-control" name="slug" value="{{old("slug", $mobileSetting["slug"])}}">
            @error("slug")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="position" class="form-label">position</label>
            <input type="text" class="form-control" name="position" value="{{old("position", $mobileSetting["position"])}}">
            @error("position")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="value" class="form-label">value</label>
            <input type="text" class="form-control" name="value" value="{{old("value", $mobileSetting["value"])}}">
            @error("value")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $mobileSetting["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>