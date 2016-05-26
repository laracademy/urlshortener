@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        @foreach (session()->get('success') as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif