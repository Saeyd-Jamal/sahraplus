<div class="container">
    <h2>Edit media</h2>
    <form action="{{ route('media.update', $media->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="model_type" class="form-label">model_type</label>
            <input type="text" class="form-control" name="model_type" value="{{old("model_type", $media["model_type"])}}">
            @error("model_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="model_id" class="form-label">model_id</label>
            <input type="text" class="form-control" name="model_id" value="{{old("model_id", $media["model_id"])}}">
            @error("model_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="uuid" class="form-label">uuid</label>
            <input type="text" class="form-control" name="uuid" value="{{old("uuid", $media["uuid"])}}">
            @error("uuid")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="collection_name" class="form-label">collection_name</label>
            <input type="text" class="form-control" name="collection_name" value="{{old("collection_name", $media["collection_name"])}}">
            @error("collection_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $media["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="file_name" class="form-label">file_name</label>
            <input type="text" class="form-control" name="file_name" value="{{old("file_name", $media["file_name"])}}">
            @error("file_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="mime_type" class="form-label">mime_type</label>
            <input type="text" class="form-control" name="mime_type" value="{{old("mime_type", $media["mime_type"])}}">
            @error("mime_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="disk" class="form-label">disk</label>
            <input type="text" class="form-control" name="disk" value="{{old("disk", $media["disk"])}}">
            @error("disk")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="conversions_disk" class="form-label">conversions_disk</label>
            <input type="text" class="form-control" name="conversions_disk" value="{{old("conversions_disk", $media["conversions_disk"])}}">
            @error("conversions_disk")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="size" class="form-label">size</label>
            <input type="text" class="form-control" name="size" value="{{old("size", $media["size"])}}">
            @error("size")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="manipulations" class="form-label">manipulations</label>
            <input type="text" class="form-control" name="manipulations" value="{{old("manipulations", $media["manipulations"])}}">
            @error("manipulations")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="custom_properties" class="form-label">custom_properties</label>
            <input type="text" class="form-control" name="custom_properties" value="{{old("custom_properties", $media["custom_properties"])}}">
            @error("custom_properties")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="generated_conversions" class="form-label">generated_conversions</label>
            <input type="text" class="form-control" name="generated_conversions" value="{{old("generated_conversions", $media["generated_conversions"])}}">
            @error("generated_conversions")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="responsive_images" class="form-label">responsive_images</label>
            <input type="text" class="form-control" name="responsive_images" value="{{old("responsive_images", $media["responsive_images"])}}">
            @error("responsive_images")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="order_column" class="form-label">order_column</label>
            <input type="text" class="form-control" name="order_column" value="{{old("order_column", $media["order_column"])}}">
            @error("order_column")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>