@echo off
rem
rem Script: generate_auto_crud.bat
rem
rem هذا السكربت يقوم بتوليد جميع ملفات الـCRUD (API + Web + Repository + Requests + Resources + Postman + Swagger)
rem لكل نموذج موجود داخل مجلد app\Models باستخدام مكتبة auto‑crud، ثم ينقل أى ملفات Controller تم إنشاؤها
rem إلى مجلد Dashboard داخل Controllers. السكربت موجّه لمستخدمي Windows ويُنفّذ عبر cmd.

setlocal EnableDelayedExpansion

rem مسار مجلد النماذج
set "MODELS_DIR=app\Models"
rem مسار مجلد Controllers\Dashboard
set "DASHBOARD_DIR=app\Http\Controllers\Dashboard"

rem التأكد من وجود مجلد النماذج
if not exist "%MODELS_DIR%" (
    echo ❌ لم يتم العثور على المجلد %MODELS_DIR%. تأكد من تشغيل السكربت من جذر مشروع Laravel.
    exit /b 1
)

rem إنشاء مجلد Dashboard إذا لم يكن موجوداً
if not exist "%DASHBOARD_DIR%" mkdir "%DASHBOARD_DIR%"

rem التنقل عبر كل ملف PHP في مجلد Models
for %%F in ("%MODELS_DIR%"\*.php) do (
    rem استخراج اسم النموذج بدون امتداد
    set "MODELNAME=%%~nF"
    echo 🔄 توليد CRUD للنموذج: !MODELNAME!
    rem تنفيذ أمر auto‑crud
    php artisan auto-crud:generate -M !MODELNAME! -A  -O --no-interaction
    rem بعد التوليد، تحريك أى Controller خاص بهذا النموذج إلى مجلد Dashboard
    rem نبحث فى المجلد الرئيسى Controllers
    for %%C in (app\Http\Controllers\!MODELNAME!*Controller.php) do (
        if exist "%%C" move /Y "%%C" "%DASHBOARD_DIR%" > nul
    )
    @REM rem نبحث أيضاً داخل مجلد Api (فى حال توليده هناك)
    @REM if exist app\Http\Controllers\Api (
    @REM     for %%C in (app\Http\Controllers\Api\!MODELNAME!*Controller.php) do (
    @REM         if exist "%%C" move /Y "%%C" "%DASHBOARD_DIR%" > nul
    @REM     )
    @REM )
)

echo ✅ تم الانتهاء من التوليد ونقل الـControllers إلى المجلد %DASHBOARD_DIR%
endlocal
