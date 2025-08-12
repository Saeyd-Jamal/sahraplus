<div class="container">
    <h2>Edit failedJob</h2>
    <form action="{{ route('failed_jobs.update', $failedJob->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="uuid" class="form-label">uuid</label>
            <input type="text" class="form-control" name="uuid" value="{{old("uuid", $failedJob["uuid"])}}">
            @error("uuid")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="connection" class="form-label">connection</label>
            <input type="text" class="form-control" name="connection" value="{{old("connection", $failedJob["connection"])}}">
            @error("connection")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="queue" class="form-label">queue</label>
            <input type="text" class="form-control" name="queue" value="{{old("queue", $failedJob["queue"])}}">
            @error("queue")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="payload" class="form-label">payload</label>
            <input type="text" class="form-control" name="payload" value="{{old("payload", $failedJob["payload"])}}">
            @error("payload")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="exception" class="form-label">exception</label>
            <input type="text" class="form-control" name="exception" value="{{old("exception", $failedJob["exception"])}}">
            @error("exception")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="failed_at" class="form-label">failed_at</label>
            <input type="text" class="form-control" name="failed_at" value="{{old("failed_at", $failedJob["failed_at"])}}">
            @error("failed_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>