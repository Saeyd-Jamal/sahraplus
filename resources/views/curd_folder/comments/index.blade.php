<div class="container">
<h2>comments List</h2>
<a href="{{ route('comments.create') }}" class="btn btn-primary mb-3">Create comments</a>
<table class="table">
    <thead>
        <tr><th>short_id</th><th>user_id</th><th>parent_id</th><th>body</th><th>media_url</th><th>likes_count</th><th>replies_count</th><th>is_edited</th><th>status</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($comments as $item)
                <tr>
                    <td>{{$item->short_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->parent_id}}</td>
<td>{{$item->body}}</td>
<td>{{$item->media_url}}</td>
<td>{{$item->likes_count}}</td>
<td>{{$item->replies_count}}</td>
<td>{{$item->is_edited}}</td>
<td>{{$item->status}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('comments.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('comments.destroy', $item->id) }}" method="POST" style="display:inline;">
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