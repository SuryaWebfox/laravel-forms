@if($type === 'hidden')
    <input type="hidden" name="{{ $name }}" value="{{ $value }}" {!! $extraAttributes  !!}>
@else
    {!! isset($col) ? '<div class="'.$col.'">' : '' !!}
    <div class="{{ $containerClasses ?? 'form-group' }}" @if($errors->has($name)) data-server-error="{{ $errors->first($name) }}" @endif {!! $containerAttributes  !!}>
        @unless(($onlyTemplate ?? false) || ($label ?? true) === false)
            <label for="{{ $name }}" class="{{ $labelClasses ?? '' }}">
                @if($rawLabel ?? false)
                    {!! $rawLabel !!}
                    @else
                    {{ $label ?? str_replace('_', ' ', \Illuminate\Support\Str::title($name)) }}
                @endif
            </label>
        @endunless
        @if(isset($prepend) || isset($append))
            <div class="input-group">
                @if(isset($prepend))
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{ $prepend }}</span>
                    </div>
                @endif
                @include($fieldTemplate)
                @if(isset($append))
                    <div class="input-group-append">
                        <span class="input-group-text">{{ $append }}</span>
                    </div>
                @endif
            </div>
        @else
            @include($fieldTemplate)
        @endif
    </div>
    {!! isset($col) ? '</div>' : '' !!}
@endif
