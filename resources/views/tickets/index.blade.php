@extends('layouts.app')

@section('title', 'Tickets')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Tickets</h1>
        <a href="{{ route('tickets.create') }}" class="btn btn-success">Create Ticket</a>
    </div>



    @if ($tickets->isEmpty())
        <p class="text-muted">No tickets found.</p>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($tickets as $ticket)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->title }}</h5>
                            <p class="card-text text-truncate" style="max-height: 4.5rem;">{{ $ticket->description }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Delete this ticket?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $tickets->links() }}
        </div>
    @endif
@endsection