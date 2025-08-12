<div class="container">
    <h2>Edit modelHasRole</h2>
    <form action="{{ route('model_has_roles.update', $modelHasRole->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="role_id" class="form-label">role_id</label>
            <input type="text" class="form-control" name="role_id" value="{{old("role_id", $modelHasRole["role_id"])}}">
            @error("role_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="model_type" class="form-label">model_type</label>
            <input type="text" class="form-control" name="model_type" value="{{old("model_type", $modelHasRole["model_type"])}}">
            @error("model_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="model_id" class="form-label">model_id</label>
            <input type="text" class="form-control" name="model_id" value="{{old("model_id", $modelHasRole["model_id"])}}">
            @error("model_id")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>