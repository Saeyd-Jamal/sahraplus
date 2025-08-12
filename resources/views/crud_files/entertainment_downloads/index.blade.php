<div class="container">
<h2>entertainment_downloads List</h2>
<a href="{{ route('entertainment_downloads.create') }}" class="btn btn-primary mb-3">Create entertainment_downloads</a>
<table class="table">
    <thead>
        <tr><th>entertainment_id</th><th>user_id</th><th>entertainment_type</th><th>is_download</th><th>type</th><th>quality</th><th>device_id</th><th>url</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($entertainment_downloads as $item)
                <tr>
                    <td>{{$item->entertainment_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->entertainment_type}}</td>
<td>{{$item->is_download}}</td>
<td>{{$item->type}}</td>
<td>{{$item->quality}}</td>
<td>{{$item->device_id}}</td>
<td>{{$item->url}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('entertainment_downloads.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('entertainment_downloads.destroy', $item->id) }}" method="POST" style="display:inline;">
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