@props([
    'options' => [],
    'selectedOption' => null,
    'disabled' => false
])
<select {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50']) }}>
    @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ ( $value == $selectedOption) ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>
