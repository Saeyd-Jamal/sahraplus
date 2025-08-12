<div class="container">
<h2>personal_access_tokens List</h2>
<a href="{{ route('personal_access_tokens.create') }}" class="btn btn-primary mb-3">Create personal_access_tokens</a>
<table class="table">
    <thead>
        <tr><th>tokenable_type</th><th>tokenable_id</th><th>name</th><th>token</th><th>abilities</th><th>last_used_at</th><th>expires_at</th></tr>
    </thead>
    <tbody>
        @foreach ($personal_access_tokens as $item)
                <tr>
                    <td>{{$item->tokenable_type}}</td>
<td>{{$item->tokenable_id}}</td>
<td>{{$item->name}}</td>
<td>{{$item->token}}</td>
<td>{{$item->abilities}}</td>
<td>{{$item->last_used_at}}</td>
<td>{{$item->expires_at}}</td>
<td>
                        <a href="{{ route('personal_access_tokens.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('personal_access_tokens.destroy', $item->id) }}" method="POST" style="display:inline;">
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