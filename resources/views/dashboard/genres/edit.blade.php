<x-dashboard-layout>
    <form action="{{route('dashboard.genres.update', $genre->id)}}" method="post" class="col-12" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        @include("dashboard.genres._form")
    </form>
</x-dashboard-layout>
