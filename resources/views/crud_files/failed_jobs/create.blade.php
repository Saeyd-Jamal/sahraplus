<div class="container">
    <h2>Create failed_jobs</h2>
    <form action="{{ route('failed_jobs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="uuid" class="form-label">uuid</label>
            <input type="text" class="form-control" name="uuid" value="{{old("uuid")}}">
            @error("uuid")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="connection" class="form-label">connection</label>
            <input type="text" class="form-control" name="connection" value="{{old("connection")}}">
            @error("connection")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="queue" class="form-label">queue</label>
            <input type="text" class="form-control" name="queue" value="{{old("queue")}}">
            @error("queue")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="payload" class="form-label">payload</label>
            <input type="text" class="form-control" name="payload" value="{{old("payload")}}">
            @error("payload")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="exception" class="form-label">exception</label>
            <input type="text" class="form-control" name="exception" value="{{old("exception")}}">
            @error("exception")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="failed_at" class="form-label">failed_at</label>
            <input type="text" class="form-control" name="failed_at" value="{{old("failed_at")}}">
            @error("failed_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>