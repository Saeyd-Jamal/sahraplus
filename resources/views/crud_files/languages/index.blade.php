<div class="container">
<h2>languages List</h2>
<a href="{{ route('languages.create') }}" class="btn btn-primary mb-3">Create languages</a>
<table class="table">
    <thead>
        <tr><th>key</th><th>value</th><th>language</th><th>file</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($languages as $item)
                <tr>
                    <td>{{$item->key}}</td>
<td>{{$item->value}}</td>
<td>{{$item->language}}</td>
<td>{{$item->file}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('languages.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('languages.destroy', $item->id) }}" method="POST" style="display:inline;">
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