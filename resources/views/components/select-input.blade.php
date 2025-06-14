@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-10 pl-3 pr-10 appearance-none'
]) !!}>
    {{ $slot }}
</select>