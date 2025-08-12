<div class="container">
    <h2>Edit personalAccessToken</h2>
    <form action="{{ route('personal_access_tokens.update', $personalAccessToken->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="tokenable_type" class="form-label">tokenable_type</label>
            <input type="text" class="form-control" name="tokenable_type" value="{{old("tokenable_type", $personalAccessToken["tokenable_type"])}}">
            @error("tokenable_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="tokenable_id" class="form-label">tokenable_id</label>
            <input type="text" class="form-control" name="tokenable_id" value="{{old("tokenable_id", $personalAccessToken["tokenable_id"])}}">
            @error("tokenable_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $personalAccessToken["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="token" class="form-label">token</label>
            <input type="text" class="form-control" name="token" value="{{old("token", $personalAccessToken["token"])}}">
            @error("token")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="abilities" class="form-label">abilities</label>
            <input type="text" class="form-control" name="abilities" value="{{old("abilities", $personalAccessToken["abilities"])}}">
            @error("abilities")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="last_used_at" class="form-label">last_used_at</label>
            <input type="text" class="form-control" name="last_used_at" value="{{old("last_used_at", $personalAccessToken["last_used_at"])}}">
            @error("last_used_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="expires_at" class="form-label">expires_at</label>
            <input type="text" class="form-control" name="expires_at" value="{{old("expires_at", $personalAccessToken["expires_at"])}}">
            @error("expires_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>