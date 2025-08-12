<div class="container">
<h2>watch_histories List</h2>
<a href="{{ route('watch_histories.create') }}" class="btn btn-primary mb-3">Create watch_histories</a>
<table class="table">
    <thead>
        <tr><th>user_id</th><th>profile_id</th><th>watchable_type</th><th>watchable_id</th><th>duration_watched</th></tr>
    </thead>
    <tbody>
        @foreach ($watch_histories as $item)
                <tr>
                    <td>{{$item->user_id}}</td>
<td>{{$item->profile_id}}</td>
<td>{{$item->watchable_type}}</td>
<td>{{$item->watchable_id}}</td>
<td>{{$item->duration_watched}}</td>
<td>
                        <a href="{{ route('watch_histories.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('watch_histories.destroy', $item->id) }}" method="POST" style="display:inline;">
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