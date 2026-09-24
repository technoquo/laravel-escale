<x-app-layout>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 100%">
                @if($organigramme && $organigramme->attachment)
                    <img src="{{ $organigramme->attachment }}" alt="{{ $organigramme->title ?? 'Organigramme' }}" style="max-width: 100%; height: auto;">
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
