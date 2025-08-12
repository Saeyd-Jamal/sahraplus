<div class="container">
    <h2>Create plans</h2>
    <form action="{{ route('plans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name")}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="identifier" class="form-label">identifier</label>
            <input type="text" class="form-control" name="identifier" value="{{old("identifier")}}">
            @error("identifier")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="android_identifier" class="form-label">android_identifier</label>
            <input type="text" class="form-control" name="android_identifier" value="{{old("android_identifier")}}">
            @error("android_identifier")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="apple_identifier" class="form-label">apple_identifier</label>
            <input type="text" class="form-control" name="apple_identifier" value="{{old("apple_identifier")}}">
            @error("apple_identifier")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="text" class="form-control" name="price" value="{{old("price")}}">
            @error("price")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="discount" class="form-label">discount</label>
            <input type="text" class="form-control" name="discount" value="{{old("discount")}}">
            @error("discount")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="discount_percentage" class="form-label">discount_percentage</label>
            <input type="text" class="form-control" name="discount_percentage" value="{{old("discount_percentage")}}">
            @error("discount_percentage")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="total_price" class="form-label">total_price</label>
            <input type="text" class="form-control" name="total_price" value="{{old("total_price")}}">
            @error("total_price")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="level" class="form-label">level</label>
            <input type="text" class="form-control" name="level" value="{{old("level")}}">
            @error("level")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="duration" class="form-label">duration</label>
            <input type="text" class="form-control" name="duration" value="{{old("duration")}}">
            @error("duration")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="duration_value" class="form-label">duration_value</label>
            <input type="text" class="form-control" name="duration_value" value="{{old("duration_value")}}">
            @error("duration_value")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status")}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{old("description")}}">
            @error("description")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by")}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by")}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by")}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at")}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>