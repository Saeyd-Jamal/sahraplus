<div class="container">
<h2>taxes List</h2>
<a href="{{ route('taxes.create') }}" class="btn btn-primary mb-3">Create taxes</a>
<table class="table">
    <thead>
        <tr><th>title</th><th>type</th><th>value</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($taxes as $item)
                <tr>
                    <td>{{$item->title}}</td>
<td>{{$item->type}}</td>
<td>{{$item->value}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('taxes.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('taxes.destroy', $item->id) }}" method="POST" style="display:inline;">
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