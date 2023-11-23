<x-app-layout>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                <embed src="{{ asset('storage/' . $pdf->attachment) }}" width="100%" height="600px"
                    type="application/pdf">
            </div>
        </div>
    </div>
</x-app-layout>
