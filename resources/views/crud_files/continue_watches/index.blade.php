<div class="container">
<h2>continue_watches List</h2>
<a href="{{ route('continue_watches.create') }}" class="btn btn-primary mb-3">Create continue_watches</a>
<table class="table">
    <thead>
        <tr><th>entertainment_id</th><th>user_id</th><th>profile_id</th><th>entertainment_type</th><th>watched_time</th><th>total_watched_time</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th><th>episode_id</th></tr>
    </thead>
    <tbody>
        @foreach ($continue_watches as $item)
                <tr>
                    <td>{{$item->entertainment_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->profile_id}}</td>
<td>{{$item->entertainment_type}}</td>
<td>{{$item->watched_time}}</td>
<td>{{$item->total_watched_time}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>{{$item->episode_id}}</td>
<td>
                        <a href="{{ route('continue_watches.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('continue_watches.destroy', $item->id) }}" method="POST" style="display:inline;">
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