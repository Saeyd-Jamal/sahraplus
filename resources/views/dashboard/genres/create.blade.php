<x-dashboard-layout>
    <form action="{{route('dashboard.genres.store')}}" method="post" class="col-12" enctype="multipart/form-data">
        @csrf
        @include("dashboard.genres._form")
    </form>
</x-dashboard-layout>
