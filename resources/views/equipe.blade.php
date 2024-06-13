<x-app-layout>
    <div class="container-xxl py-5">
        <div class="container">
            @foreach ($employees as $employee)
                @php
                    $administration = \App\Models\Administration::find($employee['administrations_id']);
                @endphp
                <div class="Admininistration">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                        <p class="fs-5 fw-medium text-primary margin-top-30">
                            {{ $administration->organe }}
                        </p>
                    </div>
                    <div class="row g-4">
                        @php
                            $employeeIds = explode(',', $employee['employee_ids']);
                            $employees = \App\Models\Employee::whereIn('id', $employeeIds)->where('status', 1)->get();
                        @endphp
                        @foreach ($employees as $employee)
                            <div class="d-flex justify-content-center col-lg-3 col-md-6 wow fadeInUp"
                                data-wow-delay="0.1s">
                                <div class="team-item rounded overflow-hidden pb-4 mx-auto">
                                    <img class="img-fluid d-block mb-4" src="{{ $employee->image }}"
                                        alt="{{ $employee->firstname . '  ' . $employee->lastname }}" />
                                    <h5>{{ $employee->firstname . '  ' . $employee->lastname }}</h5>
                                    <span class="text-primary">{{ $employee->position }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
