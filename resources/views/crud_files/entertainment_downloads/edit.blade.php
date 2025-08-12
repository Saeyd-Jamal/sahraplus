<div class="container">
    <h2>Edit entertainmentDownload</h2>
    <form action="{{ route('entertainment_downloads.update', $entertainmentDownload->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="entertainment_id" class="form-label">entertainment_id</label>
            <input type="text" class="form-control" name="entertainment_id" value="{{old("entertainment_id", $entertainmentDownload["entertainment_id"])}}">
            @error("entertainment_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $entertainmentDownload["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="entertainment_type" class="form-label">entertainment_type</label>
            <input type="text" class="form-control" name="entertainment_type" value="{{old("entertainment_type", $entertainmentDownload["entertainment_type"])}}">
            @error("entertainment_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_download" class="form-label">is_download</label>
            <input type="text" class="form-control" name="is_download" value="{{old("is_download", $entertainmentDownload["is_download"])}}">
            @error("is_download")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $entertainmentDownload["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="quality" class="form-label">quality</label>
            <input type="text" class="form-control" name="quality" value="{{old("quality", $entertainmentDownload["quality"])}}">
            @error("quality")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="device_id" class="form-label">device_id</label>
            <input type="text" class="form-control" name="device_id" value="{{old("device_id", $entertainmentDownload["device_id"])}}">
            @error("device_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control" name="url" value="{{old("url", $entertainmentDownload["url"])}}">
            @error("url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $entertainmentDownload["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $entertainmentDownload["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $entertainmentDownload["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $entertainmentDownload["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>