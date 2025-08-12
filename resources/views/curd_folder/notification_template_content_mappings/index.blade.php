<div class="container">
<h2>notification_template_content_mappings List</h2>
<a href="{{ route('notification_template_content_mappings.create') }}" class="btn btn-primary mb-3">Create notification_template_content_mappings</a>
<table class="table">
    <thead>
        <tr><th>id</th><th>template_id</th><th>language</th><th>template_detail</th><th>subject</th><th>notification_message</th><th>notification_link</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($notification_template_content_mappings as $item)
                <tr>
                    <td>{{$item->id}}</td>
<td>{{$item->template_id}}</td>
<td>{{$item->language}}</td>
<td>{{$item->template_detail}}</td>
<td>{{$item->subject}}</td>
<td>{{$item->notification_message}}</td>
<td>{{$item->notification_link}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('notification_template_content_mappings.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('notification_template_content_mappings.destroy', $item->id) }}" method="POST" style="display:inline;">
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