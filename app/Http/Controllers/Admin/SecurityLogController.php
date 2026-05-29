<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SecurityLogController extends Controller
{
    public function index()
    {
        $logPath = storage_path('logs/pentest.log');
        $logs = [];

        if (File::exists($logPath)) {
            $fileContent = File::get($logPath);

            // تقسيم الملف إلى سطور
            $lines = explode("\n", trim($fileContent));

            // عكس السطور ليظهر أحدث نشاط في الأعلى
            $lines = array_reverse($lines);

            foreach ($lines as $line) {
                if (empty($line)) continue;

                // عزل تاريخ الـ Log عن محتوى الـ JSON
                // السطر يكون بالشكل: [2026-05-29 18:15:00] production.INFO: PenTest Activity: {...}
                if (preg_class_match('/^\[(.*?)\] production\.INFO: PenTest Activity: (.*)$/', $line, $matches)) {
                    $timestamp = $matches[1];
                    $data = json_decode($matches[2], true);

                    if ($data) {
                        $data['timestamp'] = $timestamp;
                        $logs[] = $data;
                    }
                }
            }
        }

        // تحويل المصفوفة إلى Collection لعمل Pagination بسيط داخل الـ Blade إن أردت
        // أو تمريرها مباشرة وعرض أول 50 حركية مثلاً
        $logs = collect($logs);

        return view('admin.logs', compact('logs'));
    }

    // دالة إضافية لمسح الـ Log وتصفير الصفحة إذا امتلأت
    public function clear()
    {
        $logPath = storage_path('logs/pentest.log');
        if (File::exists($logPath)) {
            File::put($logPath, ''); // تصفير الملف
        }
        return redirect()->back()->with('msg', 'Security logs cleared successfully!');
    }
}

// دالة مساعدة مخصصة تم استخدامها بالأعلى للفحص والترتيب
function preg_class_match($pattern, $subject, &$matches) {
    return preg_match($pattern, $subject, $matches);
}
