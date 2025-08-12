<div class="container">
<h2>coupon_subscription_plans List</h2>
<a href="{{ route('coupon_subscription_plans.create') }}" class="btn btn-primary mb-3">Create coupon_subscription_plans</a>
<table class="table">
    <thead>
        <tr><th>coupon_id</th><th>subscription_plan_id</th></tr>
    </thead>
    <tbody>
        @foreach ($coupon_subscription_plans as $item)
                <tr>
                    <td>{{$item->coupon_id}}</td>
<td>{{$item->subscription_plan_id}}</td>
<td>
                        <a href="{{ route('coupon_subscription_plans.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('coupon_subscription_plans.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>