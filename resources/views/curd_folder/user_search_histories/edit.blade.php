<div class="container">
    <h2>Edit userSearchHistory</h2>
    <form action="{{ route('user_search_histories.update', $userSearchHistory->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $userSearchHistory["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="profile_id" class="form-label">profile_id</label>
            <input type="text" class="form-control" name="profile_id" value="{{old("profile_id", $userSearchHistory["profile_id"])}}">
            @error("profile_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="search_query" class="form-label">search_query</label>
            <input type="text" class="form-control" name="search_query" value="{{old("search_query", $userSearchHistory["search_query"])}}">
            @error("search_query")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="search_id" class="form-label">search_id</label>
            <input type="text" class="form-control" name="search_id" value="{{old("search_id", $userSearchHistory["search_id"])}}">
            @error("search_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $userSearchHistory["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>