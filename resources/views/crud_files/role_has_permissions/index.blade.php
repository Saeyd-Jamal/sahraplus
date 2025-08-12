<div class="container">
<h2>role_has_permissions List</h2>
<a href="{{ route('role_has_permissions.create') }}" class="btn btn-primary mb-3">Create role_has_permissions</a>
<table class="table">
    <thead>
        <tr><th>permission_id</th><th>role_id</th></tr>
    </thead>
    <tbody>
        @foreach ($role_has_permissions as $item)
                <tr>
                    <td>{{$item->permission_id}}</td>
<td>{{$item->role_id}}</td>
<td>
                        <a href="{{ route('role_has_permissions.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('role_has_permissions.destroy', $item->id) }}" method="POST" style="display:inline;">
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