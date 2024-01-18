@props(['value', 'showAsterisk' => true])

<div class="{{ $showAsterisk ? 'flex' : '' }}">
    <label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
        {{ $value ?? $slot }}
    </label>
    @if(isset($showAsterisk) && $showAsterisk)
        <span class="text-red-600 px-1 text-xs">*</span>
    @endif
</div>
