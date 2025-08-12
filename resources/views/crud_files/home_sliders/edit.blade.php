<div class="container">
    <h2>Edit homeSlider</h2>
    <form action="{{ route('home_sliders.update', $homeSlider->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="title_ar" class="form-label">title_ar</label>
            <input type="text" class="form-control" name="title_ar" value="{{old("title_ar", $homeSlider["title_ar"])}}">
            @error("title_ar")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="title_en" class="form-label">title_en</label>
            <input type="text" class="form-control" name="title_en" value="{{old("title_en", $homeSlider["title_en"])}}">
            @error("title_en")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="title_el" class="form-label">title_el</label>
            <input type="text" class="form-control" name="title_el" value="{{old("title_el", $homeSlider["title_el"])}}">
            @error("title_el")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="title_fr" class="form-label">title_fr</label>
            <input type="text" class="form-control" name="title_fr" value="{{old("title_fr", $homeSlider["title_fr"])}}">
            @error("title_fr")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="title_de" class="form-label">title_de</label>
            <input type="text" class="form-control" name="title_de" value="{{old("title_de", $homeSlider["title_de"])}}">
            @error("title_de")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $homeSlider["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="position" class="form-label">position</label>
            <input type="text" class="form-control" name="position" value="{{old("position", $homeSlider["position"])}}">
            @error("position")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status", $homeSlider["status"])}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="numbering" class="form-label">numbering</label>
            <input type="text" class="form-control" name="numbering" value="{{old("numbering", $homeSlider["numbering"])}}">
            @error("numbering")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_restricted" class="form-label">is_restricted</label>
            <input type="text" class="form-control" name="is_restricted" value="{{old("is_restricted", $homeSlider["is_restricted"])}}">
            @error("is_restricted")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>