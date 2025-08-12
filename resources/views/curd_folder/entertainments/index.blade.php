<div class="container">
<h2>entertainments List</h2>
<a href="{{ route('entertainments.create') }}" class="btn btn-primary mb-3">Create entertainments</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>tmdb_id</th><th>thumbnail_url</th><th>entlogo</th><th>numberedimage</th><th>poster_url</th><th>description</th><th>trailer_url_type</th><th>type</th><th>trailer_url</th><th>movie_access</th><th>plan_id</th><th>language</th><th>IMDb_rating</th><th>content_rating</th><th>duration</th><th>release_date</th><th>is_restricted</th><th>video_upload_type</th><th>video_url_input</th><th>video_quality_url</th><th>enable_quality</th><th>download_status</th><th>download_type</th><th>download_url</th><th>enable_download_quality</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th><th>poster_tv_url</th></tr>
    </thead>
    <tbody>
        @foreach ($entertainments as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->tmdb_id}}</td>
<td>{{$item->thumbnail_url}}</td>
<td>{{$item->entlogo}}</td>
<td>{{$item->numberedimage}}</td>
<td>{{$item->poster_url}}</td>
<td>{{$item->description}}</td>
<td>{{$item->trailer_url_type}}</td>
<td>{{$item->type}}</td>
<td>{{$item->trailer_url}}</td>
<td>{{$item->movie_access}}</td>
<td>{{$item->plan_id}}</td>
<td>{{$item->language}}</td>
<td>{{$item->IMDb_rating}}</td>
<td>{{$item->content_rating}}</td>
<td>{{$item->duration}}</td>
<td>{{$item->release_date}}</td>
<td>{{$item->is_restricted}}</td>
<td>{{$item->video_upload_type}}</td>
<td>{{$item->video_url_input}}</td>
<td>{{$item->video_quality_url}}</td>
<td>{{$item->enable_quality}}</td>
<td>{{$item->download_status}}</td>
<td>{{$item->download_type}}</td>
<td>{{$item->download_url}}</td>
<td>{{$item->enable_download_quality}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>{{$item->poster_tv_url}}</td>
<td>
                        <a href="{{ route('entertainments.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('entertainments.destroy', $item->id) }}" method="POST" style="display:inline;">
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