@extends('layouts.app')

@section('title', 'Tickets')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1"><i class="bi bi-ticket-detailed"></i> Daftar Tiket</h1>
            <p class="text-muted mb-0">Kelola semua tiket support</p>
        </div>
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">
            + Buat Tiket Baru
        </a>
    </div>

    @if ($tickets->isEmpty())
        <div class="alert alert-info shadow-sm border-0">Belum ada tiket.</div>
    @else
        <div class="card shadow-sm mb-4 border-0">
            <div class="list-group list-group-flush rounded-3">
                @foreach ($tickets as $ticket)
                    <div class="list-group-item list-group-item-action p-4 position-relative">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="pe-3 w-100">
                                <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                    <a href="{{ route('tickets.show', $ticket) }}"
                                        class="text-primary text-decoration-none fw-bold fs-5 stretched-link">
                                        {{ $ticket->title }}
                                    </a>

                                    @php
                                        $statusClass = match ($ticket->status) {
                                            'open' => 'bg-warning text-dark',
                                            'in_progress' => 'bg-info text-dark',
                                            'closed' => 'bg-success text-white',
                                            default => 'bg-secondary text-white'
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
                                    <span class="badge {{ $statusClass }} rounded-pill">{{ $statusLabel }}</span>
                                    <span class="badge {{ $priorityClass }} rounded-pill">{{ $priorityLabel }}</span>
                                </div>
                                <p class="text-muted mb-2">
                                    {{ Str::limit($ticket->description, 120) }}
                                </p>
                                <small class="text-muted d-flex align-items-center gap-2">
                                    <span><i class="bi bi-person"></i> {{ $ticket->user->name ?? 'Demo User' }}</span>
                                    <span>•</span>
                                    <span><i class="bi bi-clock"></i> {{ $ticket->created_at->diffForHumans() }}</span>
                                </small>
                            </div>
                            <div class="d-flex gap-2 ms-auto flex-shrink-0 position-relative" style="z-index: 2;">
                                <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this ticket?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $tickets->links() }}
        </div>
    @endif

    @php
        $openCount = \App\Models\Ticket::where('status', 'open')->count();
        $inProgressCount = \App\Models\Ticket::where('status', 'in_progress')->count();
        $closedCount = \App\Models\Ticket::where('status', 'closed')->count();
    @endphp

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1 mb-5">
        <div class="col">
            <div class="card bg-warning h-100 border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h5 class="card-title fw-normal text-dark mb-1">Open</h5>
                    <h2 class="display-5 text-dark mb-0 fw-normal" style="font-size: 2.5rem;">{{ $openCount }}</h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-info h-100 border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h5 class="card-title fw-normal text-dark mb-1">In Progress</h5>
                    <h2 class="display-5 text-dark mb-0 fw-normal" style="font-size: 2.5rem;">{{ $inProgressCount }}</h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-success h-100 border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h5 class="card-title fw-normal text-white mb-1">Closed</h5>
                    <h2 class="display-5 text-white mb-0 fw-normal" style="font-size: 2.5rem;">{{ $closedCount }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection