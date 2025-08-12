<div class="container">
<h2>planlimitation_mappings List</h2>
<a href="{{ route('planlimitation_mappings.create') }}" class="btn btn-primary mb-3">Create planlimitation_mappings</a>
<table class="table">
    <thead>
        <tr><th>plan_id</th><th>planlimitation_id</th><th>limitation_slug</th><th>limitation_value</th><th>limit</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($planlimitation_mappings as $item)
                <tr>
                    <td>{{$item->plan_id}}</td>
<td>{{$item->planlimitation_id}}</td>
<td>{{$item->limitation_slug}}</td>
<td>{{$item->limitation_value}}</td>
<td>{{$item->limit}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('planlimitation_mappings.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('planlimitation_mappings.destroy', $item->id) }}" method="POST" style="display:inline;">
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