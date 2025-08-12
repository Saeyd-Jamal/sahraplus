<div class="container">
<h2>watchlists List</h2>
<a href="{{ route('watchlists.create') }}" class="btn btn-primary mb-3">Create watchlists</a>
<table class="table">
    <thead>
        <tr><th>entertainment_id</th><th>user_id</th><th>profile_id</th><th>type</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($watchlists as $item)
                <tr>
                    <td>{{$item->entertainment_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->profile_id}}</td>
<td>{{$item->type}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('watchlists.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('watchlists.destroy', $item->id) }}" method="POST" style="display:inline;">
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