<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Details') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pt-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12 md:mx-2">
                        <!-- Profile Card -->
                        <div class="bg-gray-100 p-3 border-t-2 border-green-400">
                            <div class="image overflow-hidden">
                                <img class="h-auto w-full mx-auto"
                                    src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                    alt="">
                            </div>
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$patient->user->profile->getFullname()}}</h1>
                            <h3 class="text-gray-600 font-lg text-semibold leading-6">
                                @if ($patient->user->profile->age() > 0)
                                    {{$patient->user->profile->age()}}{{ Str::plural('yr', $patient->user->profile->age()) }} old
                                @else
                                    --
                                @endif
                            </h3>
                            <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">
                                {{$patient->user->profile->address->line_1}},
                                {{$patient->user->profile->address->line_2}},
                                {{$patient->user->profile->address->district}},
                                {{$patient->user->profile->address->city->name}},
                                {{$patient->user->profile->address->country->name}} {{$patient->user->profile->address->postal_code}}
                            </p>
                            <ul class="bg-white text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Created Date</span>
                                    <span class="ml-auto">{{date('F j, Y', strtotime($patient->user->created_at))}}</span>
                                </li>
                            </ul>
                        </div>
                        <!-- End of profile card -->
                        <div class="my-4"></div>
                        <!-- Records card -->
                        <div class="bg-gray-100 p-3 hover:shadow border-t-2 border-green-400">
                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                <span>Visit history</span>
                            </div>
                            @if ($patient->visits->count())
                                <ul class="list-inside space-y-2">
                                    @foreach ($patient->visits as $visit)
                                        <li>
                                            <div class="text-teal-600">{{ $visit->type }}.</div>
                                            <div class="text-gray-500 text-xs">{{ date('F j, Y', strtotime($visit->created_at)) }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                ---
                            @endif

                        </div>
                        <!-- End of Records card -->
                        <div class="my-4"></div>
                        <!-- Records card -->
                        <div class="bg-gray-100 p-3 hover:shadow border-t-2 border-green-400">
                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                <span>Family history</span>
                            </div>
                            @if ($patient->family_histories->count())
                                <ul class="list-inside space-y-2">
                                    @foreach ($patient->family_histories as $family_history)
                                        <li>
                                            <div class="text-teal-600">{{ $family_history->history }}</div>
                                            <div class="text-gray-500 text-xs">{{ $family_history->relationship }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                ---
                            @endif

                        </div>
                        <!-- End of Records card -->
                        <div class="my-4"></div>
                        <!-- Records card -->
                        <div class="bg-gray-100 p-3 hover:shadow border-t-2 border-green-400">
                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                <span>List of Allergies</span>
                            </div>
                            @if ($patient->allergies->count())
                                <ul class="list-inside space-y-2">
                                    @foreach ($patient->allergies as $allergy)
                                        <li>
                                            <div class="text-teal-600">{{ $allergy->allergy }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                ---
                            @endif

                        </div>
                        <!-- End of Records card -->
                    </div>
                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="bg-gray-100 p-3 shadow-sm rounded-sm border-t-2 border-green-400">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                </span>
                                <span class="tracking-wide">Previous Records</span>
                            </div>
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Gender</div>
                                        <div class="px-4 py-2">{{Str::upper($patient->user->profile->gender)}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Contact No.</div>
                                        <div class="px-4 py-2">{{$patient->user->profile->mobile}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Email.</div>
                                        <div class="px-4 py-2">
                                            <a class="text-blue-800" href="{{$patient->user->email}}">
                                                {{$patient->user->email}}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Birthday</div>
                                        <div class="px-4 py-2">{{date('F j, Y', strtotime($patient->user->profile->dob))}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Weight</div>
                                        <div class="px-4 py-2">
                                            @if ($patient->weights->count())
                                                {{ $patient->weights->last()->weight }} kg
                                            @else
                                                -- kg
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Height</div>
                                        <div class="px-4 py-2">
                                            @if ($patient->heights->count())
                                                {{ $patient->heights->last()->height }} cm
                                            @else
                                                -- cm
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Last Temperature</div>
                                        <div class="px-4 py-2">
                                            @if ($patient->temperatures->count())
                                                {{ $patient->temperatures->last()->temperature }} (°C)
                                            @else
                                                -- (°C)
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Last Vaccine</div>
                                        <div class="px-4 py-2">
                                            @if ($patient->immunizations->count())
                                                {{ $patient->immunizations->last()->vaccine }}
                                            @else
                                                --
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Blood Pressure</div>
                                        <div class="px-4 py-2">
                                            @if ($patient->blood_pressures->count())
                                                @php
                                                    $bP = $patient->blood_pressures->last();
                                                @endphp
                                                {{ $bP->systolic }} mmHg {{ $bP->diastolic }} mmHg [{{ $bP->heart_rate }}]
                                            @else
                                                -- mmHg -- mmHg [--]
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Blood Glucose</div>
                                        <div class="px-4 py-2">
                                            @if ($patient->blood_glucoses->count())
                                                @php
                                                    $bP = $patient->blood_glucoses->last();
                                                @endphp
                                                {{ $bP->measurement }} mmol/L [{{ $bP->type }}]
                                            @else
                                                -- mmol/L [--]
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of about section -->

                        <div class="my-4"></div>

                        <!-- Experience and education -->
                        <div class="bg-gray-100 p-3 shadow-sm rounded-sm border-t-2 border-green-400">

                            <div class="grid grid-cols-2">
                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">Previous Diagnoses</span>
                                    </div>
                                    @if ($patient->diagnoses->count())
                                        <ul class="list-inside space-y-2">
                                            @foreach ($patient->diagnoses as $diagnose)
                                                <li>
                                                    <div class="text-teal-600">{{ $diagnose->conditions }}</div>
                                                    <div class="text-gray-500 text-xs">{{date('F j, Y', strtotime($diagnose->created_at))}}</div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        ---
                                    @endif

                                </div>
                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide"> Previous Medications</span>
                                    </div>
                                    @if ($patient->medications->count())
                                    <ul class="list-inside space-y-2">
                                        @foreach ($patient->medications as $medication)
                                            <li>
                                                <div class="text-teal-600">
                                                    {{ $medication->medicine }} {{ $medication->preparation }} {{ $medication->sig }}
                                                    <span class="float-right"># {{ $medication->qty }}</span>
                                                </div>
                                                <div class="text-gray-500 text-xs">{{date('F j, Y', strtotime($medication->created_at))}}</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    ---
                                @endif
                                </div>
                            </div>
                            <!-- End of Experience and education grid -->
                        </div>

                        <!-- End of about section -->

                        <div class="my-4"></div>

                        <!-- Experience and education -->
                        <div class="bg-gray-100 p-3 shadow-sm rounded-sm border-t-2 border-green-400">

                            <div class="grid grid-cols-2">
                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">Previous Labortory Tests</span>
                                    </div>
                                    @if ($patient->lab_results->count())
                                        <ul class="list-inside space-y-2">
                                            @foreach ($patient->lab_results as $lab_result)
                                                <li>
                                                    <div class="text-teal-600">{{ $lab_result->test_at }} - {{ $lab_result->test }}</div>
                                                    <div class="text-teal-400">{{ $lab_result->specimen }} [{{ $lab_result->conventional_units }} | {{ $lab_result->si_units }}]</div>
                                                    <div class="text-gray-500 text-xs">{{date('F j, Y', strtotime($lab_result->created_at))}}</div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        ---
                                    @endif

                                </div>
                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide"> Previous Endorsements</span>
                                    </div>
                                    @if ($patient->endorsements->count())
                                    <ul class="list-inside space-y-2">
                                        @foreach ($patient->endorsements as $endorsement)
                                            <li>
                                                <div class="text-teal-600"> {{ $endorsement->details }} </div>
                                                <div class="text-gray-500 text-xs">{{date('F j, Y', strtotime($endorsement->created_at))}}</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    ---
                                @endif
                                </div>
                            </div>
                            <!-- End of Experience and education grid -->
                        </div>

                        <div class="my-4"></div>

                        <!-- Experience and education -->
                        <div class="bg-gray-100 p-3 shadow-sm rounded-sm border-t-2 border-green-400">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Attachments</span>
                            </div>
                            <div class="flex flex-wrap -m-1 md:-m-2">
                                <div class="flex flex-wrap w-1/3">
                                    <div class="w-full p-1 md:p-2">
                                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp">
                                    </div>
                                </div>
                                <div class="flex flex-wrap w-1/3">
                                    <div class="w-full p-1 md:p-2">
                                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp">
                                    </div>
                                </div>
                                <div class="flex flex-wrap w-1/3">
                                    <div class="w-full p-1 md:p-2">
                                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp">
                                    </div>
                                </div>
                                <div class="flex flex-wrap w-1/3">
                                    <div class="w-full p-1 md:p-2">
                                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(70).webp">
                                    </div>
                                </div>
                                <div class="flex flex-wrap w-1/3">
                                    <div class="w-full p-1 md:p-2">
                                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(76).webp">
                                    </div>
                                </div>
                                <div class="flex flex-wrap w-1/3">
                                    <div class="w-full p-1 md:p-2">
                                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of profile tab -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('styles')

    @endpush
    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(function () {

            });
        </script>
    @endpush
</x-app-layout>
