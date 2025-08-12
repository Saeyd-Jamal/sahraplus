<div class="container">
    <h2>Edit modelHasPermission</h2>
    <form action="{{ route('model_has_permissions.update', $modelHasPermission->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="permission_id" class="form-label">permission_id</label>
            <input type="text" class="form-control" name="permission_id" value="{{old("permission_id", $modelHasPermission["permission_id"])}}">
            @error("permission_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="model_type" class="form-label">model_type</label>
            <input type="text" class="form-control" name="model_type" value="{{old("model_type", $modelHasPermission["model_type"])}}">
            @error("model_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="model_id" class="form-label">model_id</label>
            <input type="text" class="form-control" name="model_id" value="{{old("model_id", $modelHasPermission["model_id"])}}">
            @error("model_id")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>