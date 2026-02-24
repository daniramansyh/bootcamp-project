@extends('layouts.app')

@section('title', 'Detail Tiket - ' . $ticket->title)

@section('content')
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('tickets.index') }}"
                        class="text-decoration-none text-primary">Tickets</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $ticket->title }}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <!-- KOLOM KIRI (UTAMA) -->
        <div class="col-lg-8">

            <!-- CARD TIKET -->
            <div class="card shadow-sm border-0 mb-4" style="border-left: 4px solid #dc3545 !important;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h2 class="h4 mb-1 text-dark">{{ $ticket->title }}</h2>
                            <span class="text-muted small">Ticket #{{ $ticket->id }}</span>
                        </div>
                        <div class="d-flex gap-2">
                            @php
                                $statusClass = match ($ticket->status) {
                                    'open' => 'bg-success text-white',
                                    'in_progress' => 'bg-info text-dark',
                                    'closed' => 'bg-secondary text-white',
                                    default => 'bg-success text-white'
                                };
                                $statusLabel = match ($ticket->status) {
                                    'open' => 'Open',
                                    'in_progress' => 'In progress',
                                    'closed' => 'Closed',
                                    default => ucfirst($ticket->status)
                                };

                                $priorityClass = match (strtolower($ticket->priority ?? 'low')) {
                                    'high' => 'bg-danger text-white',
                                    'medium' => 'bg-primary text-white',
                                    'low' => 'bg-secondary text-white',
                                    default => 'bg-secondary text-white'
                                };
                                $priorityLabel = ucfirst($ticket->priority ?? 'low');
                            @endphp
                            <span class="badge {{ $statusClass }} rounded-pill px-3 py-2">{{ $statusLabel }}</span>
                            <span class="badge {{ $priorityClass }} rounded-pill px-3 py-2">{{ $priorityLabel }}</span>
                        </div>
                    </div>

                    <hr class="text-muted">

                    <div class="py-3" style="font-size: 1.05rem; line-height: 1.6;">
                        {!! nl2br(e($ticket->description)) !!}
                    </div>

                    <hr class="text-muted">

                    <div class="text-muted mt-3" style="font-size: 0.9rem;">
                        <i class="bi bi-person text-secondary me-1"></i> Dibuat oleh
                        <strong>{{ $ticket->user->name ?? 'Demo User' }}</strong> pada
                        {{ $ticket->created_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>

            <!-- FORM KOMENTAR -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4 pb-0">
                    <h5 class="mb-0"><i class="bi bi-chat-dots me-2"></i> Tambah Komentar</h5>
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label text-muted">Komentar</label>
                            <textarea name="content" class="form-control" rows="4"
                                placeholder="Tulis komentar Anda di sini..."></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <small class="text-muted" style="font-size: 0.8rem;">
                                <i class="bi bi-info-circle"></i> Minimal 3 karakter, maksimal 2000 karakter. <span
                                    class="text-warning">HTML tags akan dihapus untuk keamanan.</span>
                            </small>
                            <small class="text-muted text-end" style="font-size: 0.8rem; min-width: 130px;">2000 karakter
                                tersisa</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary px-4 shadow-sm" style="border-radius: 6px;">
                                <i class="bi bi-send me-1"></i> Kirim Komentar
                            </button>
                            <button type="button" class="btn btn-outline-info px-3 shadow-sm" style="border-radius: 6px;">
                                <i class="bi bi-shield-check me-1"></i> Security Info
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- LIST KOMENTAR -->
            <div class="card shadow-sm border-0 mb-4 mb-lg-0">
                <div class="card-header bg-white border-bottom pt-4 px-4 pb-3">
                    <h5 class="mb-0"><i class="bi bi-chat-left-text me-2"></i> Komentar (0)</h5>
                </div>
                <div class="card-body p-5 text-center text-muted">
                    <div class="mb-3">
                        <i class="bi bi-chat-square text-secondary" style="font-size: 3rem;"></i>
                    </div>
                    <p class="mb-1">Belum ada komentar.</p>
                    <p class="small">Jadilah yang pertama berkomentar!</p>
                </div>
            </div>

        </div>

        <!-- KOLOM KANAN (SIDEBAR) -->
        <div class="col-lg-4">

            <!-- QUICK ACTIONS -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4 pb-2">
                    <h6 class="mb-0 text-muted fw-bold">Quick Actions</h6>
                </div>
                <div class="card-body p-4 d-flex flex-column gap-2 pt-2">
                    <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary w-100 text-center shadow-sm">
                        &larr; Kembali ke Daftar
                    </a>
                    <a href="{{ route('tickets.edit', $ticket) }}"
                        class="btn btn-outline-primary w-100 text-center shadow-sm">
                        <i class="bi bi-pencil me-1"></i> Edit Ticket
                    </a>
                </div>
            </div>

            <!-- INFORMASI TICKET -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4 pb-0">
                    <h6 class="mb-0 text-muted fw-bold">Informasi Ticket</h6>
                </div>
                <div class="card-body p-0 mt-2">
                    <ul class="list-group list-group-flush rounded-bottom">
                        <li
                            class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center border-0 border-bottom">
                            <span class="text-muted">Status</span>
                            <span class="badge {{ $statusClass }} px-2 py-1">{{ $statusLabel }}</span>
                        </li>
                        <li
                            class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center border-0 border-bottom">
                            <span class="text-muted">Priority</span>
                            <span class="badge {{ $priorityClass }} px-2 py-1">{{ $priorityLabel }}</span>
                        </li>
                        <li
                            class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center border-0 border-bottom">
                            <span class="text-muted">Dibuat</span>
                            <span class="text-dark">{{ $ticket->created_at->format('d M Y') }}</span>
                        </li>
                        <li
                            class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center border-0 border-bottom">
                            <span class="text-muted">Update Terakhir</span>
                            <span class="text-dark">{{ $ticket->updated_at->diffForHumans() }}</span>
                        </li>
                        <li class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center border-0">
                            <span class="text-muted">Jumlah Komentar</span>
                            <span class="badge bg-secondary px-2">0</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- SECURITY FEATURES -->
            <div class="card shadow-sm border-success border mb-4">
                <div class="card-header bg-success text-white py-3 px-4 border-0">
                    <h6 class="mb-0"><i class="bi bi-shield-check me-2"></i> Security Features</h6>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-bottom">
                        <li class="list-group-item px-4 py-3 border-0 border-bottom text-muted" style="font-size: 0.9rem;">
                            <i class="bi bi-check-circle text-success me-2"></i> CSRF Protection aktif
                        </li>
                        <li class="list-group-item px-4 py-3 border-0 border-bottom text-muted" style="font-size: 0.9rem;">
                            <i class="bi bi-check-circle text-success me-2"></i> XSS Prevention (auto-escape)
                        </li>
                        <li class="list-group-item px-4 py-3 border-0 border-bottom text-muted" style="font-size: 0.9rem;">
                            <i class="bi bi-check-circle text-success me-2"></i> Input Validation
                        </li>
                        <li class="list-group-item px-4 py-3 border-0 border-bottom text-muted" style="font-size: 0.9rem;">
                            <i class="bi bi-check-circle text-success me-2"></i> Input Sanitization (strip_tags)
                        </li>
                        <li class="list-group-item px-4 py-3 border-0 text-muted" style="font-size: 0.9rem;">
                            <i class="bi bi-check-circle text-success me-2"></i> Authorization Check
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection