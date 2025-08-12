<div class="container">
<h2>avatars List</h2>
<a href="{{ route('avatars.create') }}" class="btn btn-primary mb-3">Create avatars</a>
<table class="table">
    <thead>
        <tr><th>image</th><th>guest</th><th>child</th></tr>
    </thead>
    <tbody>
        @foreach ($avatars as $item)
                <tr>
                    <td>{{$item->image}}</td>
<td>{{$item->guest}}</td>
<td>{{$item->child}}</td>
<td>
                        <a href="{{ route('avatars.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('avatars.destroy', $item->id) }}" method="POST" style="display:inline;">
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