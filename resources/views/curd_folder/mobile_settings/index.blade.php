<div class="container">
<h2>mobile_settings List</h2>
<a href="{{ route('mobile_settings.create') }}" class="btn btn-primary mb-3">Create mobile_settings</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>slug</th><th>position</th><th>value</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($mobile_settings as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->slug}}</td>
<td>{{$item->position}}</td>
<td>{{$item->value}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('mobile_settings.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mobile_settings.destroy', $item->id) }}" method="POST" style="display:inline;">
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