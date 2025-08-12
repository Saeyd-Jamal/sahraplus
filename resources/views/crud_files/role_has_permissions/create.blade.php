<div class="container">
    <h2>Create role_has_permissions</h2>
    <form action="{{ route('role_has_permissions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="permission_id" class="form-label">permission_id</label>
            <input type="text" class="form-control" name="permission_id" value="{{old("permission_id")}}">
            @error("permission_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="role_id" class="form-label">role_id</label>
            <input type="text" class="form-control" name="role_id" value="{{old("role_id")}}">
            @error("role_id")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>