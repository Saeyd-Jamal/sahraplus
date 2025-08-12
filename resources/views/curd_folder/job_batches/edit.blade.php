<div class="container">
    <h2>Edit jobBatch</h2>
    <form action="{{ route('job_batches.update', $jobBatch->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="id" class="form-label">id</label>
            <input type="text" class="form-control" name="id" value="{{old("id", $jobBatch["id"])}}">
            @error("id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $jobBatch["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="total_jobs" class="form-label">total_jobs</label>
            <input type="text" class="form-control" name="total_jobs" value="{{old("total_jobs", $jobBatch["total_jobs"])}}">
            @error("total_jobs")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="pending_jobs" class="form-label">pending_jobs</label>
            <input type="text" class="form-control" name="pending_jobs" value="{{old("pending_jobs", $jobBatch["pending_jobs"])}}">
            @error("pending_jobs")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="failed_jobs" class="form-label">failed_jobs</label>
            <input type="text" class="form-control" name="failed_jobs" value="{{old("failed_jobs", $jobBatch["failed_jobs"])}}">
            @error("failed_jobs")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="failed_job_ids" class="form-label">failed_job_ids</label>
            <input type="text" class="form-control" name="failed_job_ids" value="{{old("failed_job_ids", $jobBatch["failed_job_ids"])}}">
            @error("failed_job_ids")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="options" class="form-label">options</label>
            <input type="text" class="form-control" name="options" value="{{old("options", $jobBatch["options"])}}">
            @error("options")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="cancelled_at" class="form-label">cancelled_at</label>
            <input type="text" class="form-control" name="cancelled_at" value="{{old("cancelled_at", $jobBatch["cancelled_at"])}}">
            @error("cancelled_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="finished_at" class="form-label">finished_at</label>
            <input type="text" class="form-control" name="finished_at" value="{{old("finished_at", $jobBatch["finished_at"])}}">
            @error("finished_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>