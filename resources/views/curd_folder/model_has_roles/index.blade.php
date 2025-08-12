<div class="container">
<h2>model_has_roles List</h2>
<a href="{{ route('model_has_roles.create') }}" class="btn btn-primary mb-3">Create model_has_roles</a>
<table class="table">
    <thead>
        <tr><th>role_id</th><th>model_type</th><th>model_id</th></tr>
    </thead>
    <tbody>
        @foreach ($model_has_roles as $item)
                <tr>
                    <td>{{$item->role_id}}</td>
<td>{{$item->model_type}}</td>
<td>{{$item->model_id}}</td>
<td>
                        <a href="{{ route('model_has_roles.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('model_has_roles.destroy', $item->id) }}" method="POST" style="display:inline;">
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