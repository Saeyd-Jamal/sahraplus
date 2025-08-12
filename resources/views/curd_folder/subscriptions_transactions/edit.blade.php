<div class="container">
    <h2>Edit subscriptionsTransaction</h2>
    <form action="{{ route('subscriptions_transactions.update', $subscriptionsTransaction->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="subscriptions_id" class="form-label">subscriptions_id</label>
            <input type="text" class="form-control" name="subscriptions_id" value="{{old("subscriptions_id", $subscriptionsTransaction["subscriptions_id"])}}">
            @error("subscriptions_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $subscriptionsTransaction["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="amount" class="form-label">amount</label>
            <input type="text" class="form-control" name="amount" value="{{old("amount", $subscriptionsTransaction["amount"])}}">
            @error("amount")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="payment_type" class="form-label">payment_type</label>
            <input type="text" class="form-control" name="payment_type" value="{{old("payment_type", $subscriptionsTransaction["payment_type"])}}">
            @error("payment_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="payment_status" class="form-label">payment_status</label>
            <input type="text" class="form-control" name="payment_status" value="{{old("payment_status", $subscriptionsTransaction["payment_status"])}}">
            @error("payment_status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="transaction_id" class="form-label">transaction_id</label>
            <input type="text" class="form-control" name="transaction_id" value="{{old("transaction_id", $subscriptionsTransaction["transaction_id"])}}">
            @error("transaction_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="tax_data" class="form-label">tax_data</label>
            <input type="text" class="form-control" name="tax_data" value="{{old("tax_data", $subscriptionsTransaction["tax_data"])}}">
            @error("tax_data")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="other_transactions_details" class="form-label">other_transactions_details</label>
            <input type="text" class="form-control" name="other_transactions_details" value="{{old("other_transactions_details", $subscriptionsTransaction["other_transactions_details"])}}">
            @error("other_transactions_details")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="created_by" class="form-label">created_by</label>
            <input type="text" class="form-control" name="created_by" value="{{old("created_by", $subscriptionsTransaction["created_by"])}}">
            @error("created_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="text" class="form-control" name="updated_by" value="{{old("updated_by", $subscriptionsTransaction["updated_by"])}}">
            @error("updated_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_by" class="form-label">deleted_by</label>
            <input type="text" class="form-control" name="deleted_by" value="{{old("deleted_by", $subscriptionsTransaction["deleted_by"])}}">
            @error("deleted_by")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $subscriptionsTransaction["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>