<div class="container">
<h2>home_sliders List</h2>
<a href="{{ route('home_sliders.create') }}" class="btn btn-primary mb-3">Create home_sliders</a>
<table class="table">
    <thead>
        <tr><th>title_ar</th><th>title_en</th><th>title_el</th><th>title_fr</th><th>title_de</th><th>type</th><th>position</th><th>status</th><th>numbering</th><th>is_restricted</th></tr>
    </thead>
    <tbody>
        @foreach ($home_sliders as $item)
                <tr>
                    <td>{{$item->title_ar}}</td>
<td>{{$item->title_en}}</td>
<td>{{$item->title_el}}</td>
<td>{{$item->title_fr}}</td>
<td>{{$item->title_de}}</td>
<td>{{$item->type}}</td>
<td>{{$item->position}}</td>
<td>{{$item->status}}</td>
<td>{{$item->numbering}}</td>
<td>{{$item->is_restricted}}</td>
<td>
                        <a href="{{ route('home_sliders.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('home_sliders.destroy', $item->id) }}" method="POST" style="display:inline;">
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