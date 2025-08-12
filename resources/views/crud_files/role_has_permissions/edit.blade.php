<div class="container">
    <h2>Edit roleHasPermission</h2>
    <form action="{{ route('role_has_permissions.update', $roleHasPermission->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="permission_id" class="form-label">permission_id</label>
            <input type="text" class="form-control" name="permission_id" value="{{old("permission_id", $roleHasPermission["permission_id"])}}">
            @error("permission_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="role_id" class="form-label">role_id</label>
            <input type="text" class="form-control" name="role_id" value="{{old("role_id", $roleHasPermission["role_id"])}}">
            @error("role_id")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>