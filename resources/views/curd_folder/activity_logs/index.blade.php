<div class="container">
<h2>activity_logs List</h2>
<a href="{{ route('activity_logs.create') }}" class="btn btn-primary mb-3">Create activity_logs</a>
<table class="table">
    <thead>
        <tr><th>log_name</th><th>description</th><th>subject_type</th><th>subject_id</th><th>event</th><th>causer_type</th><th>causer_id</th><th>properties</th><th>batch_uuid</th></tr>
    </thead>
    <tbody>
        @foreach ($activity_logs as $item)
                <tr>
                    <td>{{$item->log_name}}</td>
<td>{{$item->description}}</td>
<td>{{$item->subject_type}}</td>
<td>{{$item->subject_id}}</td>
<td>{{$item->event}}</td>
<td>{{$item->causer_type}}</td>
<td>{{$item->causer_id}}</td>
<td>{{$item->properties}}</td>
<td>{{$item->batch_uuid}}</td>
<td>
                        <a href="{{ route('activity_logs.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('activity_logs.destroy', $item->id) }}" method="POST" style="display:inline;">
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