<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - الخدمة غير متاحة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cairo', sans-serif;
            color: #e2e8f0;
        }

        .error-card {
            background: rgba(30, 58, 95, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(100, 200, 200, 0.2);
            border-radius: 24px;
            padding: 3rem;
            max-width: 600px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        }

        .icon-box {
            background: rgba(16, 185, 129, 0.15);
            width: 120px;
            height: 120px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            position: relative;
        }

        .icon-box i {
            font-size: 3.5rem;
            color: #10b981;
        }

        .badge-503 {
            background: #10b981;
            color: #0f172a;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            font-weight: bold;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            margin: 1.5rem 0 1rem;
            color: #f1f5f9;
        }

        .description {
            color: #94a3b8;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .sub-text {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .btn-primary {
            background: #10b981;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: #059669;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid rgba(148, 163, 184, 0.3);
            color: #cbd5e1;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-outline:hover {
            border-color: #64748b;
            background: rgba(100, 116, 139, 0.1);
            color: #f1f5f9;
        }

        .footer-text {
            margin-top: 2rem;
            color: #64748b;
            font-size: 0.85rem;
        }

        .lang-switcher {
            position: absolute;
            top: 2rem;
            right: 2rem;
        }

        .lang-btn {
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #10b981;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            margin: 0 0.25rem;
            transition: all 0.3s;
        }

        .lang-btn.active {
            background: #10b981;
            color: #0f172a;
        }
    </style>
</head>
<body>

    <div class="lang-switcher">
        <button class="lang-btn active">العربية</button>
        <button class="lang-btn">English</button>
    </div>

    <div class="error-card">
        <div class="badge-503">503</div>

        <div class="icon-box">
            <i class="bi bi-gear-fill"></i>
        </div>

        <h1>الخدمة غير متاحة مؤقتاً</h1>

        <p class="description">
            نعمل على تحسين المنصة وتقديم تجربة أفضل لك.
        </p>

        <p class="sub-text">
            لا حاجة لقلق — غد خلال دقائق أو حدّث الصفحة.
        </p>

        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <button onclick="window.location.reload()" class="btn btn-primary">
                <i class="bi bi-arrow-clockwise me-2"></i>
                تحديث الصفحة
            </button>
            <a href="{{ url('/') }}" class="btn btn-outline">
                <i class="bi bi-house me-2"></i>
                الصفحة الرئيسية
            </a>
        </div>

        <p class="footer-text">
            إذا استمرت المشكلة، تواصل مع الإدارة.<br>
            <small>If this persists, contact your administrator.</small>
        </p>
    </div>

</body>
</html>
