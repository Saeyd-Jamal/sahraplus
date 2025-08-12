<div class="container">
<h2>sessions List</h2>
<a href="{{ route('sessions.create') }}" class="btn btn-primary mb-3">Create sessions</a>
<table class="table">
    <thead>
        <tr><th>id</th><th>user_id</th><th>ip_address</th><th>user_agent</th><th>payload</th><th>last_activity</th></tr>
    </thead>
    <tbody>
        @foreach ($sessions as $item)
                <tr>
                    <td>{{$item->id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->ip_address}}</td>
<td>{{$item->user_agent}}</td>
<td>{{$item->payload}}</td>
<td>{{$item->last_activity}}</td>
<td>
                        <a href="{{ route('sessions.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sessions.destroy', $item->id) }}" method="POST" style="display:inline;">
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