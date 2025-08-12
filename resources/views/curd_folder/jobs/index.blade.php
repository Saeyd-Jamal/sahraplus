<div class="container">
<h2>jobs List</h2>
<a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Create jobs</a>
<table class="table">
    <thead>
        <tr><th>queue</th><th>payload</th><th>attempts</th><th>reserved_at</th><th>available_at</th></tr>
    </thead>
    <tbody>
        @foreach ($jobs as $item)
                <tr>
                    <td>{{$item->queue}}</td>
<td>{{$item->payload}}</td>
<td>{{$item->attempts}}</td>
<td>{{$item->reserved_at}}</td>
<td>{{$item->available_at}}</td>
<td>
                        <a href="{{ route('jobs.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jobs.destroy', $item->id) }}" method="POST" style="display:inline;">
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