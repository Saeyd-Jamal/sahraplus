<div class="container">
<h2>failed_jobs List</h2>
<a href="{{ route('failed_jobs.create') }}" class="btn btn-primary mb-3">Create failed_jobs</a>
<table class="table">
    <thead>
        <tr><th>uuid</th><th>connection</th><th>queue</th><th>payload</th><th>exception</th><th>failed_at</th></tr>
    </thead>
    <tbody>
        @foreach ($failed_jobs as $item)
                <tr>
                    <td>{{$item->uuid}}</td>
<td>{{$item->connection}}</td>
<td>{{$item->queue}}</td>
<td>{{$item->payload}}</td>
<td>{{$item->exception}}</td>
<td>{{$item->failed_at}}</td>
<td>
                        <a href="{{ route('failed_jobs.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('failed_jobs.destroy', $item->id) }}" method="POST" style="display:inline;">
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