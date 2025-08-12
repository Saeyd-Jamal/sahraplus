<div class="container">
    <h2>Create service_providers</h2>
    <form action="{{ route('service_providers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" class="form-control" name="slug" value="{{old("slug")}}">
            @error("slug")
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
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{old("description")}}">
            @error("description")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="payment_method" class="form-label">payment_method</label>
            <input type="text" class="form-control" name="payment_method" value="{{old("payment_method")}}">
            @error("payment_method")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="manager_id" class="form-label">manager_id</label>
            <input type="text" class="form-control" name="manager_id" value="{{old("manager_id")}}">
            @error("manager_id")
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
            <label for="contact_email" class="form-label">contact_email</label>
            <input type="text" class="form-control" name="contact_email" value="{{old("contact_email")}}">
            @error("contact_email")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="contact_number" class="form-label">contact_number</label>
            <input type="text" class="form-control" name="contact_number" value="{{old("contact_number")}}">
            @error("contact_number")
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