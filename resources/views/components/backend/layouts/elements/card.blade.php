<div {{ $attributes->class(['card']) }}>

    @isset($heading)
    <div {{ $heading->attributes->class(['card-header']) }}>
        {{ $heading }}
    </div>
    @endisset

    @isset($body)
    <div {{ $body->attributes->class(['card-body']) }}>
        {{ $body }}
    </div>
    @endisset

    @isset($footer)
    <div class="card-footer">
        {{ $footer }}
    </div>
    @endisset
</div>