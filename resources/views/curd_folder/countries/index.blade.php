<div class="container">
<h2>countries List</h2>
<a href="{{ route('countries.create') }}" class="btn btn-primary mb-3">Create countries</a>
<table class="table">
    <thead>
        <tr><th>code</th><th>name</th><th>dial_code</th><th>currency_name</th><th>symbol</th><th>currency_code</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($countries as $item)
                <tr>
                    <td>{{$item->code}}</td>
<td>{{$item->name}}</td>
<td>{{$item->dial_code}}</td>
<td>{{$item->currency_name}}</td>
<td>{{$item->symbol}}</td>
<td>{{$item->currency_code}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('countries.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('countries.destroy', $item->id) }}" method="POST" style="display:inline;">
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