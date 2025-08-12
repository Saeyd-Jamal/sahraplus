<div class="container">
    <h2>Create devices</h2>
    <form action="{{ route('devices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id")}}">
            @error("user_id")
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
            <label for="device_name" class="form-label">device_name</label>
            <input type="text" class="form-control" name="device_name" value="{{old("device_name")}}">
            @error("device_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="active_profile" class="form-label">active_profile</label>
            <input type="text" class="form-control" name="active_profile" value="{{old("active_profile")}}">
            @error("active_profile")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="platform" class="form-label">platform</label>
            <input type="text" class="form-control" name="platform" value="{{old("platform")}}">
            @error("platform")
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