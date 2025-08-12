<div class="container">
<h2>coupons List</h2>
<a href="{{ route('coupons.create') }}" class="btn btn-primary mb-3">Create coupons</a>
<table class="table">
    <thead>
        <tr><th>code</th><th>description</th><th>start_date</th><th>expire_date</th><th>discount_type</th><th>discount</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($coupons as $item)
                <tr>
                    <td>{{$item->code}}</td>
<td>{{$item->description}}</td>
<td>{{$item->start_date}}</td>
<td>{{$item->expire_date}}</td>
<td>{{$item->discount_type}}</td>
<td>{{$item->discount}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('coupons.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('coupons.destroy', $item->id) }}" method="POST" style="display:inline;">
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