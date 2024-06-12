<x-app-layout>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 100%">
                <embed src="{{ $pdf->attachment }}" width="100%" height="1000px" type="application/pdf">
            </div>
        </div>
    </div>
</x-app-layout>
