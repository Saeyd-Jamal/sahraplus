<div class="container">
    <h2>Create banners</h2>
    <form action="{{ route('banners.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" name="title" value="{{old("title")}}">
            @error("title")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="file_url" class="form-label">file_url</label>
            <input type="text" class="form-control" name="file_url" value="{{old("file_url")}}">
            @error("file_url")
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
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type")}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type_id" class="form-label">type_id</label>
            <input type="text" class="form-control" name="type_id" value="{{old("type_id")}}">
            @error("type_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type_name" class="form-label">type_name</label>
            <input type="text" class="form-control" name="type_name" value="{{old("type_name")}}">
            @error("type_name")
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
            <label for="banner_for" class="form-label">banner_for</label>
            <input type="text" class="form-control" name="banner_for" value="{{old("banner_for")}}">
            @error("banner_for")
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