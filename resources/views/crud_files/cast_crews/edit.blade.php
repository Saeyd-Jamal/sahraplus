<div class="container">
    <h2>Edit castCrew</h2>
    <form action="{{ route('cast_crews.update', $castCrew->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $castCrew["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="file_url" class="form-label">file_url</label>
            <input type="text" class="form-control" name="file_url" value="{{old("file_url", $castCrew["file_url"])}}">
            @error("file_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $castCrew["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="tmdb_id" class="form-label">tmdb_id</label>
            <input type="text" class="form-control" name="tmdb_id" value="{{old("tmdb_id", $castCrew["tmdb_id"])}}">
            @error("tmdb_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="bio" class="form-label">bio</label>
            <input type="text" class="form-control" name="bio" value="{{old("bio", $castCrew["bio"])}}">
            @error("bio")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="place_of_birth" class="form-label">place_of_birth</label>
            <input type="text" class="form-control" name="place_of_birth" value="{{old("place_of_birth", $castCrew["place_of_birth"])}}">
            @error("place_of_birth")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="dob" class="form-label">dob</label>
            <input type="text" class="form-control" name="dob" value="{{old("dob", $castCrew["dob"])}}">
            @error("dob")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="designation" class="form-label">designation</label>
            <input type="text" class="form-control" name="designation" value="{{old("designation", $castCrew["designation"])}}">
            @error("designation")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $castCrew["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $castCrew["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $castCrew["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $castCrew["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>