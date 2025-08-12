<div class="container">
<h2>user_providers List</h2>
<a href="{{ route('user_providers.create') }}" class="btn btn-primary mb-3">Create user_providers</a>
<table class="table">
    <thead>
        <tr><th>user_id</th><th>provider</th><th>provider_id</th><th>avatar</th></tr>
    </thead>
    <tbody>
        @foreach ($user_providers as $item)
                <tr>
                    <td>{{$item->user_id}}</td>
<td>{{$item->provider}}</td>
<td>{{$item->provider_id}}</td>
<td>{{$item->avatar}}</td>
<td>
                        <a href="{{ route('user_providers.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user_providers.destroy', $item->id) }}" method="POST" style="display:inline;">
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