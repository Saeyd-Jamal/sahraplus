<div class="container">
<h2>video_download_mappings List</h2>
<a href="{{ route('video_download_mappings.create') }}" class="btn btn-primary mb-3">Create video_download_mappings</a>
<table class="table">
    <thead>
        <tr><th>video_id</th><th>type</th><th>quality</th><th>url</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($video_download_mappings as $item)
                <tr>
                    <td>{{$item->video_id}}</td>
<td>{{$item->type}}</td>
<td>{{$item->quality}}</td>
<td>{{$item->url}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('video_download_mappings.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('video_download_mappings.destroy', $item->id) }}" method="POST" style="display:inline;">
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