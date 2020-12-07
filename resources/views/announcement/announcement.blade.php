<div class="row justify-content-center">
    <div class="col-md-8 my-3">
        <div class="card text-center">
            <div class="card-header">
                {{ $announcement->title }}
            </div>
            <div class="card-body">
                <img src="https://via.placeholder.com/300x150.png" alt="" class="rounded img-fluid float-left">
                <p class="card-text">{{ $announcement->body }}</p>
                <a href="{{ route('announcement.show', compact('announcement')) }}" class="btn btn-primary">Go
                    somewhere</a>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <strong>Category: <a
                        href="{{ route('announcement.category', [$announcement->category->name, $announcement->category->id]) }}">{{ $announcement->category->name }}</a></strong>
                <i>{{ $announcement->created_at->format('d/m/Y') }} - </i>
                {{ $announcement->user->name }}
            </div>
        </div>
    </div>
</div>
