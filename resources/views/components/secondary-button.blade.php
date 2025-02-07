<button {{ $attributes->merge(['type' => 'button', 'class' => 'tw-inline-flex tw-items-center tw-px-4 tw-tw-py-2 bg-white tw-border tw-border-gray dark:border-gray tw-rounded-md tw-font-semibold tw-text-xs tw-text-gray tw-uppercase tw-tracking-widest tw-shadow-sm hover:tw-bg-gray focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-indigo-500 focus:tw-ring-offset-2 dark:focus:ring-offset-gray disabled:tw-opacity-25 tw-transition tw-ease-in-out tw-duration-150']) }}>
    {{ $slot }}
</button>
