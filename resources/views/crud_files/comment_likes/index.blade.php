<div class="container">
<h2>comment_likes List</h2>
<a href="{{ route('comment_likes.create') }}" class="btn btn-primary mb-3">Create comment_likes</a>
<table class="table">
    <thead>
        <tr><th>comment_id</th><th>user_id</th></tr>
    </thead>
    <tbody>
        @foreach ($comment_likes as $item)
                <tr>
                    <td>{{$item->comment_id}}</td>
<td>{{$item->user_id}}</td>
<td>
                        <a href="{{ route('comment_likes.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('comment_likes.destroy', $item->id) }}" method="POST" style="display:inline;">
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