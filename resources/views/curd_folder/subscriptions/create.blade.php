<div class="container">
    <h2>Create subscriptions</h2>
    <form action="{{ route('subscriptions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="plan_id" class="form-label">plan_id</label>
            <input type="text" class="form-control" name="plan_id" value="{{old("plan_id")}}">
            @error("plan_id")
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
            <label for="start_date" class="form-label">start_date</label>
            <input type="text" class="form-control" name="start_date" value="{{old("start_date")}}">
            @error("start_date")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="end_date" class="form-label">end_date</label>
            <input type="text" class="form-control" name="end_date" value="{{old("end_date")}}">
            @error("end_date")
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
            <label for="is_manual" class="form-label">is_manual</label>
            <input type="text" class="form-control" name="is_manual" value="{{old("is_manual")}}">
            @error("is_manual")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="amount" class="form-label">amount</label>
            <input type="text" class="form-control" name="amount" value="{{old("amount")}}">
            @error("amount")
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
            <label for="tax_amount" class="form-label">tax_amount</label>
            <input type="text" class="form-control" name="tax_amount" value="{{old("tax_amount")}}">
            @error("tax_amount")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="coupon_discount" class="form-label">coupon_discount</label>
            <input type="text" class="form-control" name="coupon_discount" value="{{old("coupon_discount")}}">
            @error("coupon_discount")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="total_amount" class="form-label">total_amount</label>
            <input type="text" class="form-control" name="total_amount" value="{{old("total_amount")}}">
            @error("total_amount")
                <p>{{$message}}</p>
            @enderror
        </div>
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
            <label for="type" class="form-label">type</label>
            <input type="text" class="form-control" name="type" value="{{old("type")}}">
            @error("type")
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
            <label for="level" class="form-label">level</label>
            <input type="text" class="form-control" name="level" value="{{old("level")}}">
            @error("level")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="plan_type" class="form-label">plan_type</label>
            <input type="text" class="form-control" name="plan_type" value="{{old("plan_type")}}">
            @error("plan_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="payment_id" class="form-label">payment_id</label>
            <input type="text" class="form-control" name="payment_id" value="{{old("payment_id")}}">
            @error("payment_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="device_id" class="form-label">device_id</label>
            <input type="text" class="form-control" name="device_id" value="{{old("device_id")}}">
            @error("device_id")
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