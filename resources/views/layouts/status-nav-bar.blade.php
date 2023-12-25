<button id="remove" class="btn btn-danger" disabled><i class="fa-solid fa-trash"></i> Delete</button>
@if(count($status))
@foreach ($status as $enum)
<button class="btn btn-secondary status {{ strtolower($enum) }}_status" data-status="{{ $enum }}" title="{{ $enum }}">{{ $enum }}</button>
@endforeach
@endif