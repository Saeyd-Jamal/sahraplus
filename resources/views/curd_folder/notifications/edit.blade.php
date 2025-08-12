<div class="container">
    <h2>Edit notification</h2>
    <form action="{{ route('notifications.update', $notification->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="id" class="form-label">id</label>
            <input type="text" class="form-control" name="id" value="{{old("id", $notification["id"])}}">
            @error("id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $notification["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="notifiable_type" class="form-label">notifiable_type</label>
            <input type="text" class="form-control" name="notifiable_type" value="{{old("notifiable_type", $notification["notifiable_type"])}}">
            @error("notifiable_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="notifiable_id" class="form-label">notifiable_id</label>
            <input type="text" class="form-control" name="notifiable_id" value="{{old("notifiable_id", $notification["notifiable_id"])}}">
            @error("notifiable_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="data" class="form-label">data</label>
            <input type="text" class="form-control" name="data" value="{{old("data", $notification["data"])}}">
            @error("data")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="read_at" class="form-label">read_at</label>
            <input type="text" class="form-control" name="read_at" value="{{old("read_at", $notification["read_at"])}}">
            @error("read_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>