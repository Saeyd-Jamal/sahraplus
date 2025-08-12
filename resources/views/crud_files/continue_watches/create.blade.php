<div class="container">
    <h2>Create continue_watches</h2>
    <form action="{{ route('continue_watches.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="entertainment_id" class="form-label">entertainment_id</label>
            <input type="text" class="form-control" name="entertainment_id" value="{{old("entertainment_id")}}">
            @error("entertainment_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id")}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="profile_id" class="form-label">profile_id</label>
            <input type="text" class="form-control" name="profile_id" value="{{old("profile_id")}}">
            @error("profile_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="entertainment_type" class="form-label">entertainment_type</label>
            <input type="text" class="form-control" name="entertainment_type" value="{{old("entertainment_type")}}">
            @error("entertainment_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="watched_time" class="form-label">watched_time</label>
            <input type="text" class="form-control" name="watched_time" value="{{old("watched_time")}}">
            @error("watched_time")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="total_watched_time" class="form-label">total_watched_time</label>
            <input type="text" class="form-control" name="total_watched_time" value="{{old("total_watched_time")}}">
            @error("total_watched_time")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by")}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by")}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by")}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at")}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="episode_id" class="form-label">episode_id</label>
            <input type="text" class="form-control" name="episode_id" value="{{old("episode_id")}}">
            @error("episode_id")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>