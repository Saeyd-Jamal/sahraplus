<div class="container">
<h2>user_multi_profiles List</h2>
<a href="{{ route('user_multi_profiles.create') }}" class="btn btn-primary mb-3">Create user_multi_profiles</a>
<table class="table">
    <thead>
        <tr><th>user_id</th><th>name</th><th>avatar</th><th>is_default</th><th>is_child_profile</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($user_multi_profiles as $item)
                <tr>
                    <td>{{$item->user_id}}</td>
<td>{{$item->name}}</td>
<td>{{$item->avatar}}</td>
<td>{{$item->is_default}}</td>
<td>{{$item->is_child_profile}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('user_multi_profiles.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user_multi_profiles.destroy', $item->id) }}" method="POST" style="display:inline;">
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