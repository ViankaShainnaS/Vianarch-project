@extends('admin.adminMenu')

@section('content')
    <h1>Dashboard</h1>

    {{-- <h2>On Progress</h2>
    <div>
        @forelse($onProgress as $project)
            <div>
                <p><strong>{{ $project->name }}</strong></p>
                <p>{{ $project->description }}</p>
            </div>
        @empty
            <p>Tidak ada projek yang sedang berjalan.</p>
        @endforelse
    </div>

    <h2>Finished</h2>
    <div>
        @forelse($finished as $project)
            <div>
                <p><strong>{{ $project->name }}</strong></p>
                <p>{{ $project->description }}</p>
            </div>
        @empty
            <p>Tidak ada projek yang selesai.</p>
        @endforelse
    </div> --}}
@endsection
