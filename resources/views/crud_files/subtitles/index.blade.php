<div class="container">
<h2>subtitles List</h2>
<a href="{{ route('subtitles.create') }}" class="btn btn-primary mb-3">Create subtitles</a>
<table class="table">
    <thead>
        <tr><th>language_name</th><th>url</th><th>subtitable_type</th><th>subtitable_id</th><th>default</th></tr>
    </thead>
    <tbody>
        @foreach ($subtitles as $item)
                <tr>
                    <td>{{$item->language_name}}</td>
<td>{{$item->url}}</td>
<td>{{$item->subtitable_type}}</td>
<td>{{$item->subtitable_id}}</td>
<td>{{$item->default}}</td>
<td>
                        <a href="{{ route('subtitles.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('subtitles.destroy', $item->id) }}" method="POST" style="display:inline;">
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