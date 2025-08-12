<div class="container">
<h2>live_tv_channels List</h2>
<a href="{{ route('live_tv_channels.create') }}" class="btn btn-primary mb-3">Create live_tv_channels</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>poster_url</th><th>category_id</th><th>thumb_url</th><th>access</th><th>plan_id</th><th>description</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th><th>poster_tv_url</th></tr>
    </thead>
    <tbody>
        @foreach ($live_tv_channels as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->poster_url}}</td>
<td>{{$item->category_id}}</td>
<td>{{$item->thumb_url}}</td>
<td>{{$item->access}}</td>
<td>{{$item->plan_id}}</td>
<td>{{$item->description}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>{{$item->poster_tv_url}}</td>
<td>
                        <a href="{{ route('live_tv_channels.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('live_tv_channels.destroy', $item->id) }}" method="POST" style="display:inline;">
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