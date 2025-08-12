<div class="container">
<h2>slider_items List</h2>
<a href="{{ route('slider_items.create') }}" class="btn btn-primary mb-3">Create slider_items</a>
<table class="table">
    <thead>
        <tr><th>home_slider_id</th><th>item_id</th><th>position</th></tr>
    </thead>
    <tbody>
        @foreach ($slider_items as $item)
                <tr>
                    <td>{{$item->home_slider_id}}</td>
<td>{{$item->item_id}}</td>
<td>{{$item->position}}</td>
<td>
                        <a href="{{ route('slider_items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('slider_items.destroy', $item->id) }}" method="POST" style="display:inline;">
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