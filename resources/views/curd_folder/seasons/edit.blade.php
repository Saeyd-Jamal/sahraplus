<div class="container">
    <h2>Edit season</h2>
    <form action="{{ route('seasons.update', $season->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="tmdb_id" class="form-label">tmdb_id</label>
            <input type="text" class="form-control" name="tmdb_id" value="{{old("tmdb_id", $season["tmdb_id"])}}">
            @error("tmdb_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="season_index" class="form-label">season_index</label>
            <input type="text" class="form-control" name="season_index" value="{{old("season_index", $season["season_index"])}}">
            @error("season_index")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $season["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="poster_url" class="form-label">poster_url</label>
            <input type="text" class="form-control" name="poster_url" value="{{old("poster_url", $season["poster_url"])}}">
            @error("poster_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="entertainment_id" class="form-label">entertainment_id</label>
            <input type="text" class="form-control" name="entertainment_id" value="{{old("entertainment_id", $season["entertainment_id"])}}">
            @error("entertainment_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="trailer_url_type" class="form-label">trailer_url_type</label>
            <input type="text" class="form-control" name="trailer_url_type" value="{{old("trailer_url_type", $season["trailer_url_type"])}}">
            @error("trailer_url_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="trailer_url" class="form-label">trailer_url</label>
            <input type="text" class="form-control" name="trailer_url" value="{{old("trailer_url", $season["trailer_url"])}}">
            @error("trailer_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="access" class="form-label">access</label>
            <input type="text" class="form-control" name="access" value="{{old("access", $season["access"])}}">
            @error("access")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status", $season["status"])}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="plan_id" class="form-label">plan_id</label>
            <input type="text" class="form-control" name="plan_id" value="{{old("plan_id", $season["plan_id"])}}">
            @error("plan_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="short_desc" class="form-label">short_desc</label>
            <input type="text" class="form-control" name="short_desc" value="{{old("short_desc", $season["short_desc"])}}">
            @error("short_desc")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{old("description", $season["description"])}}">
            @error("description")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $season["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $season["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $season["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $season["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="poster_tv_url" class="form-label">poster_tv_url</label>
            <input type="text" class="form-control" name="poster_tv_url" value="{{old("poster_tv_url", $season["poster_tv_url"])}}">
            @error("poster_tv_url")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>