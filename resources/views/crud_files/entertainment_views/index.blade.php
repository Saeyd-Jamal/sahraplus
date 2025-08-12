<div class="container">
<h2>entertainment_views List</h2>
<a href="{{ route('entertainment_views.create') }}" class="btn btn-primary mb-3">Create entertainment_views</a>
<table class="table">
    <thead>
        <tr><th>entertainment_id</th><th>user_id</th><th>profile_id</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($entertainment_views as $item)
                <tr>
                    <td>{{$item->entertainment_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->profile_id}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('entertainment_views.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('entertainment_views.destroy', $item->id) }}" method="POST" style="display:inline;">
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