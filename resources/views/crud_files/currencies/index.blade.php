<div class="container">
<h2>currencies List</h2>
<a href="{{ route('currencies.create') }}" class="btn btn-primary mb-3">Create currencies</a>
<table class="table">
    <thead>
        <tr><th>currency_name</th><th>currency_symbol</th><th>currency_code</th><th>is_primary</th><th>currency_position</th><th>no_of_decimal</th><th>thousand_separator</th><th>decimal_separator</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($currencies as $item)
                <tr>
                    <td>{{$item->currency_name}}</td>
<td>{{$item->currency_symbol}}</td>
<td>{{$item->currency_code}}</td>
<td>{{$item->is_primary}}</td>
<td>{{$item->currency_position}}</td>
<td>{{$item->no_of_decimal}}</td>
<td>{{$item->thousand_separator}}</td>
<td>{{$item->decimal_separator}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('currencies.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('currencies.destroy', $item->id) }}" method="POST" style="display:inline;">
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