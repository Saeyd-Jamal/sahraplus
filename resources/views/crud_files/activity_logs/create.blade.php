<div class="container">
    <h2>Create activity_logs</h2>
    <form action="{{ route('activity_logs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="log_name" class="form-label">log_name</label>
            <input type="text" class="form-control" name="log_name" value="{{old("log_name")}}">
            @error("log_name")
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
            <label for="subject_type" class="form-label">subject_type</label>
            <input type="text" class="form-control" name="subject_type" value="{{old("subject_type")}}">
            @error("subject_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="subject_id" class="form-label">subject_id</label>
            <input type="text" class="form-control" name="subject_id" value="{{old("subject_id")}}">
            @error("subject_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="event" class="form-label">event</label>
            <input type="text" class="form-control" name="event" value="{{old("event")}}">
            @error("event")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="causer_type" class="form-label">causer_type</label>
            <input type="text" class="form-control" name="causer_type" value="{{old("causer_type")}}">
            @error("causer_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="causer_id" class="form-label">causer_id</label>
            <input type="text" class="form-control" name="causer_id" value="{{old("causer_id")}}">
            @error("causer_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="properties" class="form-label">properties</label>
            <input type="text" class="form-control" name="properties" value="{{old("properties")}}">
            @error("properties")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="batch_uuid" class="form-label">batch_uuid</label>
            <input type="text" class="form-control" name="batch_uuid" value="{{old("batch_uuid")}}">
            @error("batch_uuid")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>