<div class="container">
<h2>seasons List</h2>
<a href="{{ route('seasons.create') }}" class="btn btn-primary mb-3">Create seasons</a>
<table class="table">
    <thead>
        <tr><th>tmdb_id</th><th>season_index</th><th>name</th><th>poster_url</th><th>entertainment_id</th><th>trailer_url_type</th><th>trailer_url</th><th>access</th><th>status</th><th>plan_id</th><th>short_desc</th><th>description</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th><th>poster_tv_url</th></tr>
    </thead>
    <tbody>
        @foreach ($seasons as $item)
                <tr>
                    <td>{{$item->tmdb_id}}</td>
<td>{{$item->season_index}}</td>
<td>{{$item->name}}</td>
<td>{{$item->poster_url}}</td>
<td>{{$item->entertainment_id}}</td>
<td>{{$item->trailer_url_type}}</td>
<td>{{$item->trailer_url}}</td>
<td>{{$item->access}}</td>
<td>{{$item->status}}</td>
<td>{{$item->plan_id}}</td>
<td>{{$item->short_desc}}</td>
<td>{{$item->description}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>{{$item->poster_tv_url}}</td>
<td>
                        <a href="{{ route('seasons.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('seasons.destroy', $item->id) }}" method="POST" style="display:inline;">
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