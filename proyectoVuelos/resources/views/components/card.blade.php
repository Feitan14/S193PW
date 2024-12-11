<div class="card mb-4 shadow-sm border-light" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title text-dark">{{ $title }}</h5>
        <p class="card-text text-dark">{{ $text }}</p>
        <p class="card-text">
            <small class="text-muted">{{ __('Fecha') }}: {{ $date }}</small><br>
            <small class="text-muted">{{ __('Precio:') }} {{ $price }} $</small>
        </p>
        <!-- Este elemento invisible amplía el área de clic -->
        <span class="stretched-link"></span>
    </div>
</div>