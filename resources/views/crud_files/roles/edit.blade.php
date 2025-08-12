<div class="container">
    <h2>Edit role</h2>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $role["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" name="title" value="{{old("title", $role["title"])}}">
            @error("title")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="guard_name" class="form-label">guard_name</label>
            <input type="text" class="form-control" name="guard_name" value="{{old("guard_name", $role["guard_name"])}}">
            @error("guard_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_fixed" class="form-label">is_fixed</label>
            <input type="text" class="form-control" name="is_fixed" value="{{old("is_fixed", $role["is_fixed"])}}">
            @error("is_fixed")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>