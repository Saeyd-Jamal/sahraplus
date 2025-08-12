<div class="container">
<h2>user_profiles List</h2>
<a href="{{ route('user_profiles.create') }}" class="btn btn-primary mb-3">Create user_profiles</a>
<table class="table">
    <thead>
        <tr><th>about_self</th><th>expert</th><th>facebook_link</th><th>instagram_link</th><th>twitter_link</th><th>dribbble_link</th><th>user_id</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($user_profiles as $item)
                <tr>
                    <td>{{$item->about_self}}</td>
<td>{{$item->expert}}</td>
<td>{{$item->facebook_link}}</td>
<td>{{$item->instagram_link}}</td>
<td>{{$item->twitter_link}}</td>
<td>{{$item->dribbble_link}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('user_profiles.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user_profiles.destroy', $item->id) }}" method="POST" style="display:inline;">
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