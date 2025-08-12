<div class="container">
    <h2>Edit address</h2>
    <form action="{{ route('addresses.update', $address->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="address_line_1" class="form-label">address_line_1</label>
            <input type="text" class="form-control" name="address_line_1" value="{{old("address_line_1", $address["address_line_1"])}}">
            @error("address_line_1")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="address_line_2" class="form-label">address_line_2</label>
            <input type="text" class="form-control" name="address_line_2" value="{{old("address_line_2", $address["address_line_2"])}}">
            @error("address_line_2")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="postal_code" class="form-label">postal_code</label>
            <input type="text" class="form-control" name="postal_code" value="{{old("postal_code", $address["postal_code"])}}">
            @error("postal_code")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="city" class="form-label">city</label>
            <input type="text" class="form-control" name="city" value="{{old("city", $address["city"])}}">
            @error("city")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="state" class="form-label">state</label>
            <input type="text" class="form-control" name="state" value="{{old("state", $address["state"])}}">
            @error("state")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="country" class="form-label">country</label>
            <input type="text" class="form-control" name="country" value="{{old("country", $address["country"])}}">
            @error("country")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="latitude" class="form-label">latitude</label>
            <input type="text" class="form-control" name="latitude" value="{{old("latitude", $address["latitude"])}}">
            @error("latitude")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="longitude" class="form-label">longitude</label>
            <input type="text" class="form-control" name="longitude" value="{{old("longitude", $address["longitude"])}}">
            @error("longitude")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_primary" class="form-label">is_primary</label>
            <input type="text" class="form-control" name="is_primary" value="{{old("is_primary", $address["is_primary"])}}">
            @error("is_primary")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="addressable_type" class="form-label">addressable_type</label>
            <input type="text" class="form-control" name="addressable_type" value="{{old("addressable_type", $address["addressable_type"])}}">
            @error("addressable_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="addressable_id" class="form-label">addressable_id</label>
            <input type="text" class="form-control" name="addressable_id" value="{{old("addressable_id", $address["addressable_id"])}}">
            @error("addressable_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $address["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $address["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $address["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $address["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>