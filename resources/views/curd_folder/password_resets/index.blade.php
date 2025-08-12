<div class="container">
<h2>password_resets List</h2>
<a href="{{ route('password_resets.create') }}" class="btn btn-primary mb-3">Create password_resets</a>
<table class="table">
    <thead>
        <tr><th>email</th><th>token</th></tr>
    </thead>
    <tbody>
        @foreach ($password_resets as $item)
                <tr>
                    <td>{{$item->email}}</td>
<td>{{$item->token}}</td>
<td>
                        <a href="{{ route('password_resets.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('password_resets.destroy', $item->id) }}" method="POST" style="display:inline;">
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