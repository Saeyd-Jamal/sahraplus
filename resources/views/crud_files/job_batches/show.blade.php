<div class="container">
    <h2>jobBatch Details</h2>
     <p><strong>id:</strong> {{ $jobBatch ->id }}</p>
<p><strong>name:</strong> {{ $jobBatch ->name }}</p>
<p><strong>total_jobs:</strong> {{ $jobBatch ->total_jobs }}</p>
<p><strong>pending_jobs:</strong> {{ $jobBatch ->pending_jobs }}</p>
<p><strong>failed_jobs:</strong> {{ $jobBatch ->failed_jobs }}</p>
<p><strong>failed_job_ids:</strong> {{ $jobBatch ->failed_job_ids }}</p>
<p><strong>options:</strong> {{ $jobBatch ->options }}</p>
<p><strong>cancelled_at:</strong> {{ $jobBatch ->cancelled_at }}</p>
<p><strong>finished_at:</strong> {{ $jobBatch ->finished_at }}</p>

</div>