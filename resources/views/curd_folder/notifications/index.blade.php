<div class="container">
<h2>notifications List</h2>
<a href="{{ route('notifications.create') }}" class="btn btn-primary mb-3">Create notifications</a>
<table class="table">
    <thead>
        <tr><th>id</th><th>type</th><th>notifiable_type</th><th>notifiable_id</th><th>data</th><th>read_at</th></tr>
    </thead>
    <tbody>
        @foreach ($notifications as $item)
                <tr>
                    <td>{{$item->id}}</td>
<td>{{$item->type}}</td>
<td>{{$item->notifiable_type}}</td>
<td>{{$item->notifiable_id}}</td>
<td>{{$item->data}}</td>
<td>{{$item->read_at}}</td>
<td>
                        <a href="{{ route('notifications.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('notifications.destroy', $item->id) }}" method="POST" style="display:inline;">
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