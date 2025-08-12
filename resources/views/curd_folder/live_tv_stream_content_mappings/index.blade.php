<div class="container">
<h2>live_tv_stream_content_mappings List</h2>
<a href="{{ route('live_tv_stream_content_mappings.create') }}" class="btn btn-primary mb-3">Create live_tv_stream_content_mappings</a>
<table class="table">
    <thead>
        <tr><th>tv_channel_id</th><th>type</th><th>stream_type</th><th>embedded</th><th>server_url</th><th>server_url1</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($live_tv_stream_content_mappings as $item)
                <tr>
                    <td>{{$item->tv_channel_id}}</td>
<td>{{$item->type}}</td>
<td>{{$item->stream_type}}</td>
<td>{{$item->embedded}}</td>
<td>{{$item->server_url}}</td>
<td>{{$item->server_url1}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('live_tv_stream_content_mappings.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('live_tv_stream_content_mappings.destroy', $item->id) }}" method="POST" style="display:inline;">
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