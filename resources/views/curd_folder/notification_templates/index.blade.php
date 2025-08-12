<div class="container">
<h2>notification_templates List</h2>
<a href="{{ route('notification_templates.create') }}" class="btn btn-primary mb-3">Create notification_templates</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>label</th><th>description</th><th>type</th><th>to</th><th>bcc</th><th>cc</th><th>status</th><th>channels</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($notification_templates as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->label}}</td>
<td>{{$item->description}}</td>
<td>{{$item->type}}</td>
<td>{{$item->to}}</td>
<td>{{$item->bcc}}</td>
<td>{{$item->cc}}</td>
<td>{{$item->status}}</td>
<td>{{$item->channels}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('notification_templates.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('notification_templates.destroy', $item->id) }}" method="POST" style="display:inline;">
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