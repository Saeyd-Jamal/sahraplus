<div class="container">
<h2>states List</h2>
<a href="{{ route('states.create') }}" class="btn btn-primary mb-3">Create states</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>country_id</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($states as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->country_id}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('states.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('states.destroy', $item->id) }}" method="POST" style="display:inline;">
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