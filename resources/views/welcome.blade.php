@extends('layouts.app')

@section('title', 'Dashboard Lab Security')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12 text-center py-5">
            <h1 class="display-4 fw-bold text-primary"><i class="bi bi-shield-lock"></i> Lab Secure Coding</h1>
            <p class="lead text-muted">Aplikasi simulasi keamanan web untuk pembelajaran di SMK Wikrama Bogor.</p>
            <hr class="my-4 mx-auto" style="width: 100px; border-top: 5px solid #0d6efd;">
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        {{-- Input Validation Lab --}}
        <div class="col-md-6 col-lg-5">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-check-circle" style="font-size: 3rem;"></i>
                    </div>
                    <h3 class="card-title h5 fw-bold">Input Validation Lab</h3>
                    <p class="card-text text-muted mb-4">Pelajari pentingnya validasi input di sisi server untuk menangkal
                        berbagai serangan dasar dan menjaga integritas data.</p>
                    <div class="d-grid">
                        <a href="{{ route('validation-lab.index') }}" class="btn btn-primary">
                            Buka Lab <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 text-center py-2">
                    <small class="text-success"><i class="bi bi-calendar-event me-1"></i> Hari 2: Input Validation</small>
                </div>
            </div>
        </div>

        {{-- Tickets CRUD --}}
        <div class="col-md-6 col-lg-5">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="mb-3 text-success">
                        <i class="bi bi-ticket-detailed" style="font-size: 3rem;"></i>
                    </div>
                    <h3 class="card-title h5 fw-bold">Ticketing System</h3>
                    <p class="card-text text-muted mb-4">Implementasi CRUD yang aman dengan Form Request, sanitasi data, dan
                        best practice Laravel.</p>
                    <div class="d-grid">
                        <a href="{{ route('tickets.index') }}" class="btn btn-success">
                            Kelola Tiket <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 text-center py-2">
                    <small class="text-success"><i class="bi bi-calendar-event me-1"></i> Hari 3: CRUD Secure</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 mt-4 text-center">
            <h4 class="fw-bold mb-4">Materi Bootcamp Lainnya</h4>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-info bg-opacity-10 p-3 rounded text-info">
                            <i class="bi bi-code-slash fs-3"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0 fw-bold">Blade Engine</h6>
                            <small class="text-muted">Hari 4: Templating</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-danger bg-opacity-10 p-3 rounded text-danger">
                            <i class="bi bi-shield-exclamation fs-3"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0 fw-bold">XSS Attacks</h6>
                            <small class="text-muted">Hari 4: Lab Keamanan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-warning bg-opacity-10 p-3 rounded text-warning">
                            <i class="bi bi-shield-shaded fs-3"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0 fw-bold">Security Audit</h6>
                            <small class="text-muted">Hari 5: Final Lab</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection