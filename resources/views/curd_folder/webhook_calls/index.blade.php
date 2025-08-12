<div class="container">
<h2>webhook_calls List</h2>
<a href="{{ route('webhook_calls.create') }}" class="btn btn-primary mb-3">Create webhook_calls</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>url</th><th>headers</th><th>payload</th><th>exception</th></tr>
    </thead>
    <tbody>
        @foreach ($webhook_calls as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->url}}</td>
<td>{{$item->headers}}</td>
<td>{{$item->payload}}</td>
<td>{{$item->exception}}</td>
<td>
                        <a href="{{ route('webhook_calls.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('webhook_calls.destroy', $item->id) }}" method="POST" style="display:inline;">
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