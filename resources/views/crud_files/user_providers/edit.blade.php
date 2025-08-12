<div class="container">
    <h2>Edit userProvider</h2>
    <form action="{{ route('user_providers.update', $userProvider->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $userProvider["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="provider" class="form-label">provider</label>
            <input type="text" class="form-control" name="provider" value="{{old("provider", $userProvider["provider"])}}">
            @error("provider")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="provider_id" class="form-label">provider_id</label>
            <input type="text" class="form-control" name="provider_id" value="{{old("provider_id", $userProvider["provider_id"])}}">
            @error("provider_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="avatar" class="form-label">avatar</label>
            <input type="text" class="form-control" name="avatar" value="{{old("avatar", $userProvider["avatar"])}}">
            @error("avatar")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>