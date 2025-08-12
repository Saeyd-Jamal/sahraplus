<div class="container">
<h2>user_search_histories List</h2>
<a href="{{ route('user_search_histories.create') }}" class="btn btn-primary mb-3">Create user_search_histories</a>
<table class="table">
    <thead>
        <tr><th>user_id</th><th>profile_id</th><th>search_query</th><th>search_id</th><th>type</th></tr>
    </thead>
    <tbody>
        @foreach ($user_search_histories as $item)
                <tr>
                    <td>{{$item->user_id}}</td>
<td>{{$item->profile_id}}</td>
<td>{{$item->search_query}}</td>
<td>{{$item->search_id}}</td>
<td>{{$item->type}}</td>
<td>
                        <a href="{{ route('user_search_histories.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user_search_histories.destroy', $item->id) }}" method="POST" style="display:inline;">
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