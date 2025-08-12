<div class="container">
<h2>devices List</h2>
<a href="{{ route('devices.create') }}" class="btn btn-primary mb-3">Create devices</a>
<table class="table">
    <thead>
        <tr><th>user_id</th><th>device_id</th><th>device_name</th><th>active_profile</th><th>platform</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($devices as $item)
                <tr>
                    <td>{{$item->user_id}}</td>
<td>{{$item->device_id}}</td>
<td>{{$item->device_name}}</td>
<td>{{$item->active_profile}}</td>
<td>{{$item->platform}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('devices.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('devices.destroy', $item->id) }}" method="POST" style="display:inline;">
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