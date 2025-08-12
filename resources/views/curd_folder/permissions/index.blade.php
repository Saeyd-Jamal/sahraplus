<div class="container">
<h2>permissions List</h2>
<a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Create permissions</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>guard_name</th><th>is_fixed</th></tr>
    </thead>
    <tbody>
        @foreach ($permissions as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->guard_name}}</td>
<td>{{$item->is_fixed}}</td>
<td>
                        <a href="{{ route('permissions.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('permissions.destroy', $item->id) }}" method="POST" style="display:inline;">
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