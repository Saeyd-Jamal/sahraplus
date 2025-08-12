<div class="container">
<h2>plans List</h2>
<a href="{{ route('plans.create') }}" class="btn btn-primary mb-3">Create plans</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>identifier</th><th>android_identifier</th><th>apple_identifier</th><th>price</th><th>discount</th><th>discount_percentage</th><th>total_price</th><th>level</th><th>duration</th><th>duration_value</th><th>status</th><th>description</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($plans as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->identifier}}</td>
<td>{{$item->android_identifier}}</td>
<td>{{$item->apple_identifier}}</td>
<td>{{$item->price}}</td>
<td>{{$item->discount}}</td>
<td>{{$item->discount_percentage}}</td>
<td>{{$item->total_price}}</td>
<td>{{$item->level}}</td>
<td>{{$item->duration}}</td>
<td>{{$item->duration_value}}</td>
<td>{{$item->status}}</td>
<td>{{$item->description}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('plans.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('plans.destroy', $item->id) }}" method="POST" style="display:inline;">
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