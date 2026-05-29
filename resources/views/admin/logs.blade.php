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
            <span class="badge bg-danger bg-opacity-25 text-danger border border-danger border-opacity-25 fs-6 px-2 py-0.5 rounded-pill">{{ count($logs) }}</span>
        </h4>
        @if(count($logs) > 0)
            <form action="{{ route('admin.security.clear') }}" method="POST" onsubmit="return confirm('Are you sure you want to clear all logs?')">
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
                        <th scope="col" class="text-nowrap" style="max-width: 250px;">Target URL</th>
                        <th scope="col" class="text-nowrap" style="width: 10%;">User ID</th>
                        <th scope="col" class="text-nowrap" style="max-width: 350px;">Payload / Input Data</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logs as $log)
                        <tr class="transition-row">
                            <td class="text-muted small font-monospace">{{ $log['timestamp'] }}</td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-white border border-secondary border-opacity-25 font-monospace">
                                    {{ $log['IP_Address'] }}
                                </span>
                            </td>
                            <td>
                                <span class="badge font-monospace text-dark fw-bold {{ $log['Method'] == 'POST' ? 'bg-warning' : ($log['Method'] == 'GET' ? 'bg-info' : 'bg-danger text-white') }}">
                                    {{ $log['Method'] }}
                                </span>
                            </td>
                            <td style="max-width: 250px;">
                                <div class="p-1.5 rounded bg-black bg-opacity-30 text-info font-monospace small text-nowrap style-scroll-x" style="overflow-x: auto;">
                                    {{ $log['URL'] }}
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-role {{ $log['User_ID'] == 'Guest' ? 'badge-user opacity-75' : 'badge-admin' }}">
                                    {{ $log['User_ID'] }}
                                </span>
                            </td>
                            <td style="max-width: 350px;">
                                @if(!empty($log['Payload']))
                                    <pre class="m-0 p-2 rounded text-success small style-scroll-y font-monospace"
                                         style="max-height: 85px; overflow-y: auto; background-color: rgba(0,0,0,0.4); border: 1px solid var(--glass-border); font-size: 0.8rem;">{{ json_encode($log['Payload'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                @else
                                    <span class="text-muted italic small ps-1">None</span>
                                @endif
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

    {{-- أنماط إضافية لتنسيق التمرير والخطوط المونو --}}
    <style>
        .font-monospace {
            font-family: 'Courier New', Courier, monospace !important;
        }
        .transition-row {
            transition: background-color 0.2s ease;
        }
        /* سكرول داخلي ناعم وأفقي لحماية الجدول */
        .style-scroll-x::-webkit-scrollbar {
            height: 4px;
        }
        .style-scroll-x::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.02);
        }
        .style-scroll-x::-webkit-scrollbar-thumb {
            background: rgba(102, 126, 234, 0.3);
            border-radius: 4px;
        }
        /* سكرول عمودي للـ Payload */
        .style-scroll-y::-webkit-scrollbar {
            width: 4px;
        }
        .style-scroll-y::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.2);
        }
        .style-scroll-y::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.1);
            border-radius: 4px;
        }
    </style>
@endsection
