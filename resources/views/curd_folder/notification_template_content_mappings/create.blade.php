<div class="container">
    <h2>Create notification_template_content_mappings</h2>
    <form action="{{ route('notification_template_content_mappings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">id</label>
            <input type="text" class="form-control" name="id" value="{{old("id")}}">
            @error("id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="template_id" class="form-label">template_id</label>
            <input type="text" class="form-control" name="template_id" value="{{old("template_id")}}">
            @error("template_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="language" class="form-label">language</label>
            <input type="text" class="form-control" name="language" value="{{old("language")}}">
            @error("language")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="template_detail" class="form-label">template_detail</label>
            <input type="text" class="form-control" name="template_detail" value="{{old("template_detail")}}">
            @error("template_detail")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="subject" class="form-label">subject</label>
            <input type="text" class="form-control" name="subject" value="{{old("subject")}}">
            @error("subject")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="notification_message" class="form-label">notification_message</label>
            <input type="text" class="form-control" name="notification_message" value="{{old("notification_message")}}">
            @error("notification_message")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="notification_link" class="form-label">notification_link</label>
            <input type="text" class="form-control" name="notification_link" value="{{old("notification_link")}}">
            @error("notification_link")
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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>