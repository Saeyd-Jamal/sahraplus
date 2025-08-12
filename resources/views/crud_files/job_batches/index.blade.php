<div class="container">
<h2>job_batches List</h2>
<a href="{{ route('job_batches.create') }}" class="btn btn-primary mb-3">Create job_batches</a>
<table class="table">
    <thead>
        <tr><th>id</th><th>name</th><th>total_jobs</th><th>pending_jobs</th><th>failed_jobs</th><th>failed_job_ids</th><th>options</th><th>cancelled_at</th><th>finished_at</th></tr>
    </thead>
    <tbody>
        @foreach ($job_batches as $item)
                <tr>
                    <td>{{$item->id}}</td>
<td>{{$item->name}}</td>
<td>{{$item->total_jobs}}</td>
<td>{{$item->pending_jobs}}</td>
<td>{{$item->failed_jobs}}</td>
<td>{{$item->failed_job_ids}}</td>
<td>{{$item->options}}</td>
<td>{{$item->cancelled_at}}</td>
<td>{{$item->finished_at}}</td>
<td>
                        <a href="{{ route('job_batches.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('job_batches.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>