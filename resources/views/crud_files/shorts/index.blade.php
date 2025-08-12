<div class="container">
<h2>shorts List</h2>
<a href="{{ route('shorts.create') }}" class="btn btn-primary mb-3">Create shorts</a>
<table class="table">
    <thead>
        <tr><th>title</th><th>description</th><th>video_path</th><th>poster_path</th><th>aspect_ratio</th><th>likes_count</th><th>comments_count</th><th>shares_count</th><th>share_url</th><th>is_featured</th><th>status</th></tr>
    </thead>
    <tbody>
        @foreach ($shorts as $item)
                <tr>
                    <td>{{$item->title}}</td>
<td>{{$item->description}}</td>
<td>{{$item->video_path}}</td>
<td>{{$item->poster_path}}</td>
<td>{{$item->aspect_ratio}}</td>
<td>{{$item->likes_count}}</td>
<td>{{$item->comments_count}}</td>
<td>{{$item->shares_count}}</td>
<td>{{$item->share_url}}</td>
<td>{{$item->is_featured}}</td>
<td>{{$item->status}}</td>
<td>
                        <a href="{{ route('shorts.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('shorts.destroy', $item->id) }}" method="POST" style="display:inline;">
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