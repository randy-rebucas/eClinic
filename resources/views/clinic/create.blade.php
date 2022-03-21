<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Clinic') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pt-5">

                @if ($errors->any())
                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('clinic.store') }}" enctype="multipart/form-data" class="flex flex-wrap">
                    @csrf
                    <fieldset class="flex-grow w-2/4">
                        <legend>Clinic information</legend>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="logo" :value="__('Logo')" class="w-1/4 text-right pr-4"/>
                            <input id="logo" class="flex-grow block mt-1 w-3/4" type="file" name="logo"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="name" :value="__('Clinic name')" class="w-1/4 text-right pr-4"/>
                            <x-input id="name" class="flex-grow block mt-1 w-3/4" type="text" name="name" :value="old('name')" autofocus />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="phone" :value="__('Phone Number')" class="w-1/4 text-right pr-4"/>
                            <x-input id="phone" class="flex-grow block mt-1 w-3/4" type="text" name="phone" :value="old('phone')" />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="email" :value="__('Email')" class="w-1/4 text-right pr-4"/>
                            <x-input id="email" class="flex-grow block mt-1 w-3/4" type="email" name="email" :value="old('email')" />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="prc" :value="__('PRC')" class="w-1/4 text-right pr-4"/>
                            <x-input id="prc" class="flex-grow block mt-1 w-3/4" type="text" name="prc" :value="old('prc')" />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="prt" :value="__('PRT')" class="w-1/4 text-right pr-4"/>
                            <x-input id="prt" class="flex-grow block mt-1 w-3/4" type="text" name="prt" :value="old('prt')" />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="s2" :value="__('S2')" class="w-1/4 text-right pr-4"/>
                            <x-input id="s2" class="flex-grow block mt-1 w-3/4" type="text" name="s2" :value="old('s2')" />
                        </div>

                        <legend>Hours</legend>
                        @foreach ($weekdays as $i => $weekday)
                            <div class="mt-2 flex items-center justify-between">
                                <x-label for="{{$weekday}}" :value="__(Str::ucfirst($weekday))" class="w-1/4 text-right pr-4"/>
                                <div class="flex items-center justify-between flex-grow mb-2">
                                    <div>
                                        <x-select :options="$hours" :selectedOption="old('opening')" class="w-32" name="operations[{{$weekday}}]['opening']" placeholder="opening"/>
                                    </div>
                                    <div>
                                        <x-select :options="$hours" :selectedOption="old('closing')" class="w-32" name="operations[{{$weekday}}]['closing']" placeholder="closing"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </fieldset>
                    <fieldset class="flex-grow w-2/4">
                        <legend>Address</legend>

                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="line_1" :value="__('Line 1')" class="w-1/4 text-right pr-4"/>
                            <x-input id="line_1" class="flex-grow block mt-1 w-3/4" type="text" name="line_1" :value="old('line_1')"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="line_2" :value="__('Line 2')" class="w-1/4 text-right pr-4"/>
                            <x-input id="line_2" class="flex-grow block mt-1 w-3/4" type="text" name="line_2" :value="old('line_2')"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="district" :value="__('District')" class="w-1/4 text-right pr-4"/>
                            <x-input id="district" class="flex-grow block mt-1 w-3/4" type="text" name="district" :value="old('district')"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="country" :value="__('Country')" class="w-1/4 text-right pr-4"/>
                            <x-select :options="$countries" :selectedOption="null" class="flex-grow block mt-1 w-3/4" name="country" id="country-dropdown"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="city" :value="__('City')" class="w-1/4 text-right pr-4"/>
                            <x-select :options="[]" :selectedOption="null" class="flex-grow block mt-1 w-3/4" name="city" id="city-dropdown"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="postal_code" :value="__('Postal code')" class="w-1/4 text-right pr-4"/>
                            <x-input id="postal_code" class="flex-grow block mt-1 w-3/4" type="text" name="postal_code" :value="old('postal_code')"/>
                        </div>
                    </fieldset>

                    <div class="flex items-center justify-end w-full mt-6">
                        <a href="<?php echo route('clinics');?>" class="mx-10">
                            {{ __('Cancel') }}
                        </a>
                        <x-button class="bg-green-500 hover:bg-green-400 focus:ring-4 focus:ring-green-500">
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('styles')
        <style>
            fieldset {
                width: 50%;
            }
            legend {
                margin-top: 2em;
            }
            label {
                width: 200px;
            }
        </style>
    @endpush
    @push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(function () {
                var link = "{{ route('patient.getCities') }}";
                $('#country-dropdown').on('change', function() {
                    var country_id = this.value;
                    $("#city-dropdown").html('');
                    $.ajax({
                        url: link,
                        type: "POST",
                        data: {
                            country_id: country_id,
                            _token: '{{csrf_token()}}'
                        },
                        dataType : 'json',
                        success: function(result){
                            $('#city-dropdown').html('<option value="">Select State</option>');
                            $.each(result.cities, function(key, value){
                                $("#city-dropdown").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
