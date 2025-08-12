<div class="container">
    <h2>Create coupons</h2>
    <form action="{{ route('coupons.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">code</label>
            <input type="text" class="form-control" name="code" value="{{old("code")}}">
            @error("code")
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
            <label for="start_date" class="form-label">start_date</label>
            <input type="text" class="form-control" name="start_date" value="{{old("start_date")}}">
            @error("start_date")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="expire_date" class="form-label">expire_date</label>
            <input type="text" class="form-control" name="expire_date" value="{{old("expire_date")}}">
            @error("expire_date")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="discount_type" class="form-label">discount_type</label>
            <input type="text" class="form-control" name="discount_type" value="{{old("discount_type")}}">
            @error("discount_type")
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
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status")}}">
            @error("status")
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