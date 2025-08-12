<div class="container">
    <h2>Create live_tv_channels</h2>
    <form action="{{ route('live_tv_channels.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name")}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="poster_url" class="form-label">poster_url</label>
            <input type="text" class="form-control" name="poster_url" value="{{old("poster_url")}}">
            @error("poster_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="category_id" class="form-label">category_id</label>
            <input type="text" class="form-control" name="category_id" value="{{old("category_id")}}">
            @error("category_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="thumb_url" class="form-label">thumb_url</label>
            <input type="text" class="form-control" name="thumb_url" value="{{old("thumb_url")}}">
            @error("thumb_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="access" class="form-label">access</label>
            <input type="text" class="form-control" name="access" value="{{old("access")}}">
            @error("access")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="plan_id" class="form-label">plan_id</label>
            <input type="text" class="form-control" name="plan_id" value="{{old("plan_id")}}">
            @error("plan_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{old("description")}}">
            @error("description")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status")}}">
            @error("status")
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
            <label for="poster_tv_url" class="form-label">poster_tv_url</label>
            <input type="text" class="form-control" name="poster_tv_url" value="{{old("poster_tv_url")}}">
            @error("poster_tv_url")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>