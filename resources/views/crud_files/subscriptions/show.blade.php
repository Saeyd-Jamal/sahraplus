<div class="container">
    <h2>subscription Details</h2>
     <p><strong>plan_id:</strong> {{ $subscription ->plan_id }}</p>
<p><strong>user_id:</strong> {{ $subscription ->user_id }}</p>
<p><strong>start_date:</strong> {{ $subscription ->start_date }}</p>
<p><strong>end_date:</strong> {{ $subscription ->end_date }}</p>
<p><strong>status:</strong> {{ $subscription ->status }}</p>
<p><strong>is_manual:</strong> {{ $subscription ->is_manual }}</p>
<p><strong>amount:</strong> {{ $subscription ->amount }}</p>
<p><strong>discount_percentage:</strong> {{ $subscription ->discount_percentage }}</p>
<p><strong>tax_amount:</strong> {{ $subscription ->tax_amount }}</p>
<p><strong>coupon_discount:</strong> {{ $subscription ->coupon_discount }}</p>
<p><strong>total_amount:</strong> {{ $subscription ->total_amount }}</p>
<p><strong>name:</strong> {{ $subscription ->name }}</p>
<p><strong>identifier:</strong> {{ $subscription ->identifier }}</p>
<p><strong>type:</strong> {{ $subscription ->type }}</p>
<p><strong>duration:</strong> {{ $subscription ->duration }}</p>
<p><strong>level:</strong> {{ $subscription ->level }}</p>
<p><strong>plan_type:</strong> {{ $subscription ->plan_type }}</p>
<p><strong>payment_id:</strong> {{ $subscription ->payment_id }}</p>
<p><strong>device_id:</strong> {{ $subscription ->device_id }}</p>
<p><strong>created_by:</strong> {{ $subscription ->created_by }}</p>
<p><strong>updated_by:</strong> {{ $subscription ->updated_by }}</p>
<p><strong>deleted_by:</strong> {{ $subscription ->deleted_by }}</p>
<p><strong>deleted_at:</strong> {{ $subscription ->deleted_at }}</p>

</div>