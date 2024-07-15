@extends('layouts.liveware')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<div class="card-body mt-5 mb-1">
        <h5>Gestión de Tipo de descuentos</h5>
        @livewire('tipo-descuento')
    </div>
@endsection
