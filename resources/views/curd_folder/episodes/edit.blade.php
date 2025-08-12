<div class="container">
    <h2>Edit episode</h2>
    <form action="{{ route('episodes.update', $episode->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $episode["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="poster_url" class="form-label">poster_url</label>
            <input type="text" class="form-control" name="poster_url" value="{{old("poster_url", $episode["poster_url"])}}">
            @error("poster_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="entertainment_id" class="form-label">entertainment_id</label>
            <input type="text" class="form-control" name="entertainment_id" value="{{old("entertainment_id", $episode["entertainment_id"])}}">
            @error("entertainment_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="season_id" class="form-label">season_id</label>
            <input type="text" class="form-control" name="season_id" value="{{old("season_id", $episode["season_id"])}}">
            @error("season_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="trailer_url_type" class="form-label">trailer_url_type</label>
            <input type="text" class="form-control" name="trailer_url_type" value="{{old("trailer_url_type", $episode["trailer_url_type"])}}">
            @error("trailer_url_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="trailer_url" class="form-label">trailer_url</label>
            <input type="text" class="form-control" name="trailer_url" value="{{old("trailer_url", $episode["trailer_url"])}}">
            @error("trailer_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="access" class="form-label">access</label>
            <input type="text" class="form-control" name="access" value="{{old("access", $episode["access"])}}">
            @error("access")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="plan_id" class="form-label">plan_id</label>
            <input type="text" class="form-control" name="plan_id" value="{{old("plan_id", $episode["plan_id"])}}">
            @error("plan_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="IMDb_rating" class="form-label">IMDb_rating</label>
            <input type="text" class="form-control" name="IMDb_rating" value="{{old("IMDb_rating", $episode["IMDb_rating"])}}">
            @error("IMDb_rating")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="content_rating" class="form-label">content_rating</label>
            <input type="text" class="form-control" name="content_rating" value="{{old("content_rating", $episode["content_rating"])}}">
            @error("content_rating")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="duration" class="form-label">duration</label>
            <input type="text" class="form-control" name="duration" value="{{old("duration", $episode["duration"])}}">
            @error("duration")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="release_date" class="form-label">release_date</label>
            <input type="text" class="form-control" name="release_date" value="{{old("release_date", $episode["release_date"])}}">
            @error("release_date")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_restricted" class="form-label">is_restricted</label>
            <input type="text" class="form-control" name="is_restricted" value="{{old("is_restricted", $episode["is_restricted"])}}">
            @error("is_restricted")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="short_desc" class="form-label">short_desc</label>
            <input type="text" class="form-control" name="short_desc" value="{{old("short_desc", $episode["short_desc"])}}">
            @error("short_desc")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{old("description", $episode["description"])}}">
            @error("description")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="enable_quality" class="form-label">enable_quality</label>
            <input type="text" class="form-control" name="enable_quality" value="{{old("enable_quality", $episode["enable_quality"])}}">
            @error("enable_quality")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="video_upload_type" class="form-label">video_upload_type</label>
            <input type="text" class="form-control" name="video_upload_type" value="{{old("video_upload_type", $episode["video_upload_type"])}}">
            @error("video_upload_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="video_url_input" class="form-label">video_url_input</label>
            <input type="text" class="form-control" name="video_url_input" value="{{old("video_url_input", $episode["video_url_input"])}}">
            @error("video_url_input")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="download_status" class="form-label">download_status</label>
            <input type="text" class="form-control" name="download_status" value="{{old("download_status", $episode["download_status"])}}">
            @error("download_status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="download_type" class="form-label">download_type</label>
            <input type="text" class="form-control" name="download_type" value="{{old("download_type", $episode["download_type"])}}">
            @error("download_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="download_url" class="form-label">download_url</label>
            <input type="text" class="form-control" name="download_url" value="{{old("download_url", $episode["download_url"])}}">
            @error("download_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="enable_download_quality" class="form-label">enable_download_quality</label>
            <input type="text" class="form-control" name="enable_download_quality" value="{{old("enable_download_quality", $episode["enable_download_quality"])}}">
            @error("enable_download_quality")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status", $episode["status"])}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $episode["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $episode["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $episode["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="video_quality_url" class="form-label">video_quality_url</label>
            <input type="text" class="form-control" name="video_quality_url" value="{{old("video_quality_url", $episode["video_quality_url"])}}">
            @error("video_quality_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="tmdb_id" class="form-label">tmdb_id</label>
            <input type="text" class="form-control" name="tmdb_id" value="{{old("tmdb_id", $episode["tmdb_id"])}}">
            @error("tmdb_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="tmdb_season" class="form-label">tmdb_season</label>
            <input type="text" class="form-control" name="tmdb_season" value="{{old("tmdb_season", $episode["tmdb_season"])}}">
            @error("tmdb_season")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="episode_number" class="form-label">episode_number</label>
            <input type="text" class="form-control" name="episode_number" value="{{old("episode_number", $episode["episode_number"])}}">
            @error("episode_number")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $episode["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="poster_tv_url" class="form-label">poster_tv_url</label>
            <input type="text" class="form-control" name="poster_tv_url" value="{{old("poster_tv_url", $episode["poster_tv_url"])}}">
            @error("poster_tv_url")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>