@extends('layouts.app')

@section('title', 'Detail Tiket')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Detail Tiket</h1>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Kembali</a>
    </div>



    <div class="card shadow-sm mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $ticket->title }}</h5>
            <div>
                <span
                    class="badge bg-{{ $ticket->status == 'open' ? 'success' : ($ticket->status == 'closed' ? 'secondary' : 'warning') }}">
                    {{ ucfirst($ticket->status) }}
                </span>
                <span
                    class="badge bg-{{ $ticket->priority == 'high' ? 'danger' : ($ticket->priority == 'medium' ? 'warning' : 'info') }}">
                    {{ ucfirst($ticket->priority) }}
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3 text-muted small">
                <strong>Pelapor:</strong> {{ $ticket->user->name ?? 'Unknown' }} &bull;
                <strong>Dibuat:</strong> {{ $ticket->created_at->format('d M Y H:i') }}
                @if($ticket->category)
                    &bull; <strong>Kategori:</strong> {{ $ticket->category }}
                @endif
            </div>

            <div class="p-3 bg-light rounded border">
                {!! nl2br(e($ticket->description)) !!}
            </div>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus tiket ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
@endsection