<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $table = 'users';

    protected $fillable = [
        'username',                  // اسم المستخدم - يُستخدم لتسجيل الدخول أو كمعرف فريد داخل النظام
        'first_name',                // الاسم الأول - للعرض في الملف الشخصي أو القوائم
        'last_name',                 // الاسم الأخير - يُستخدم مع الاسم الأول لعرض الاسم الكامل
        'email',                     // البريد الإلكتروني - يستخدم للتواصل وتسجيل الدخول، فريد
        'mobile',                    // رقم الهاتف - يستخدم للتحقق أو التواصل، اختياري
        'login_type',                // نوع تسجيل الدخول - manual | google | facebook، لتحديد مزود الدخول
        'file_url',                  // رابط ملف/وثيقة/صورة - غالبًا صورة الهوية أو مستندات
        'gender',                    // الجنس - male | female، لأغراض إحصائية أو تخصيص الواجهة
        'date_of_birth',             // تاريخ الميلاد - يُستخدم لتحديد العمر أو التحقق من السن
        'email_verified_at',         // وقت تفعيل البريد الإلكتروني - يُستخدم لمعرفة هل البريد مُفعل
        'password',                  // كلمة المرور - مشفّرة bcrypt، للحسابات التي تسجل يدويًا
        'is_banned',                 // هل الحساب محظور؟ 0 = لا، 1 = نعم - لمنع المستخدم من تسجيل الدخول
        'is_subscribe',             // هل المستخدم مشترك في خدمة معينة؟ 0 = لا، 1 = نعم - مثل اشتراك بريميوم
        'status',                    // حالة الحساب - 1 = نشط، 0 = غير نشط - يُستخدم لإخفاء/تعطيل الحساب
        'last_notification_seen',    // توقيت آخر إشعار تم مشاهدته - لتحديد الإشعارات الجديدة
        'address',                   // العنوان التفصيلي - مدينة، شارع، ... إلخ، اختياري
        'user_type',                 // نوع المستخدم - admin | user | vendor... يُحدد الصلاحيات
        'pin',                       // رمز PIN مكون من 4 أرقام - لأغراض أمنية إضافية مثل قفل أبوي
        'otp',                       // رمز التحقق OTP المؤقت - يستخدم في المصادقة الثنائية
        'is_parental_lock_enable',   // هل القفل الأبوي مفعل؟ 0 = لا، 1 = نعم - لحماية المحتوى للأطفال
        'remember_token',            // توكن لتسجيل الدخول التلقائي (remember me) - يستخدمه Laravel Auth
        'father_code',               // كود المُعرّف (مثل كود الإحالة أو كود الأب) - يستخدم لتتبع التسلسل أو الإحالة
        'avatar',                    // الصورة الرمزية (صورة الحساب) - بديل لـ file_url إن كانت صورة بروفايل فقط
        'last_activity',             // توقيت آخر نشاط للمستخدم - مفيد لتحديد إذا المستخدم متصل الآن
        'super_admin',               // هل هو مسؤول عام؟ 0 = لا، 1 = نعم - يمتلك جميع الصلاحيات بدون قيود
    ];


    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'last_notification_seen' => 'datetime',
        'is_parental_lock_enable' => 'boolean',
    ];

    // Relationsheps
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class, 'user_id');
    }

    public function userMultiProfiles()
    {
        return $this->hasMany(UserMultiProfile::class, 'user_id');
    }

    public function watchHistories()
    {
        return $this->hasMany(WatchHistory::class, 'user_id');
    }

    public function roles()
    {
        return $this->hasMany(RoleUser::class, 'user_id', 'id');
    }


    // Accessor
    public function getAvatarUrlAttribute() // $user->avatar_url
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        return asset('imgs/user.jpg');
    }
}
