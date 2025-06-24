 @props(['active' => false])

 <a class="{{ $active ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white' }}rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page"
    aria-current="{{ $active ? 'page': 'false' }}"
    {{ $attributes }}
    >{{ $slot }}</a>