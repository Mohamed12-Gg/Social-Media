<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - الصفحة غير موجودة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* نفس الـ CSS بتاع 503 */
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
            background: rgba(239, 68, 68, 0.15);
            width: 120px;
            height: 120px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
        }
        .icon-box i {
            font-size: 3.5rem;
            color: #ef4444;
        }
        .badge-404 {
            background: #ef4444;
            color: white;
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
            margin-bottom: 2rem;
        }
        .btn-primary {
            background: #ef4444;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="badge-404">404</div>

        <div class="icon-box">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>

        <h1>الصفحة غير موجودة</h1>

        <p class="description">
            عذراً، الصفحة التي تبحث عنها غير موجودة أو تم نقلها.
        </p>

        <a href="{{ url('/') }}" class="btn btn-primary">
            <i class="bi bi-house me-2"></i>
            العودة للصفحة الرئيسية
        </a>
    </div>
</body>
</html>
