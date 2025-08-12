<div class="container">
    <h2>Create coupon_subscription_plans</h2>
    <form action="{{ route('coupon_subscription_plans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="coupon_id" class="form-label">coupon_id</label>
            <input type="text" class="form-control" name="coupon_id" value="{{old("coupon_id")}}">
            @error("coupon_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="subscription_plan_id" class="form-label">subscription_plan_id</label>
            <input type="text" class="form-control" name="subscription_plan_id" value="{{old("subscription_plan_id")}}">
            @error("subscription_plan_id")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>