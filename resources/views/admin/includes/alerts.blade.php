@if ($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
            <h3>{{ $error }}</h3>
        @endforeach
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
       {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
       {{ session('error') }}
    </div>
@endif