<div class="container">
    <h2>Create sessions</h2>
    <form action="{{ route('sessions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">id</label>
            <input type="text" class="form-control" name="id" value="{{old("id")}}">
            @error("id")
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
            <label for="ip_address" class="form-label">ip_address</label>
            <input type="text" class="form-control" name="ip_address" value="{{old("ip_address")}}">
            @error("ip_address")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_agent" class="form-label">user_agent</label>
            <input type="text" class="form-control" name="user_agent" value="{{old("user_agent")}}">
            @error("user_agent")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="payload" class="form-label">payload</label>
            <input type="text" class="form-control" name="payload" value="{{old("payload")}}">
            @error("payload")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="last_activity" class="form-label">last_activity</label>
            <input type="text" class="form-control" name="last_activity" value="{{old("last_activity")}}">
            @error("last_activity")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>