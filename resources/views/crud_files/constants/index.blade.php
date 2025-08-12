<div class="container">
<h2>constants List</h2>
<a href="{{ route('constants.create') }}" class="btn btn-primary mb-3">Create constants</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>type</th><th>value</th><th>sequence</th><th>sub_type</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($constants as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->type}}</td>
<td>{{$item->value}}</td>
<td>{{$item->sequence}}</td>
<td>{{$item->sub_type}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('constants.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('constants.destroy', $item->id) }}" method="POST" style="display:inline;">
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