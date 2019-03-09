@if (Session::has('errors'))
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $message) @if($loop->last)
    <p class="mb-0">{{ $message }}</p>
    @else
    <p>{{ $message }}</p>
    <hr> @endif @endforeach
</div>
@endif
