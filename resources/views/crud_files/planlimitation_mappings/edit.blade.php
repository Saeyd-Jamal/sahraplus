<div class="container">
    <h2>Edit planlimitationMapping</h2>
    <form action="{{ route('planlimitation_mappings.update', $planlimitationMapping->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="plan_id" class="form-label">plan_id</label>
            <input type="text" class="form-control" name="plan_id" value="{{old("plan_id", $planlimitationMapping["plan_id"])}}">
            @error("plan_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="planlimitation_id" class="form-label">planlimitation_id</label>
            <input type="text" class="form-control" name="planlimitation_id" value="{{old("planlimitation_id", $planlimitationMapping["planlimitation_id"])}}">
            @error("planlimitation_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="limitation_slug" class="form-label">limitation_slug</label>
            <input type="text" class="form-control" name="limitation_slug" value="{{old("limitation_slug", $planlimitationMapping["limitation_slug"])}}">
            @error("limitation_slug")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="limitation_value" class="form-label">limitation_value</label>
            <input type="text" class="form-control" name="limitation_value" value="{{old("limitation_value", $planlimitationMapping["limitation_value"])}}">
            @error("limitation_value")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="limit" class="form-label">limit</label>
            <input type="text" class="form-control" name="limit" value="{{old("limit", $planlimitationMapping["limit"])}}">
            @error("limit")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $planlimitationMapping["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $planlimitationMapping["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $planlimitationMapping["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $planlimitationMapping["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>