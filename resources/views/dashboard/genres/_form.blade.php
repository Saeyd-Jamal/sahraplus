<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="p-2 card-header">
                <h3 class="gap-2 card-title d-flex align-items-center">
                    @if ($genre->id != null)
                        <i class="ph ph-pen me-2"></i>
                    @else
                        <i class="ph ph-plus-circle me-2"></i>
                    @endif
                    {{ $genre->id != null ? 'تعديل' : 'إضافة' }} تصنيف
                </h3>
            </div>
        </div>
        <div class="mt-2 card">
            <div class="card-body">
                <div class="gap-4 d-flex align-items-start align-items-sm-center">
                    <img src="{{ $genre->image_url }}" alt="صورة النوع"
                        class="rounded border shadow-sm w-px-100 h-px-100" id="uploadedAvatar"
                        style="object-fit: cover;" />
                    <div class="button-wrapper">
                        <button type="button" id="openMediaModalBtn" data-bs-toggle="modal" data-bs-target="#mediaModal" class="mb-0 btn btn-primary me-2" tabindex="0">
                            <span class="d-none d-sm-inline">رفع صورة جديدة</span>
                            <i class="ti ti-upload d-inline d-sm-none"></i>
                        </button>
                        <input type="text" name="image" id="imageInputPath" class="account-file-input" style="display: none;" />
                        <button type="button" class="mb-0 btn btn-outline-secondary account-image-reset"
                            id="accountImageReset">
                            <i class="ti ti-refresh-dot d-inline d-sm-none"></i>
                            <span class="d-none d-sm-inline">مسح</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2 card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-4 col-md-6 col-sm-12">
                        <x-form.input label="الاسم" :value="$genre->name" name="name" placeholder="محمد ...." required
                            autofocus />
                    </div>
                    <div class="mb-4 col-md-6 col-sm-12">
                        <label for="status" class="form-label">الحالة</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="0" @selected($genre->status == 0)>غير نشط</option>
                            <option value="1" @selected($genre->status == 1 || $genre->status == null)>نشط</option>
                        </select>
                    </div>
                    <div class="mb-4 col-12">
                        <x-form.textarea label="الوصف" rows="2" :value="$genre->description" name="description"
                            placeholder="description" />
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">{{ $genre->id != null ? 'تعديل' : 'إضافة' }}</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- مودال الوسائط --}}
<div class="modal fade" id="mediaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mb-6 text-2xl font-bold modal-title">📁 مكتبة الوسائط</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeMediaModal"
                    data-pc-modal-dismiss="#mediaModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-4 modal-body">
                <form id="uploadForm" enctype="multipart/form-data" class="mb-3">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="file" name="imageFile" id="imageInput" class="mb-2 form-control">
                    <button type="button" id="uploadFormBtn" class="btn btn-primary">رفع صورة</button>
                </form>
                <div id="mediaGrid" class="masonry">
                    {{-- الصور ستُملأ تلقائيًا عبر jQuery --}}
                </div>
            </div>
            {{-- <div class="px-4 py-3 modal-footer">
                <button type="button" class="btn btn-secondary" data-pc-modal-dismiss="#editModal"
                    id="closeEditModal">إلغاء</button>
                <button type="submit" class="btn btn-success">💾 حفظ التعديلات</button>
            </div> --}}
        </div>
    </div>
</div>
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تأكيد الحذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeDeleteModal"
                    data-pc-modal-dismiss="#confirmDeleteModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                هل أنت متأكد من حذف هذه الصورة؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-pc-modal-dismiss="#confirmDeleteModal"
                    id="closeDeleteModal">إلغاء</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">نعم، حذف</button>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom/media.css') }}">
@endpush
@push('scripts')
    <script>
        const urlStore  = "{{ route('dashboard.media.store') }}";
        const urlIndex = "{{ route('dashboard.media.index') }}";
        const urlDelete = "{{ route('dashboard.media.destroy', ':id') }}";
        const urlEdit = "{{ route('dashboard.media.update', ':id') }}";
        const urlAssetPath = "{{ config('app.url') }}";
        const _token = "{{ csrf_token() }}";
        $(document).ready(function() {
            $('#accountImageReset').click(function() {
                $('#avatarUpload').val('');
            });
        });
    </script>
    <script src="{{ asset('js/custom/mediaPage.js') }}"></script>
@endpush
