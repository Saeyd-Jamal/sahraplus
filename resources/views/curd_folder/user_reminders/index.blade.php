<div class="container">
<h2>user_reminders List</h2>
<a href="{{ route('user_reminders.create') }}" class="btn btn-primary mb-3">Create user_reminders</a>
<table class="table">
    <thead>
        <tr><th>entertainment_id</th><th>user_id</th><th>profile_id</th><th>release_date</th><th>is_remind</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($user_reminders as $item)
                <tr>
                    <td>{{$item->entertainment_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->profile_id}}</td>
<td>{{$item->release_date}}</td>
<td>{{$item->is_remind}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('user_reminders.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user_reminders.destroy', $item->id) }}" method="POST" style="display:inline;">
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