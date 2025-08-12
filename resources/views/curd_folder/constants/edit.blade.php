<div class="container">
    <h2>Edit constant</h2>
    <form action="{{ route('constants.update', $constant->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $constant["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type", $constant["type"])}}">
            @error("type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="value" class="form-label">value</label>
            <input type="text" class="form-control" name="value" value="{{old("value", $constant["value"])}}">
            @error("value")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="sequence" class="form-label">sequence</label>
            <input type="text" class="form-control" name="sequence" value="{{old("sequence", $constant["sequence"])}}">
            @error("sequence")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="sub_type" class="form-label">sub_type</label>
            <input type="text" class="form-control" name="sub_type" value="{{old("sub_type", $constant["sub_type"])}}">
            @error("sub_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status", $constant["status"])}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $constant["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $constant["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $constant["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $constant["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>