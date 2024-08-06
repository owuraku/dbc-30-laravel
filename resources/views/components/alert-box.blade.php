@php
    $type = session('type') ? session('type') : 'success';
@endphp
@if(session('alertMessage'))
<div class="alert alert-{{$type}} alert-dismissible fade show" role="alert">
    {{session('alertMessage')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif