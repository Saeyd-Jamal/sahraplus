<div class="container">
<h2>roles List</h2>
<a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create roles</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>title</th><th>guard_name</th><th>is_fixed</th></tr>
    </thead>
    <tbody>
        @foreach ($roles as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->title}}</td>
<td>{{$item->guard_name}}</td>
<td>{{$item->is_fixed}}</td>
<td>
                        <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('roles.destroy', $item->id) }}" method="POST" style="display:inline;">
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