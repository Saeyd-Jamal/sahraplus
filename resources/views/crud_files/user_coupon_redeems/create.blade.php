<div class="container">
    <h2>Create user_coupon_redeems</h2>
    <form action="{{ route('user_coupon_redeems.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="coupon_code" class="form-label">coupon_code</label>
            <input type="text" class="form-control" name="coupon_code" value="{{old("coupon_code")}}">
            @error("coupon_code")
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
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id")}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="coupon_id" class="form-label">coupon_id</label>
            <input type="text" class="form-control" name="coupon_id" value="{{old("coupon_id")}}">
            @error("coupon_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="booking_id" class="form-label">booking_id</label>
            <input type="text" class="form-control" name="booking_id" value="{{old("booking_id")}}">
            @error("booking_id")
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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>