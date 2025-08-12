<div class="container">
<h2>users List</h2>
<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create users</a>
<table class="table">
    <thead>
        <tr><th>username</th><th>first_name</th><th>last_name</th><th>email</th><th>mobile</th><th>login_type</th><th>file_url</th><th>gender</th><th>date_of_birth</th><th>email_verified_at</th><th>password</th><th>is_banned</th><th>is_subscribe</th><th>status</th><th>last_notification_seen</th><th>address</th><th>user_type</th><th>pin</th><th>otp</th><th>is_parental_lock_enable</th><th>remember_token</th><th>deleted_at</th><th>father_code</th></tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
                <tr>
                    <td>{{$item->username}}</td>
<td>{{$item->first_name}}</td>
<td>{{$item->last_name}}</td>
<td>{{$item->email}}</td>
<td>{{$item->mobile}}</td>
<td>{{$item->login_type}}</td>
<td>{{$item->file_url}}</td>
<td>{{$item->gender}}</td>
<td>{{$item->date_of_birth}}</td>
<td>{{$item->email_verified_at}}</td>
<td>{{$item->password}}</td>
<td>{{$item->is_banned}}</td>
<td>{{$item->is_subscribe}}</td>
<td>{{$item->status}}</td>
<td>{{$item->last_notification_seen}}</td>
<td>{{$item->address}}</td>
<td>{{$item->user_type}}</td>
<td>{{$item->pin}}</td>
<td>{{$item->otp}}</td>
<td>{{$item->is_parental_lock_enable}}</td>
<td>{{$item->remember_token}}</td>
<td>{{$item->deleted_at}}</td>
<td>{{$item->father_code}}</td>
<td>
                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display:inline;">
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