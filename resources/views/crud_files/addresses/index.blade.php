<div class="container">
<h2>addresses List</h2>
<a href="{{ route('addresses.create') }}" class="btn btn-primary mb-3">Create addresses</a>
<table class="table">
    <thead>
        <tr><th>address_line_1</th><th>address_line_2</th><th>postal_code</th><th>city</th><th>state</th><th>country</th><th>latitude</th><th>longitude</th><th>is_primary</th><th>addressable_type</th><th>addressable_id</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($addresses as $item)
                <tr>
                    <td>{{$item->address_line_1}}</td>
<td>{{$item->address_line_2}}</td>
<td>{{$item->postal_code}}</td>
<td>{{$item->city}}</td>
<td>{{$item->state}}</td>
<td>{{$item->country}}</td>
<td>{{$item->latitude}}</td>
<td>{{$item->longitude}}</td>
<td>{{$item->is_primary}}</td>
<td>{{$item->addressable_type}}</td>
<td>{{$item->addressable_id}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('addresses.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('addresses.destroy', $item->id) }}" method="POST" style="display:inline;">
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