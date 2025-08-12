<div class="container">
    <h2>Create live_tv_stream_content_mappings</h2>
    <form action="{{ route('live_tv_stream_content_mappings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tv_channel_id" class="form-label">tv_channel_id</label>
            <input type="text" class="form-control" name="tv_channel_id" value="{{old("tv_channel_id")}}">
            @error("tv_channel_id")
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
            <label for="stream_type" class="form-label">stream_type</label>
            <input type="text" class="form-control" name="stream_type" value="{{old("stream_type")}}">
            @error("stream_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="embedded" class="form-label">embedded</label>
            <input type="text" class="form-control" name="embedded" value="{{old("embedded")}}">
            @error("embedded")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="server_url" class="form-label">server_url</label>
            <input type="text" class="form-control" name="server_url" value="{{old("server_url")}}">
            @error("server_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="server_url1" class="form-label">server_url1</label>
            <input type="text" class="form-control" name="server_url1" value="{{old("server_url1")}}">
            @error("server_url1")
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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>