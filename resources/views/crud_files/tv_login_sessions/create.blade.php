<div class="container">
    <h2>Create tv_login_sessions</h2>
    <form action="{{ route('tv_login_sessions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="session_id" class="form-label">session_id</label>
            <input type="text" class="form-control" name="session_id" value="{{old("session_id")}}">
            @error("session_id")
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
            <label for="confirmed_at" class="form-label">confirmed_at</label>
            <input type="text" class="form-control" name="confirmed_at" value="{{old("confirmed_at")}}">
            @error("confirmed_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="expires_at" class="form-label">expires_at</label>
            <input type="text" class="form-control" name="expires_at" value="{{old("expires_at")}}">
            @error("expires_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>