@extends('layouts.app')

@section('title', 'CSRF Testing - Security Dashboard')

@section('content')
    <div class="container pb-5">
        <div class="mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('security-testing.index') }}"
                            class="text-decoration-none text-primary">Security Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">CSRF Testing</li>
                </ol>
            </nav>
        </div>

        <div class="text-center mb-5 mt-4">
            <i class="bi bi-key text-primary mb-3 d-block" style="font-size: 4rem;"></i>
            <h2 class="display-6">CSRF Testing Lab</h2>
            <p class="text-muted lead">Simulasi serangan Cross-Site Request Forgery (CSRF) dan pencegahannya.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-info shadow-sm bg-white" style="border-left: 4px solid #0d6efd;">
                    <h5 class="alert-heading"><i class="bi bi-info-circle me-2"></i> Segera Hadir</h5>
                    <hr>
                    <p class="mb-0">Fitur Security Testing secara spesifik untuk masing-masing lab sedang dalam tahap
                        pengembangan.</p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('security-testing.index') }}" class="btn btn-outline-secondary px-4">Kembali ke
                        Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection