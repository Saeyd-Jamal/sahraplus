<div class="container">
<h2>cast_crews List</h2>
<a href="{{ route('cast_crews.create') }}" class="btn btn-primary mb-3">Create cast_crews</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>file_url</th><th>type</th><th>tmdb_id</th><th>bio</th><th>place_of_birth</th><th>dob</th><th>designation</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($cast_crews as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->file_url}}</td>
<td>{{$item->type}}</td>
<td>{{$item->tmdb_id}}</td>
<td>{{$item->bio}}</td>
<td>{{$item->place_of_birth}}</td>
<td>{{$item->dob}}</td>
<td>{{$item->designation}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('cast_crews.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('cast_crews.destroy', $item->id) }}" method="POST" style="display:inline;">
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