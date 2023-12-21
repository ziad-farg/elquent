<form action="{{ $action }}" method="{{ $method }}" enctype="{{ $enctype }}">
    @csrf
    {{ $slot }}
</form>
