<div class="container">
    <h2>Create watch_histories</h2>
    <form action="{{ route('watch_histories.store') }}" method="POST">
        @csrf
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
            <label for="watchable_type" class="form-label">watchable_type</label>
            <input type="text" class="form-control" name="watchable_type" value="{{old("watchable_type")}}">
            @error("watchable_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="watchable_id" class="form-label">watchable_id</label>
            <input type="text" class="form-control" name="watchable_id" value="{{old("watchable_id")}}">
            @error("watchable_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="duration_watched" class="form-label">duration_watched</label>
            <input type="text" class="form-control" name="duration_watched" value="{{old("duration_watched")}}">
            @error("duration_watched")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>