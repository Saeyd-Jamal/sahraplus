<div class="container">
    <h2>Edit userMultiProfile</h2>
    <form action="{{ route('user_multi_profiles.update', $userMultiProfile->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $userMultiProfile["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $userMultiProfile["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="avatar" class="form-label">avatar</label>
            <input type="text" class="form-control" name="avatar" value="{{old("avatar", $userMultiProfile["avatar"])}}">
            @error("avatar")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_default" class="form-label">is_default</label>
            <input type="text" class="form-control" name="is_default" value="{{old("is_default", $userMultiProfile["is_default"])}}">
            @error("is_default")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_child_profile" class="form-label">is_child_profile</label>
            <input type="text" class="form-control" name="is_child_profile" value="{{old("is_child_profile", $userMultiProfile["is_child_profile"])}}">
            @error("is_child_profile")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $userMultiProfile["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $userMultiProfile["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $userMultiProfile["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $userMultiProfile["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>