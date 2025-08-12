<div class="container">
    <h2>Create slider_items</h2>
    <form action="{{ route('slider_items.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="home_slider_id" class="form-label">home_slider_id</label>
            <input type="text" class="form-control" name="home_slider_id" value="{{old("home_slider_id")}}">
            @error("home_slider_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="item_id" class="form-label">item_id</label>
            <input type="text" class="form-control" name="item_id" value="{{old("item_id")}}">
            @error("item_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="position" class="form-label">position</label>
            <input type="text" class="form-control" name="position" value="{{old("position")}}">
            @error("position")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>