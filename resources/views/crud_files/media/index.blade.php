<div class="container">
<h2>media List</h2>
<a href="{{ route('media.create') }}" class="btn btn-primary mb-3">Create media</a>
<table class="table">
    <thead>
        <tr><th>model_type</th><th>model_id</th><th>uuid</th><th>collection_name</th><th>name</th><th>file_name</th><th>mime_type</th><th>disk</th><th>conversions_disk</th><th>size</th><th>manipulations</th><th>custom_properties</th><th>generated_conversions</th><th>responsive_images</th><th>order_column</th></tr>
    </thead>
    <tbody>
        @foreach ($media as $item)
                <tr>
                    <td>{{$item->model_type}}</td>
<td>{{$item->model_id}}</td>
<td>{{$item->uuid}}</td>
<td>{{$item->collection_name}}</td>
<td>{{$item->name}}</td>
<td>{{$item->file_name}}</td>
<td>{{$item->mime_type}}</td>
<td>{{$item->disk}}</td>
<td>{{$item->conversions_disk}}</td>
<td>{{$item->size}}</td>
<td>{{$item->manipulations}}</td>
<td>{{$item->custom_properties}}</td>
<td>{{$item->generated_conversions}}</td>
<td>{{$item->responsive_images}}</td>
<td>{{$item->order_column}}</td>
<td>
                        <a href="{{ route('media.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('media.destroy', $item->id) }}" method="POST" style="display:inline;">
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