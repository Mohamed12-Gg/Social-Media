@extends('shared.admin.app')

@section('main')
    {{-- Success Alert --}}
    @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Controls & Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white m-0 d-flex align-items-center gap-2">
            <i class="bi bi-shield-slash text-danger"></i>
            PenTest Live Monitor
            <span
                class="badge bg-danger bg-opacity-25 text-danger border border-danger border-opacity-25 fs-6 px-2 py-0.5 rounded-pill">
                {{ $logs->total() }}
            </span>
        </h4>
        @if ($logs->total() > 0)
            <form action="{{ route('admin.security.clear') }}" method="POST"
                onsubmit="return confirm('Are you sure you want to clear all logs?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm px-3 shadow-sm">
                    <i class="bi bi-trash3 me-1"></i> Clear Logs
                </button>
            </form>
        @endif
    </div>

    {{-- Main Section Container --}}
    <div class="table-section">
        <div class="table-responsive style-scroll-x">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col" class="text-nowrap" style="width: 15%;">Time</th>
                        <th scope="col" class="text-nowrap" style="width: 12%;">IP Address</th>
                        <th scope="col" class="text-nowrap" style="width: 8%;">Method</th>
                        <th scope="col" class="text-nowrap" style="max-width: 300px;">Target URL</th>
                        <th scope="col" class="text-nowrap" style="width: 10%;">User ID</th>
                        <th scope="col" class="text-nowrap text-center" style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logs as $index => $log)
                        @php
                            $ip = $log['IP_Address'] ?? ($log['ip_address'] ?? ($log['ip'] ?? 'N/A'));
                            $ip = 'N/A';
                            $method = strtoupper($log['Method'] ?? ($log['method'] ?? 'GET'));
                            $url = $log['URL'] ?? ($log['target_url'] ?? ($log['url'] ?? '#'));
                            $userId = $log['User_ID'] ?? ($log['user_id'] ?? 'Guest');
                            $timestamp = $log['timestamp'] ?? 'N/A';
                        @endphp
                        <tr class="transition-row">
                            <td class="text-muted small font-monospace">{{ $timestamp }}</td>
                            <td>
                                <span
                                    class="badge bg-secondary bg-opacity-10 text-white border border-secondary border-opacity-25 font-monospace">
                                    {{ $ip }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="badge font-monospace text-dark fw-bold {{ $method == 'POST' ? 'bg-warning' : ($method == 'GET' ? 'bg-info' : 'bg-danger text-white') }}">
                                    {{ $method }}
                                </span>
                            </td>
                            <td style="max-width: 300px;">
                                <div class="p-1.5 rounded bg-black bg-opacity-30 text-info font-monospace small text-nowrap style-scroll-x"
                                    style="overflow-x: auto;">
                                    {{ $url }}
                                </div>
                            </td>
                            <td>
                                <span
                                    class="badge badge-role {{ $userId == 'Guest' ? 'badge-user opacity-75' : 'badge-admin' }}">
                                    {{ $userId }}
                                </span>
                            </td>
                            <td class="text-center">
                                {{-- الزرار شغال وبيرمي على الترقيم المظبوط --}}
                                <button type="button"
                                    class="btn btn-outline-info btn-sm rounded-circle px-2 py-1 shadow-sm"
                                    data-bs-toggle="modal" data-bs-target="#logModal{{ $index }}"
                                    title="View Full Details">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-shield-check text-success display-5 d-block mb-3"></i>
                                <span class="fs-5 fw-semibold text-white d-block mb-1">System is Quiet & Secure</span>
                                No suspicious activities or penetration tests recorded.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- أزرار الترقيم والأسهم خمسة بخمسة --}}
    @if ($logs->total() > 0)
        <div class="d-flex justify-content-center mt-4">
            {{ $logs->links('pagination::bootstrap-5') }}
        </div>
    @endif


    {{-- =================================================================== --}}
    {{-- 🔥 الحل السحري: وضع الـ Modals هنا خارج الجدول تماماً لحل مشكلة التجميد 🔥 --}}
    {{-- =================================================================== --}}
    @foreach ($logs as $index => $log)
        @php
            $ip = $log['IP_Address'] ?? ($log['ip_address'] ?? ($log['ip'] ?? 'N/A'));
            $method = strtoupper($log['Method'] ?? ($log['method'] ?? 'GET'));
            $url = $log['URL'] ?? ($log['target_url'] ?? ($log['url'] ?? '#'));
            $userId = $log['User_ID'] ?? ($log['user_id'] ?? 'Guest');
            $payload = $log['Payload'] ?? ($log['payload'] ?? ($log['input'] ?? []));
            $timestamp = $log['timestamp'] ?? 'N/A';

            $userAgent = $log['User_Agent'] ?? ($log['user_agent'] ?? 'N/A');
            $routeName = $log['Route_Name'] ?? ($log['route_name'] ?? 'N/A');
        @endphp

        <div class="modal fade" id="logModal{{ $index }}" tabindex="-1"
            aria-labelledby="logModalLabel{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content text-white"
                    style="background: rgba(20, 24, 45, 0.98); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1);">
                    <div class="modal-header border-bottom border-opacity-10 border-white">
                        <h5 class="modal-title d-flex align-items-center gap-2 text-info"
                            id="logModalLabel{{ $index }}">
                            <i class="bi bi-terminal-dark"></i> Request Security Details
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <small class="text-muted d-block">Timestamp</small>
                                <span class="font-monospace text-light">{{ $timestamp }}</span>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block">IP Address</small>
                                <span class="font-monospace text-warning">{{ $ip }}</span>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted d-block">HTTP Method</small>
                                <span
                                    class="badge {{ $method == 'POST' ? 'bg-warning text-dark' : 'bg-info text-dark' }} fw-bold">{{ $method }}</span>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted d-block">Route Name</small>
                                <span class="text-white-50 font-monospace">{{ $routeName }}</span>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted d-block">User Context</small>
                                <span class="badge bg-secondary bg-opacity-25 text-light">ID: {{ $userId }}</span>
                            </div>
                            <div class="col-12">
                                <small class="text-muted d-block">Full Target URL</small>
                                <div class="p-2 rounded bg-black bg-opacity-40 text-info font-monospace small text-break">
                                    {{ $url }}</div>
                            </div>
                            <div class="col-12">
                                <small class="text-muted d-block">User Agent</small>
                                <div class="p-2 rounded bg-secondary bg-opacity-10 text-white-50 small font-monospace">
                                    {{ $userAgent }}</div>
                            </div>
                        </div>

                        <div>
                            <h6
                                class="text-success border-bottom border-success border-opacity-25 pb-2 mb-2 d-flex align-items-center gap-2">
                                <i class="bi bi-braces"></i> Payload / Form Input Data
                            </h6>
                            @if (!empty($payload))
                                <pre class="m-0 p-3 rounded text-success small font-monospace style-scroll-y"
                                    style="max-height: 200px; overflow-y: auto; background-color: rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.05); font-size: 0.85rem;">{{ json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            @else
                                <div class="p-3 text-center text-muted bg-black bg-opacity-20 rounded italic small">
                                    <i class="bi bi-info-circle me-1"></i> Empty Payload
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer border-top border-opacity-10 border-white">
                        <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">Close
                            View</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    {{-- أنماط التنسيق --}}
    <style>
        .font-monospace {
            font-family: 'Courier New', Courier, monospace !important;
        }

        .transition-row {
            transition: background-color 0.2s ease;
        }

        .style-scroll-x::-webkit-scrollbar {
            height: 4px;
        }

        .style-scroll-x::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.02);
        }

        .style-scroll-x::-webkit-scrollbar-thumb {
            background: rgba(102, 126, 234, 0.3);
            border-radius: 4px;
        }

        .style-scroll-y::-webkit-scrollbar {
            width: 4px;
        }

        .style-scroll-y::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.2);
        }

        .style-scroll-y::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
    </style>
@endsection
