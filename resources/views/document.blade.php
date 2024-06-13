<x-app-layout>
    <div class="container text-center mt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 justify-content-center">
            @foreach ($documents as $document)
                <div class="col mb-5">
                    <div class="card">
                        <div class="card-body">
                            {!! $document->svg !!}
                            <h5 class="card-title"> {{ $document->title }}</h5>
                            <p class="card-text">
                                {{ $document->description }}
                            </p>
                            <a href="{{ route('download.file', ['model' => 'document', 'id' => $document->id]) }}"
                                target="_blank" class="btn btn-primary">Télécharger le
                                PDF</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
