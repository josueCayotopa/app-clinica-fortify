@extends('layouts.home')
@section('main')
<div id="dynamic-content">
        @if (view()->exists($view))
            @include($view, $data ?? [])
        @else
            <p>Vista no encontrada.</p>
        @endif
    </div>

    
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var url = $(this).attr('href');
                fetchPage(url);
            });
    
            function fetchPage(url) {
                $.ajax({
                    url: url,
                    success: function(data) {
                        $('#dynamic-content').html(data.view);
                        window.history.pushState({}, '', data.url);
                    },
                    error: function() {
                        alert('La página no pudo ser cargada.');
                    }
                });
            }
    
            window.onpopstate = function() {
                var url = window.location.href;
                fetchPage(url);
            };
        });
    </script>
@endsection
