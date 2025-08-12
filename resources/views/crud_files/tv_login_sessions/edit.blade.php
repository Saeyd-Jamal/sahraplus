<div class="container">
    <h2>Edit tvLoginSession</h2>
    <form action="{{ route('tv_login_sessions.update', $tvLoginSession->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="session_id" class="form-label">session_id</label>
            <input type="text" class="form-control" name="session_id" value="{{old("session_id", $tvLoginSession["session_id"])}}">
            @error("session_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $tvLoginSession["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="confirmed_at" class="form-label">confirmed_at</label>
            <input type="text" class="form-control" name="confirmed_at" value="{{old("confirmed_at", $tvLoginSession["confirmed_at"])}}">
            @error("confirmed_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="expires_at" class="form-label">expires_at</label>
            <input type="text" class="form-control" name="expires_at" value="{{old("expires_at", $tvLoginSession["expires_at"])}}">
            @error("expires_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>