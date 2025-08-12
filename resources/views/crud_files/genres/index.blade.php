<div class="container">
<h2>genres List</h2>
<a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Create genres</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>slug</th><th>file_url</th><th>description</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($genres as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->slug}}</td>
<td>{{$item->file_url}}</td>
<td>{{$item->description}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('genres.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('genres.destroy', $item->id) }}" method="POST" style="display:inline;">
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