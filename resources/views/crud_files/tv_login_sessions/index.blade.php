<div class="container">
<h2>tv_login_sessions List</h2>
<a href="{{ route('tv_login_sessions.create') }}" class="btn btn-primary mb-3">Create tv_login_sessions</a>
<table class="table">
    <thead>
        <tr><th>session_id</th><th>user_id</th><th>confirmed_at</th><th>expires_at</th></tr>
    </thead>
    <tbody>
        @foreach ($tv_login_sessions as $item)
                <tr>
                    <td>{{$item->session_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->confirmed_at}}</td>
<td>{{$item->expires_at}}</td>
<td>
                        <a href="{{ route('tv_login_sessions.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tv_login_sessions.destroy', $item->id) }}" method="POST" style="display:inline;">
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