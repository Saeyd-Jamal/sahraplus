<div class="container">
<h2>filemanagers List</h2>
<a href="{{ route('filemanagers.create') }}" class="btn btn-primary mb-3">Create filemanagers</a>
<table class="table">
    <thead>
        <tr><th>file_url</th><th>file_name</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($filemanagers as $item)
                <tr>
                    <td>{{$item->file_url}}</td>
<td>{{$item->file_name}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('filemanagers.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('filemanagers.destroy', $item->id) }}" method="POST" style="display:inline;">
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