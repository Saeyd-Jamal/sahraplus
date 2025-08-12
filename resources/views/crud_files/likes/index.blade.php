<div class="container">
<h2>likes List</h2>
<a href="{{ route('likes.create') }}" class="btn btn-primary mb-3">Create likes</a>
<table class="table">
    <thead>
        <tr><th>entertainment_id</th><th>user_id</th><th>is_like</th><th>profile_id</th><th>type</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($likes as $item)
                <tr>
                    <td>{{$item->entertainment_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->is_like}}</td>
<td>{{$item->profile_id}}</td>
<td>{{$item->type}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('likes.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('likes.destroy', $item->id) }}" method="POST" style="display:inline;">
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