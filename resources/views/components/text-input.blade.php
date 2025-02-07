@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'tw-border-gray focus:tw-border-indigo-500  focus:tw-ring-indigo-500 tw-rounded-md tw-shadow-sm tw-text-black tw-font-raleway tw-outline-none tw-px-3']) }}>
