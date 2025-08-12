<div class="container">
    <h2>Edit user</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="username" class="form-label">username</label>
            <input type="text" class="form-control" name="username" value="{{old("username", $user["username"])}}">
            @error("username")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="first_name" class="form-label">first_name</label>
            <input type="text" class="form-control" name="first_name" value="{{old("first_name", $user["first_name"])}}">
            @error("first_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="last_name" class="form-label">last_name</label>
            <input type="text" class="form-control" name="last_name" value="{{old("last_name", $user["last_name"])}}">
            @error("last_name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" name="email" value="{{old("email", $user["email"])}}">
            @error("email")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="mobile" class="form-label">mobile</label>
            <input type="text" class="form-control" name="mobile" value="{{old("mobile", $user["mobile"])}}">
            @error("mobile")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="login_type" class="form-label">login_type</label>
            <input type="text" class="form-control" name="login_type" value="{{old("login_type", $user["login_type"])}}">
            @error("login_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="file_url" class="form-label">file_url</label>
            <input type="text" class="form-control" name="file_url" value="{{old("file_url", $user["file_url"])}}">
            @error("file_url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="gender" class="form-label">gender</label>
            <input type="text" class="form-control" name="gender" value="{{old("gender", $user["gender"])}}">
            @error("gender")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="date_of_birth" class="form-label">date_of_birth</label>
            <input type="text" class="form-control" name="date_of_birth" value="{{old("date_of_birth", $user["date_of_birth"])}}">
            @error("date_of_birth")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="email_verified_at" class="form-label">email_verified_at</label>
            <input type="text" class="form-control" name="email_verified_at" value="{{old("email_verified_at", $user["email_verified_at"])}}">
            @error("email_verified_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="text" class="form-control" name="password" value="{{old("password", $user["password"])}}">
            @error("password")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_banned" class="form-label">is_banned</label>
            <input type="text" class="form-control" name="is_banned" value="{{old("is_banned", $user["is_banned"])}}">
            @error("is_banned")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_subscribe" class="form-label">is_subscribe</label>
            <input type="text" class="form-control" name="is_subscribe" value="{{old("is_subscribe", $user["is_subscribe"])}}">
            @error("is_subscribe")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" name="status" value="{{old("status", $user["status"])}}">
            @error("status")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="last_notification_seen" class="form-label">last_notification_seen</label>
            <input type="text" class="form-control" name="last_notification_seen" value="{{old("last_notification_seen", $user["last_notification_seen"])}}">
            @error("last_notification_seen")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="address" class="form-label">address</label>
            <input type="text" class="form-control" name="address" value="{{old("address", $user["address"])}}">
            @error("address")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="user_type" class="form-label">user_type</label>
            <input type="text" class="form-control" name="user_type" value="{{old("user_type", $user["user_type"])}}">
            @error("user_type")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="pin" class="form-label">pin</label>
            <input type="text" class="form-control" name="pin" value="{{old("pin", $user["pin"])}}">
            @error("pin")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="otp" class="form-label">otp</label>
            <input type="text" class="form-control" name="otp" value="{{old("otp", $user["otp"])}}">
            @error("otp")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="is_parental_lock_enable" class="form-label">is_parental_lock_enable</label>
            <input type="text" class="form-control" name="is_parental_lock_enable" value="{{old("is_parental_lock_enable", $user["is_parental_lock_enable"])}}">
            @error("is_parental_lock_enable")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="remember_token" class="form-label">remember_token</label>
            <input type="text" class="form-control" name="remember_token" value="{{old("remember_token", $user["remember_token"])}}">
            @error("remember_token")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="deleted_at" class="form-label">deleted_at</label>
            <input type="text" class="form-control" name="deleted_at" value="{{old("deleted_at", $user["deleted_at"])}}">
            @error("deleted_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="father_code" class="form-label">father_code</label>
            <input type="text" class="form-control" name="father_code" value="{{old("father_code", $user["father_code"])}}">
            @error("father_code")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>