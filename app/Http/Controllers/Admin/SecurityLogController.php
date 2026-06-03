<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\LengthAwarePaginator;

class SecurityLogController extends Controller
{
    public function index()
    {
        // 1. تحديد المسار الأساسي والمسار البديل المتوافق مع الاستضافة
        $logPath = storage_path('logs/pentest.log');

        if (!File::exists($logPath)) {
            // حل بديل إذا كان السيرفر ينشئ الملف في مجلد htdocs العام
            $logPath = base_path('htdocs/storage/logs/pentest.log');
        }

        $logs = [];

        if (File::exists($logPath)) {
            $fileContent = File::get($logPath);

            // تقسيم الملف إلى سطور
            $lines = explode("\n", trim($fileContent));

            // عكس السطور ليظهر أحدث نشاط في الأعلى
            $lines = array_reverse($lines);

            foreach ($lines as $line) {
                if (empty($line)) continue;

                // الـ Regex معدل ليقبل local.INFO أو production.INFO بشكل ديناميكي
                if (preg_class_match('/^\[(.*?)\] .*?\.INFO: PenTest Activity: (.*)$/', $line, $matches)) {
                    $timestamp = $matches[1];
                    $data = json_decode($matches[2], true);

                    if ($data) {
                        $data['timestamp'] = $timestamp;
                        $logs[] = $data;
                    }
                }
            }
        }

        // --- كود الـ Pagination اليدوي (عرض 5 عناصر بكل صفحة) ---
        $currentPage = request()->get('page', 1); // رقم الصفحة الحالية من الرابط
        $perPage = 5; // عدد الأسطر في كل صفحة

        $logsCollection = collect($logs);

        // جلب العناصر الخاصة بالصفحة الحالية فقط باستخدام slice
        $currentPageItems = $logsCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // بناء كائن الـ Paginator المعتمد في لارافل لتوليد الأسهم
        $logs = new LengthAwarePaginator(
            $currentPageItems,
            $logsCollection->count(),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query()
            ]
        );
        // --------------------------------------------------------

        // إرسال كائن الـ Paginator إلى الـ Blade المسمى admin.logs
        return view('admin.logs', compact('logs'));
    }

    // دالة إضافية لمسح الـ Log وتصفير الصفحة إذا امتلأت
    public function clear()
    {
        $logPath = storage_path('logs/pentest.log');

        if (!File::exists($logPath)) {
            $logPath = base_path('htdocs/storage/logs/pentest.log');
        }

        if (File::exists($logPath)) {
            File::put($logPath, ''); // تصفير الملف
        }
        return redirect()->back()->with('msg', 'Security logs cleared successfully!');
    }
}

// دالة مساعدة مخصصة تم استخدامها بالأعلى للفحص والترتيب
if (!function_exists('preg_class_match')) {
    function preg_class_match($pattern, $subject, &$matches) {
        return preg_match($pattern, $subject, $matches);
    }
}
