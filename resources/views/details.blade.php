<x-app-layout>
    <div class="container d-flex justify-content-center">
        <main>
            <h1 class="text-center text-primary">
                {{ $year }}
                <a href="{{ route('years') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-refund"
                        width="76" height="76" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
                        <path d="M15 14v-2a2 2 0 0 0 -2 -2h-4l2 -2m0 4l-2 -2"></path>
                    </svg>
                </a>
            </h1>
            <ul class="galeria-imagenes list-unstyled mx-auto d-flex flex-wrap" style="width: 100%">
                @foreach ($galleries as $gallery)
                    <li class="col-md-2 mb-4">
                        <a data-lightbox="galeria" data-title="{{ $gallery->alt }}"
                            href="{{ asset('storage/' . $gallery->image) }}">
                            <img class="rounded mx-auto d-block img-fluid"
                                src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->alt }}">
                        </a>
                    </li>
                @endforeach
            </ul>
        </main>
    </div>
</x-app-layout>
