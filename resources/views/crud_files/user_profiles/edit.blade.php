<div class="container">
    <h2>Edit userProfile</h2>
    <form action="{{ route('user_profiles.update', $userProfile->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="about_self" class="form-label">about_self</label>
            <input type="text" class="form-control" name="about_self" value="{{old("about_self", $userProfile["about_self"])}}">
            @error("about_self")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="expert" class="form-label">expert</label>
            <input type="text" class="form-control" name="expert" value="{{old("expert", $userProfile["expert"])}}">
            @error("expert")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="facebook_link" class="form-label">facebook_link</label>
            <input type="text" class="form-control" name="facebook_link" value="{{old("facebook_link", $userProfile["facebook_link"])}}">
            @error("facebook_link")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="instagram_link" class="form-label">instagram_link</label>
            <input type="text" class="form-control" name="instagram_link" value="{{old("instagram_link", $userProfile["instagram_link"])}}">
            @error("instagram_link")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="twitter_link" class="form-label">twitter_link</label>
            <input type="text" class="form-control" name="twitter_link" value="{{old("twitter_link", $userProfile["twitter_link"])}}">
            @error("twitter_link")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="dribbble_link" class="form-label">dribbble_link</label>
            <input type="text" class="form-control" name="dribbble_link" value="{{old("dribbble_link", $userProfile["dribbble_link"])}}">
            @error("dribbble_link")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $userProfile["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $userProfile["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>