<div class="container">
<h2>episodes List</h2>
<a href="{{ route('episodes.create') }}" class="btn btn-primary mb-3">Create episodes</a>
<table class="table">
    <thead>
        <tr><th>name</th><th>poster_url</th><th>entertainment_id</th><th>season_id</th><th>trailer_url_type</th><th>trailer_url</th><th>access</th><th>plan_id</th><th>IMDb_rating</th><th>content_rating</th><th>duration</th><th>release_date</th><th>is_restricted</th><th>short_desc</th><th>description</th><th>enable_quality</th><th>video_upload_type</th><th>video_url_input</th><th>download_status</th><th>download_type</th><th>download_url</th><th>enable_download_quality</th><th>status</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>video_quality_url</th><th>tmdb_id</th><th>tmdb_season</th><th>episode_number</th><th>deleted_at</th><th>poster_tv_url</th></tr>
    </thead>
    <tbody>
        @foreach ($episodes as $item)
                <tr>
                    <td>{{$item->name}}</td>
<td>{{$item->poster_url}}</td>
<td>{{$item->entertainment_id}}</td>
<td>{{$item->season_id}}</td>
<td>{{$item->trailer_url_type}}</td>
<td>{{$item->trailer_url}}</td>
<td>{{$item->access}}</td>
<td>{{$item->plan_id}}</td>
<td>{{$item->IMDb_rating}}</td>
<td>{{$item->content_rating}}</td>
<td>{{$item->duration}}</td>
<td>{{$item->release_date}}</td>
<td>{{$item->is_restricted}}</td>
<td>{{$item->short_desc}}</td>
<td>{{$item->description}}</td>
<td>{{$item->enable_quality}}</td>
<td>{{$item->video_upload_type}}</td>
<td>{{$item->video_url_input}}</td>
<td>{{$item->download_status}}</td>
<td>{{$item->download_type}}</td>
<td>{{$item->download_url}}</td>
<td>{{$item->enable_download_quality}}</td>
<td>{{$item->status}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->video_quality_url}}</td>
<td>{{$item->tmdb_id}}</td>
<td>{{$item->tmdb_season}}</td>
<td>{{$item->episode_number}}</td>
<td>{{$item->deleted_at}}</td>
<td>{{$item->poster_tv_url}}</td>
<td>
                        <a href="{{ route('episodes.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('episodes.destroy', $item->id) }}" method="POST" style="display:inline;">
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