$(document).ready(function () {
    $(document).on("click", "#openMediaModalBtn", function () {
        loadMedia();
    });

    // رفع صورة
    $(document).on("click", "#uploadFormBtn", function (e) {
        e.preventDefault();

        const $form = $(this).closest("form");
        const formEl = $form[0];

        const fileInput = $form.find('input[type="file"]')[0];

        if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
            alert("من فضلك اختر صورة قبل الرفع.");
            return;
        }

        const formData = new FormData(formEl);
        formData.append("_token", _token);
        formData.append("image", fileInput.files[0]);

        $.ajax({
            url: urlStore,
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                $(fileInput).val("");
                loadMedia();
            },
            error: function (xhr) {
                console.error(xhr.responseText || xhr.statusText);
                alert("تعذّر رفع الصورة.");
            },
        });
    });

    // جلب الصور
    function loadMedia() {
        $.get(urlIndex, function (data) {
            let html = "";
            data.forEach((item) => {
                html += `
                <div class="overflow-hidden masonry-item position-relative" data-path="${item.file_path}">
                        <img src="${urlAssetPath}/storage/${item.file_path}" class="img-fluid media-image">
                        <div class="top-0 p-2 media-actions position-absolute" style="display: none;">
                            <button class="border btn btn-sm btn-light rounded-circle edit-btn" data-id="${item.id}" data-name="${item.name}" title="تعديل">
                                <i class="fas fa-pen text-secondary"></i>
                            </button>
                            <button class="border btn btn-sm btn-light rounded-circle me-1 delete-btn" data-id="${item.id}" title="حذف">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </div>
                        <div class="p-2 text-center info">
                            <small>${item.name}</small>
                        </div>
                </div>
            `;
            });
            $("#mediaGrid").html(html);
        });
    }

    let deleteId = null;

    $(document).on("click", ".delete-btn", function () {
        deleteId = $(this).data("id");

        // افتح المودال بضغط الزر
        $("#openDeleteModalBtn").click();
    });

    $("#confirmDeleteBtn").click(function () {
        if (deleteId) {
            $.ajax({
                url: urlDelete.replace(":id", deleteId),
                method: "DELETE",
                data: {
                    _token: _token,
                },
                success: function () {
                    $("#closeDeleteModal").click();
                    loadMedia();
                },
            });
        }
    });
    // اختيار الصورة
    $(document).on("click", ".masonry-item", function () {
        let path = $(this).data("path");
        $("#closeMediaModal").click();
        $('#imageInputPath').val(path);
        $("#uploadedAvatar").attr("src",urlAssetPath + "/storage/" + path);
    });
});
