<x-dashboard-layout>
    @push('styles')
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="{{asset('css/datatable/jquery.dataTables.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/datatable/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('css/datatable/dataTables.dataTables.css')}}">
        <link rel="stylesheet" href="{{asset('css/datatable/buttons.dataTables.css')}}">

        {{-- sticky table --}}
        <link id="stickyTableLight" rel="stylesheet" href="{{ asset('css/custom/stickyTable.css') }}">

        {{-- custom css --}}
        <link rel="stylesheet" href="{{ asset('css/custom/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom/datatableIndex.css') }}">
        <style>
            .btn-icon{
                padding: 5px !important;
            }
        </style>
    @endpush
    <x-slot:extra_nav>
        <div class="nav-item">
            <button type="button" class="text-white btn btn-icon btn-success" id="excel-export" title="تصدير excel">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="16" height="16">
                    <path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z"/>
                </svg>
            </button>
        </div>
        {{-- @can('create', 'App\\Models\Genre') --}}
        <div class="mx-2 nav-item">
            <a href="{{ route('dashboard.genres.create') }}" class="m-0 btn btn-icon text-success">
                <i class="fa-solid fa-plus fe-16"></i>
            </a>
        </div>
        {{-- @endcan --}}
        <div class="mx-2 nav-item">
            <div class="dropdown">
                <button class="p-2 border-0 btn btn-text-secondary rounded-pill text-muted me-n1 waves-effect waves-light" type="button" id="earningReportsId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa-solid fa-filter fe-16"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(4px, 38px);">
                    <a class="dropdown-item waves-effect" id="filterBtn" href="javascript:void(0);">تصفية</a>
                    <a class="dropdown-item waves-effect" id="filterBtnClear" href="javascript:void(0);">إزالة التصفية</a>
                </div>
            </div>
        </div>
        <div class="mx-2 nav-item d-flex align-items-center justify-content-center">
            <button type="button" class="btn" id="refreshData">
                <i class="fa-solid fa-arrows-rotate"></i>
            </button>
        </div>
    </x-slot:extra_nav>
    @php
        $fields = [
            'name' => 'التصنيف',
            'status' => 'الحالة',
        ];
    @endphp

    <div class="mx-0 row">
        <div class="col-md-12" style="padding: 0 2px;">
            <div class="card">
                <div class="p-0 card-body table-container">
                    <table id="genres-table" class="table sticky table-striped table-bordered table-hover" style="display: table; width:100%; height: auto;">
                        <thead>
                            <tr>
                                <th class="text-center text-white">#</th>
                                @foreach ($fields as $index => $label)
                                    <th>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span>{{ $label }}</span>
                                            <div class="ml-4 filter-dropdown">
                                                <div class="dropdown">
                                                    <button class="p-2 border-0 btn btn-text-secondary rounded-pill text-muted me-n1 waves-effect waves-light btn-filter" id="btn-filter-{{ $loop->index + 1 }}" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="text-white fa-brands fa-get-pocket"></i>
                                                    </button>
                                                    <div class="p-2 filterDropdownMenu dropdown-menu dropdown-menu-right" aria-labelledby="earningReportsId" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(4px, 38px);" aria-labelledby="{{ $index }}_filter">
                                                        <div class="searchable-checkbox">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <input type="search" class="form-control search-checkbox" data-index="{{ $loop->index + 1 }}" placeholder="ابحث...">
                                                                <button class="text-white btn btn-success filter-apply-btn-checkbox" data-target="{{ $loop->index + 1 }}" data-field="{{ $index }}">
                                                                    <i class="fa-solid fa-check"></i>
                                                                </button>
                                                            </div>
                                                            <div class="checkbox-list-box">
                                                                <label style="display: block;">
                                                                    <input type="checkbox" value="all" class="all-checkbox" data-index="{{ $loop->index + 1 }}"> الكل
                                                                </label>
                                                                <div class="checkbox-list checkbox-list-{{ $loop->index + 1 }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                @endforeach
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <td></td>
                                <td class="text-center text-white" id="count_employees"></td>
                                <td class='sticky text-left' colSpan="3">المجموع</td>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <!-- DataTables JS -->
        <script src="{{asset('js/plugins/datatable/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatable/dataTables.js')}}"></script>
        <script src="{{asset('js/plugins/datatable/dataTables.buttons.js')}}"></script>
        <script src="{{asset('js/plugins/datatable/buttons.dataTables.js')}}"></script>
        <script src="{{asset('js/plugins/datatable/jszip.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatable/pdfmake.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatable/vfs_fonts.js')}}"></script>
        <script src="{{asset('js/plugins/datatable/buttons.html5.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatable/buttons.print.min.js')}}"></script>
        <script src="{{asset('js/plugins/jquery.validate.min.js')}}"></script>

        {{-- script --}}
        <script>
            const tableId = 'genres-table';
            const arabicFileJson = "{{ asset('files/Arabic.json')}}";

            // urls
            const _token = "{{ csrf_token() }}";
            const urlIndex = '{{ route("dashboard.genres.index") }}';
            const urlCreate = '{{ route("dashboard.genres.create") }}';
            const urlEdit = '{{ route("dashboard.genres.edit", ":id") }}';
            const urlDelete = '{{ route("dashboard.genres.destroy", ":id") }}';

            // ability
            // const abilityCreate = "{{ Auth::user()->can('create', 'App\\Models\\Genre') }}";
            // const abilityEdit = "{{ Auth::user()->can('update', 'App\\Models\\Genre') }}";
            // const abilityDelete = "{{ Auth::user()->can('delete', 'App\\Models\\Genre') }}";
            const abilityCreate = true;
            const abilityEdit = true;
            const abilityDelete = true;

            const fields = [
                'name',
                'status'
            ];
            const columnsTable = [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, class: 'text-center'}, // عمود الترقيم التلقائي
                { data: 'name', name: 'name' , orderable: false, render: function(data, type, row) {
                    let img = row.image_url;
                    let desc = row.description || '-';
                    return `
                        <div style="display:flex; align-items:center; gap:8px;">
                            <img src="${img}" alt="${data}" style="width:40px; height:40px; object-fit:cover; border-radius:4px;">
                            <div style="display:flex; flex-direction:column;">
                                <span style="font-weight:500; color:#000;">${data}</span>
                                <small style="color:#aaa;">${desc}</small>
                            </div>
                        </div>
                    `;
                } },
                { data: 'status', name: 'status', orderable: false, class: 'text-center', render: function(data, type, row) {
                    if (data == 1) {
                        return `
                            <span style="
                                display:inline-flex;
                                align-items:center;
                                gap:5px;
                                background:rgba(25,135,84,0.15);
                                color:#198754;
                                padding:3px 8px;
                                border-radius:12px;
                                font-size:0.85rem;
                                font-weight:500;
                            ">
                                <i class="ph ph-check-circle" style="font-size:1rem;"></i> نشط
                            </span>
                        `;
                    } else {
                        return `
                            <span style="
                                display:inline-flex;
                                align-items:center;
                                gap:5px;
                                background:rgba(220,53,69,0.15);
                                color:#dc3545;
                                padding:3px 8px;
                                border-radius:12px;
                                font-size:0.85rem;
                                font-weight:500;
                            ">
                                <i class="ph ph-x-circle" style="font-size:1rem;"></i> غير نشط
                            </span>
                        `;
                    }
                }},
                { data: 'edit', name: 'edit', orderable: false, searchable: false, render: function(data, type, row) {
                    if (abilityEdit) {
                        let linkedit = `
                            <a href="${urlEdit.replace(':id', data)}"
                            class="btn btn-sm"
                            style="background:rgba(13,110,253,0.15); color:#0d6efd; border-radius:6px; padding:4px 8px; margin-inline:2px;"
                            title="تعديل">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        `;
                        let linkdelete = `
                            <button class="btn btn-sm delete_row"
                                    data-id="${data}"
                                    style="background:rgba(220,53,69,0.15); color:#dc3545; border-radius:6px; padding:4px 8px; margin-inline:2px;"
                                    title="حذف">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        `;
                        return linkedit + linkdelete;
                    }
                    return '';
                }},
            ];
        </script>
        <script type="text/javascript" src="{{asset('js/custom/datatable.js')}}"></script>
    @endpush
</x-dashboard-layout>
