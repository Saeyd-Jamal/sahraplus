<div class="container">
<h2>pages List</h2>
<a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Create pages</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>slug</th><th>sequence</th><th>description</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($pages as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->slug}}</td>
<td>{{$item->sequence}}</td>
<td>{{$item->description}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('pages.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pages.destroy', $item->id) }}" method="POST" style="display:inline;">
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