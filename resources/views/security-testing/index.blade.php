@extends('layouts.app')

@section('title', 'Security Testing Dashboard')

@section('content')
    <div class="container pb-5">
        <!-- Header Section -->
        <div class="text-center mb-4 pt-3">
            <h1 class="display-6 fw-normal mb-2">
                <i class="bi bi-shield-shaded text-primary"></i> Security Testing Dashboard
            </h1>
            <p class="text-muted">Materi Hari 5 - Lab Lengkap XSS Prevention</p>

            <div class="alert alert-warning d-inline-block px-4 py-2 mt-2" role="alert"
                style="background-color: #fff3cd; color: #856404; border-color: #ffeeba;">
                <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i><strong>HANYA UNTUK DEVELOPMENT!</strong>
                Jangan deploy dashboard ini ke production.
            </div>
        </div>

        <!-- Status Cards -->
        <div class="row g-4 mb-5 text-center">
            <div class="col-md-3">
                <div class="card h-100 border-success shadow-sm" style="border-width: 2px !important;">
                    <div class="card-body py-4">
                        <i class="bi bi-shield-check text-success mb-2" style="font-size: 2.5rem;"></i>
                        <h4 class="card-title text-dark">XSS</h4>
                        <p class="card-text text-muted small">Protection</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-primary shadow-sm" style="border-width: 2px !important;">
                    <div class="card-body py-4">
                        <i class="bi bi-key text-primary mb-2" style="font-size: 2.5rem;"></i>
                        <h4 class="card-title text-dark">CSRF</h4>
                        <p class="card-text text-muted small">Token Active</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-info shadow-sm" style="border-width: 2px !important;">
                    <div class="card-body py-4">
                        <i class="bi bi-server text-info mb-2" style="font-size: 2.5rem;"></i>
                        <h4 class="card-title text-dark">Headers</h4>
                        <p class="card-text text-muted small">Configured</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-warning shadow-sm" style="border-width: 2px !important;">
                    <div class="card-body py-4">
                        <i class="bi bi-check-square text-warning mb-2" style="font-size: 2.5rem;"></i>
                        <h4 class="card-title text-dark">Audit</h4>
                        <p class="card-text text-muted small">Checklist</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Testing Cards -->
        <div class="row g-4 mb-4">
            <!-- XSS Testing -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header bg-danger text-white py-3 border-0">
                        <h5 class="mb-0"><i class="bi bi-shield-exclamation me-2"></i>XSS Testing</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-dark" style="font-size: 0.95rem;">Test berbagai payload XSS untuk memverifikasi bahwa
                            aplikasi aman dari serangan Cross-Site Scripting.</p>
                        <ul class="text-muted" style="font-size: 0.9rem;">
                            <li class="mb-1">Reflected XSS Test</li>
                            <li class="mb-1">Stored XSS Test</li>
                            <li class="mb-1">DOM-Based XSS Test</li>
                            <li>Multiple Payload Types</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white border-0 p-3 pt-0">
                        <a href="{{ route('security-testing.xss') }}" class="btn btn-danger w-100">
                            <i class="bi bi-play-circle me-1"></i> Mulai XSS Test
                        </a>
                    </div>
                </div>
            </div>

            <!-- CSRF Testing -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3 border-0">
                        <h5 class="mb-0"><i class="bi bi-key me-2"></i>CSRF Testing</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-dark" style="font-size: 0.95rem;">Test CSRF protection untuk memastikan form tidak
                            bisa disubmit dari external source.</p>
                        <ul class="text-muted" style="font-size: 0.9rem;">
                            <li class="mb-1">Test form dengan CSRF token</li>
                            <li class="mb-1">Test form tanpa CSRF token</li>
                            <li class="mb-1">External form attack simulation</li>
                            <li>AJAX request testing</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white border-0 p-3 pt-0">
                        <a href="{{ route('security-testing.csrf') }}" class="btn btn-primary w-100">
                            <i class="bi bi-play-circle me-1"></i> Mulai CSRF Test
                        </a>
                    </div>
                </div>
            </div>

            <!-- Security Headers -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header bg-info text-white py-3 border-0">
                        <h5 class="mb-0"><i class="bi bi-server me-2"></i>Security Headers</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-dark" style="font-size: 0.95rem;">Verifikasi security headers yang dikirim oleh
                            server untuk perlindungan tambahan.</p>
                        <ul class="text-muted" style="font-size: 0.9rem;">
                            <li class="mb-1">Content-Security-Policy</li>
                            <li class="mb-1">X-Frame-Options</li>
                            <li class="mb-1">X-Content-Type-Options</li>
                            <li>X-XSS-Protection</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white border-0 p-3 pt-0">
                        <a href="{{ route('security-testing.headers') }}" class="btn btn-info text-white w-100">
                            <i class="bi bi-play-circle me-1"></i> Cek Headers
                        </a>
                    </div>
                </div>
            </div>

            <!-- Security Audit -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header bg-warning text-dark py-3 border-0">
                        <h5 class="mb-0"><i class="bi bi-clipboard-check me-2"></i>Security Audit</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-dark" style="font-size: 0.95rem;">Checklist lengkap untuk audit keamanan aplikasi
                            sebelum deployment ke production.</p>
                        <ul class="text-muted" style="font-size: 0.9rem;">
                            <li class="mb-1">XSS Prevention Checklist</li>
                            <li class="mb-1">CSRF Protection Checklist</li>
                            <li class="mb-1">Input Validation Checklist</li>
                            <li>Authentication & Authorization</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white border-0 p-3 pt-0">
                        <a href="{{ route('security-testing.audit') }}" class="btn btn-warning text-dark w-100">
                            <i class="bi bi-play-circle me-1"></i> Lihat Checklist
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white border-bottom py-3">
                <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-link-45deg me-2"></i>Quick Links</h6>
            </div>
            <div class="card-body p-4">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('xss-lab.index') }}" class="btn btn-outline-danger flex-grow-1 text-center py-2"
                        style="min-width: 250px;">
                        <i class="bi bi-shield-exclamation me-1"></i> XSS Lab (Hari 4)
                    </a>
                    <a href="{{ route('demo-blade.index') }}" class="btn btn-outline-secondary flex-grow-1 text-center py-2"
                        style="min-width: 250px;">
                        <i class="bi bi-file-earmark-code me-1"></i> Blade Demo (Hari 4)
                    </a>
                    <a href="{{ route('tickets.index') }}" class="btn btn-outline-primary flex-grow-1 text-center py-2"
                        style="min-width: 250px;">
                        <i class="bi bi-ticket-detailed me-1"></i> Tickets (Hari 3)
                    </a>
                </div>
            </div>
        </div>

        <!-- Useful Commands -->
        <div class="card border-0 mb-4 rounded-3 overflow-hidden"
            style="background-color: #1e1e1e; border: 1px solid #333 !important;">
            <div class="card-header py-3" style="background-color: #1e1e1e; border-bottom: 1px solid #333;">
                <h6 class="mb-0 text-white"><i class="bi bi-terminal me-2"></i>Useful Commands</h6>
            </div>
            <div class="card-body p-4 text-light">
                <div style="font-family: monospace; font-size: 0.9rem; margin-bottom: 1.5rem;">
                    <span class="text-muted"># Test API endpoints without CSRF</span><br>
                    curl -I http://localhost:8000
                </div>
                <div style="font-family: monospace; font-size: 0.9rem; margin-bottom: 1.5rem;">
                    <span class="text-muted"># Scan dependencies for vulnerabilities</span><br>
                    composer require enlightn/security-checker --dev<br>
                    php artisan security:check
                </div>
                <div style="font-family: monospace; font-size: 0.9rem;">
                    <span class="text-muted"># Check NPM packages for vulnerabilities</span><br>
                    npm audit<br>
                    npm audit fix
                </div>
            </div>
        </div>
    </div>
@endsection