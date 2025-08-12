<div class="container">
<h2>banners List</h2>
<a href="{{ route('banners.create') }}" class="btn btn-primary mb-3">Create banners</a>
<table class="table">
    <thead>
        <tr><th>title</th><th>file_url</th><th>poster_url</th><th>type</th><th>type_id</th><th>type_name</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th><th>banner_for</th><th>poster_tv_url</th></tr>
    </thead>
    <tbody>
        @foreach ($banners as $item)
                <tr>
                    <td>{{$item->title}}</td>
<td>{{$item->file_url}}</td>
<td>{{$item->poster_url}}</td>
<td>{{$item->type}}</td>
<td>{{$item->type_id}}</td>
<td>{{$item->type_name}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>{{$item->banner_for}}</td>
<td>{{$item->poster_tv_url}}</td>
<td>
                        <a href="{{ route('banners.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('banners.destroy', $item->id) }}" method="POST" style="display:inline;">
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