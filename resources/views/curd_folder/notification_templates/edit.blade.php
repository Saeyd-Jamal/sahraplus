<div class="container">
    <h2>Edit notificationTemplate</h2>
    <form action="{{ route('notification_templates.update', $notificationTemplate->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $notificationTemplate["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="label" class="form-label">label</label>
            <input type="text" class="form-control" name="label" value="{{old("label", $notificationTemplate["label"])}}">
            @error("label")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{old("description", $notificationTemplate["description"])}}">
            @error("description")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $notificationTemplate["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="to" class="form-label">to</label>
            <input type="text" class="form-control" name="to" value="{{old("to", $notificationTemplate["to"])}}">
            @error("to")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="bcc" class="form-label">bcc</label>
            <input type="text" class="form-control" name="bcc" value="{{old("bcc", $notificationTemplate["bcc"])}}">
            @error("bcc")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="cc" class="form-label">cc</label>
            <input type="text" class="form-control" name="cc" value="{{old("cc", $notificationTemplate["cc"])}}">
            @error("cc")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status", $notificationTemplate["status"])}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="channels" class="form-label">channels</label>
            <input type="text" class="form-control" name="channels" value="{{old("channels", $notificationTemplate["channels"])}}">
            @error("channels")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $notificationTemplate["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $notificationTemplate["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $notificationTemplate["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $notificationTemplate["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>