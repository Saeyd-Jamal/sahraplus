ممتاز جدًا، بما إنك بتوصل لمرحلة **نشر مشروع Laravel على السيرفر (Production)**، لازم تطبق مجموعة من **أوامر التحسين والتجهيز النهائي** لتسريع المشروع وتقليل التحميل وضغط الملفات.

---

## ✅ أهم أوامر Laravel بعد الرفع على السيرفر (Production Steps)

### 📦 1. **تثبيت الحزم بدون dev**

```bash
composer install --optimize-autoloader --no-dev
```

> 🔹 يحذف ملفات التطوير (`phpunit`, `debugbar`, إلخ)
> 🔹 يسرّع تحميل الكلاسات

---

### ⚙️ 2. **تهيئة الكاشات (Config + Routes + Views + Events)**

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

> 🔥 هذه الأوامر تضغط وتخزن ملفات التهيئة والمسارات في ملفات جاهزة للقراءة السريعة.

---

### 🧹 3. **تنظيف الكاش المؤقت (لو كنت شغال local قبلاً)**

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan event:clear
```

> ⛔ استخدمها فقط إذا بدك تمسح الكاش مؤقتًا أثناء التعديل أو التصحيح، مش في الإنتاج.

---

### 🧪 4. **تأكد من صلاحيات التخزين والتخزين المؤقت**

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

> ✅ يضمن أن Laravel يقدر يكتب في مجلدات `logs`, `sessions`, `cache`, `compiled`

---

### 🖼️ 5. **ضغط وتحسين ملفات الواجهة (JS + CSS + Vite أو Mix)**

#### لو تستخدم Vite:

```bash
npm install
npm run build
```

#### لو تستخدم Laravel Mix:

```bash
npm install
npm run prod
```

> 🔹 يقوم بضغط الملفات في `public/build` أو `public/js`, `public/css`

---

### 🌐 6. **ضبط إعدادات `.env` لبيئة الإنتاج**

في ملف `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
LOG_CHANNEL=stack
```

---

### ⏳ 7. (اختياري) Super Cache – ملفات الكلاسات:

```bash
php artisan optimize
```

---

### 📌 8. **إعدادات السيرفر**

-   تأكد إن السيرفر يدعم:

    -   PHP 8.1 أو 8.2
    -   MySQL 5.7+ أو MariaDB
    -   Redis (اختياري)
    -   Queue workers (لو تستخدم المهام الخلفية)

---

### ✅ قائمة تلخيص سريعة:

| الأمر                       | الوظيفة            |
| --------------------------- | ------------------ |
| `composer install --no-dev` | حذف أدوات التطوير  |
| `php artisan config:cache`  | تسريع التهيئة      |
| `php artisan route:cache`   | تسريع المسارات     |
| `npm run build` أو `prod`   | ضغط وتحسين الواجهة |
| `APP_ENV=production`        | تشغيل بيئة الإنتاج |
| `chmod -R 775 storage`      | إصلاح الصلاحيات    |

---

هل تريد ملف سكربت Shell أو Bash جاهز تشغله دفعة واحدة على السيرفر؟
