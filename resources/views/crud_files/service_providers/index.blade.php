<div class="container">
<h2>service_providers List</h2>
<a href="{{ route('service_providers.create') }}" class="btn btn-primary mb-3">Create service_providers</a>
<table class="table">
    <thead>
        <tr><th>slug</th><th>name</th><th>description</th><th>payment_method</th><th>manager_id</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>contact_email</th><th>contact_number</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($service_providers as $item)
                <tr>
                    <td>{{$item->slug}}</td>
<td>{{$item->name}}</td>
<td>{{$item->description}}</td>
<td>{{$item->payment_method}}</td>
<td>{{$item->manager_id}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->contact_email}}</td>
<td>{{$item->contact_number}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('service_providers.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('service_providers.destroy', $item->id) }}" method="POST" style="display:inline;">
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