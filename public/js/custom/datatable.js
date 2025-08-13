$(document).ready(function() {
    let formatNumber = (number,min = 0) => {
        // التحقق إذا كانت القيمة فارغة أو غير صالحة كرقم
        if (number === null || number === undefined || isNaN(number)) {
            return ''; // إرجاع قيمة فارغة إذا كان الرقم غير صالح
        }
        return new Intl.NumberFormat('en-US', { minimumFractionDigits: min, maximumFractionDigits: 2 }).format(number);
    };
    const table = $('#' + tableId).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,              // تعطيل الترقيم
        searching: true,            // الإبقاء على البحث إذا كنت تريده
        info: false,                // تعطيل النص السفلي الذي يوضح عدد السجلات
        lengthChange: false,        // تعطيل قائمة تغيير عدد المدخلات
        "language": {
            "url": arabicFileJson
        },
        ajax: {
            url: urlIndex,
            data: function (d) {
                // إضافة تواريخ التصفية إلى الطلب المرسل
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        },
        columns: columnsTable,
        columnDefs: [
            { targets: 1, searchable: false, orderable: false } // تعطيل الفرز والبحث على عمود الترقيم
        ],
    });
    // نسخ وظيفة الزر إلى الزر المخصص
    $('#excel-export').on('click', function () {
        table.button('.buttons-excel').trigger(); // استدعاء وظيفة الزر الأصلي
    });
    $('#print-btn').on('click', function () {
        table.button('.buttons-print').trigger(); // استدعاء وظيفة الطباعة الأصلية
    });
    $('#'+ tableId +'_filter').addClass('d-none');
    // جلب الداتا في checkbox
    function populateFilterOptions(columnIndex, container,name) {
        const uniqueValues = [];
        table.column(columnIndex, { search: 'applied' }).data().each(function (value) {
            const stringValue = value ? String(value).trim() : ''; // تحويل القيمة إلى نص وإزالة الفراغات
            if (stringValue && uniqueValues.indexOf(stringValue) === -1) {
                uniqueValues.push(stringValue);
            }
        });

        // ترتيب القيم أبجديًا
        uniqueValues.sort();

        // إضافة الخيارات إلى div
        const checkboxList = $(container);
        checkboxList.empty();
        uniqueValues.forEach(value => {
            checkboxList.append(`
                <label style="display: block;">
                    <input type="checkbox" value="${value}" class="${name}-checkbox"> ${value}
                </label>
            `);
        });
    }
    function isColumnFiltered(columnIndex) {
        const filterValue = table.column(columnIndex).search();
        return filterValue !== ""; // إذا لم يكن فارغًا، الفلترة مفعلة
    }
    // دالة لإعادة بناء الفلاتر بناءً على البيانات الحالية
    function rebuildFilters() {
        $.each(fields, function(index, field) {
            isColumnFiltered(index) ? '' : populateFilterOptions(index, '.checkbox-list-' + index, field);
        });
        for (let i = 0; i < fields.length; i++) {
            if (isColumnFiltered(i)) {
                $('#btn-filter-' + i).removeClass('btn-secondary');
                $('#btn-filter-' + i + ' i').removeClass('fa-brands fa-get-pocket').addClass('fa-solid fa-filter');
                $('#btn-filter-' + i).addClass('btn-success');
            } else {
                $('#btn-filter-' + i + ' i').removeClass('fa-solid fa-filter').addClass('fa-brands fa-get-pocket');
                $('#btn-filter-' + i).removeClass('btn-success').addClass('btn-secondary');
            }
        }
    }
    table.on('draw', function() {
        rebuildFilters();
    });
    // // تطبيق الفلترة عند الضغط على زر "check"
    $('.filter-apply-btn').on('click', function() {
        let target = $(this).data('target');
        let field = $(this).data('field');
        var filterValue = $("input[name="+ field + "]").val();
        table.column(target).search(filterValue).draw();
    });
    // منع إغلاق dropdown عند النقر على input أو label
    $('th  .dropdown-menu .checkbox-list-box').on('click', function (e) {
        e.stopPropagation(); // منع انتشار الحدث
    });
    // البحث داخل الـ checkboxes
    $('.search-checkbox').on('input', function() {
        let searchValue = $(this).val().toLowerCase();
        let tdIndex = $(this).data('index');
        $('.checkbox-list-' + tdIndex + ' label').each(function() {
            let labelText = $(this).text().toLowerCase();  // النص داخل الـ label
            let checkbox = $(this).find('input');  // الـ checkbox داخل الـ label

            if (labelText.indexOf(searchValue) !== -1) {
                $(this).show();
            } else {
                $(this).hide();
                if (checkbox.prop('checked')) {
                    checkbox.prop('checked', false);  // إذا كان الـ checkbox محددًا، قم بإلغاء تحديده
                }
            }
        });
    });
    $('.all-checkbox').on('change', function() {
        let index = $(this).data('index'); // الحصول على الـ index من الـ data-index

        // التحقق من حالة الـ checkbox "الكل"
        if ($(this).prop('checked')) {
            // إذا كانت الـ checkbox "الكل" محددة، تحديد جميع الـ checkboxes الظاهرة فقط
            $('.checkbox-list-' + index + ' input[type="checkbox"]:visible').prop('checked', true);
        } else {
            // إذا كانت الـ checkbox "الكل" غير محددة، إلغاء تحديد جميع الـ checkboxes الظاهرة فقط
            $('.checkbox-list-' + index + ' input[type="checkbox"]:visible').prop('checked', false);
        }
    });
    function escapeRegex(value) {
        return value.replace(/[-\/\\^$*+?.()|[\]{}"'`]/g, '\\$&'); // تشمل الآن علامات الاقتباس المفردة والمزدوجة
    }
    $('.filter-apply-btn-checkbox').on('click', function() {
        let target = $(this).data('target'); // استرجاع الهدف (العمود)
        let field = $(this).data('field'); // استرجاع الحقل (اسم المشروع أو أي حقل آخر)

        // الحصول على القيم المحددة من الـ checkboxes
        var filterValues = [];
        // نستخدم الكلاس المناسب بناءً على الحقل (هنا مشروع)
        $('.' + field + '-checkbox:checked').each(function() {
            filterValues.push($(this).val()); // إضافة القيمة المحددة
        });
        // إذا كانت هناك قيم محددة، نستخدمها في الفلترة
        if (filterValues.length > 0) {
            // تحويل القيم إلى تعبير نمطي مع إلغاء حجز الرموز الخاصة
            var searchExpression = filterValues.map(escapeRegex).join('|');
            // تطبيق الفلترة على العمود باستخدام القيم المحددة
            table.column(target).search(searchExpression, true, false).draw(); // Use regex search
            // استخدام البحث النصي العادي (regex: false)

        } else {
            // إذا لم تكن هناك قيم محددة، نعرض جميع البيانات
            table.column(target).search('').draw();
        }
    });
    // تطبيق التصفية عند النقر على زر "Apply"
    $('#filter-date-btn').on('click', function () {
        const fromDate = $('#from_date').val();
        const toDate = $('#to_date').val();
        table.ajax.reload(); // إعادة تحميل الجدول مع التواريخ المحدثة
    });
    // تفويض حدث الحذف على الأزرار الديناميكية
    $(document).on('click', '.delete_row', function () {
        const id = $(this).data('id'); // الحصول على ID الصف
        if (confirm('هل أنت متأكد من حذف العنصر؟')) {
            deleteRow(id); // استدعاء وظيفة الحذف
        }
    });
    // وظيفة الحذف
    function deleteRow(id) {
        $.ajax({
            url: urlDelete.replace(':id', id),
            method: 'DELETE',
            data: {
                "_token": _token,
            },
            success: function (response) {
                toastr.success('تم حذف العنصر بنجاح');
                table.ajax.reload(); // إعادة تحميل الجدول بعد الحذف
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
                toastr.error('هنالك خطاء في عملية الحذف.');
            },
        });
    }
    $(document).on('click', '#refreshData', function() {
        table.ajax.reload();
    });
    $(document).on('click', '#filterBtnClear', function() {
        $('.filter-dropdown').slideUp();
        $('#filterBtn').text('تصفية');
        $('.filterDropdownMenu input').val('');
        $('th input[type="checkbox"]').prop('checked', false);
        table.columns().search('').draw(); // إعادة رسم الجدول بدون فلاتر
    });
});


$(document).ready(function() {
    $(document).on('click', '#filterBtn', function() {
        let text = $(this).text();
        if (text != 'تصفية') {
            $(this).text('تصفية');
        }else{
            $(this).text('إخفاء التصفية');
        }
        $('.filter-dropdown').slideToggle();
    });
    $(document).on('click', '#import_excel_btn', function() {
        $('#editEmployee').modal('hide');
        $('#import_excel').modal('show');
    })
});

$(document).ready(function() {
    let currentRow = 0;
    let currentCol = 0;

    // الحصول على الصفوف من tbody فقط
    const rows = $('#'+tableId+' tbody tr');

    // إضافة الكلاس للخلايا عند تحميل الصفحة
    highlightCell(currentRow, currentCol);

    // التنقل باستخدام الأسهم
    $(document).on('keydown', function(e) {
        // تحديث عدد الصفوف والأعمدة المرئية عند كل حركة
        const totalRows = $('#'+tableId+' tbody tr:visible').length;
        const totalCols = $('#'+tableId+' tbody tr:visible').eq(0).find('td').length;

        // التحقق من وجود صفوف وأعمدة لتجنب NaN
        if (totalRows === 0 || totalCols === 0) return;

        // التنقل باستخدام الأسهم
        if (e.key === 'ArrowLeft') {
            if (currentCol < 32) {
                currentCol = (currentCol + 1) % totalCols;
            }
        } else if (e.key === 'ArrowRight') {
            if (currentCol > 0) {
                currentCol = (currentCol - 1 + totalCols) % totalCols;
            }
        } else if (e.key === 'ArrowDown') {
            currentRow = (currentRow + 1) % totalRows;
        } else if (e.key === 'ArrowUp') {
            // إذا كنت في الصف الأول، لا تفعل شيئاً
            if (currentRow > 0) {
                currentRow = (currentRow - 1 + totalRows) % totalRows;
            }
        } else {
            return;
        }
        highlightCell(currentRow, currentCol);
    });

    // التحديد عند النقر المزدوج بالماوس
    $('#'+tableId+' tbody').on('dblclick', 'td', function() {
        const cell = $(this);
        currentRow = cell.closest('tr').index();
        currentCol = cell.index();
        highlightCell(currentRow, currentCol);
    });

    // دالة لتحديث الخلية النشطة
    function highlightCell(row, col) {
        // استهداف الصفوف المرئية فقط
        const visibleRows = $('#'+tableId+' tbody tr:visible');
        // التحقق من وجود الصف
        if (visibleRows.length > row) {
            // تحديد الصف والخلية المطلوبة
            const targetRow = visibleRows.eq(row);
            const targetCell = targetRow.find('td').eq(col);
            if (targetCell.length) {
                // إزالة التنسيقات السابقة
                $('#'+tableId+' tbody td').removeClass('active');
                // إضافة التنسيق للخلية المطلوبة
                targetCell.addClass('active');
                targetCell.focus();
            }
        }
    }
});
