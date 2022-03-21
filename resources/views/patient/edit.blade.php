<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Patient') }}
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
                <form method="POST" action="{{ route('patient.update', $patient->id) }}" class="flex flex-wrap">
                    @csrf
                    @method('PUT')
                    <fieldset class="flex-grow w-2/4">
                        <legend>Profile information</legend>

                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="firstname" :value="__('Firstname')" class="w-1/4 text-right pr-4"/>

                            <x-input id="firstname" class="flex-grow block mt-1 w-3/4" type="text" name="firstname" :value="$patient->user->profile->firstname" autofocus />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="lastname" :value="__('Lastname')" class="w-1/4 text-right pr-4"/>

                            <x-input id="lastname" class="flex-grow block mt-1 w-3/4" type="text" name="lastname" :value="$patient->user->profile->lastname" />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="mi" :value="__('Middle Initial')" class="w-1/4 text-right pr-4"/>

                            <x-input id="mi" class="flex-grow block mt-1 w-3/4" type="text" name="mi" :value="$patient->user->profile->mi" />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="gender" :value="__('Gender')" class="w-1/4 text-right pr-4"/>
                            <x-select :options="$gender" :selectedOption="$patient->user->profile->gender" class="flex-grow block mt-1 w-3/4" name="gender" id="gender"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="dob" :value="__('Date of birth')" class="w-1/4 text-right pr-4"/>
                            <x-input id="dob" class="flex-grow block mt-1 w-3/4" type="date" name="dob" :value="$patient->user->profile->dob" />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="mobile" :value="__('Mobile')" class="w-1/4 text-right pr-4"/>
                            <x-input id="mobile" class="flex-grow block mt-1 w-3/4" type="text" name="mobile" :value="$patient->user->profile->mobile" />
                        </div>
                        {{-- <legend>Sensitive information</legend>
                        <!-- Name -->
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="name" :value="__('Displayname')" class="w-1/4 text-right pr-4"/>
                            <x-input id="name" class="flex-grow block mt-1 w-3/4" type="text" name="name" :value="$patient->user->name"/>
                        </div>
                        <!-- Email Address -->
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="email" :value="__('Email')" class="w-1/4 text-right pr-4" />
                            <x-input id="email" class="flex-grow block mt-1 w-3/4" type="email" name="email" :value="$patient->user->email"/>
                        </div>
                        <!-- Password -->
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="password" :value="__('Password')" class="w-1/4 text-right pr-4"/>
                            <x-input id="password" class="flex-grow block mt-1 w-3/4" type="password" name="password" :value="$patient->user->password"/>
                        </div> --}}
                    </fieldset>
                    <fieldset class="flex-grow w-2/4">
                        <legend>Address</legend>

                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="line_1" :value="__('Line 1')" class="w-1/4 text-right pr-4"/>
                            <x-input id="line_1" class="flex-grow block mt-1 w-3/4" type="text" name="line_1" :value="$patient->user->profile->address->line_1"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="line_2" :value="__('Line 2')" class="w-1/4 text-right pr-4"/>
                            <x-input id="line_2" class="flex-grow block mt-1 w-3/4" type="text" name="line_2" :value="$patient->user->profile->address->line_2"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="district" :value="__('District')" class="w-1/4 text-right pr-4"/>
                            <x-input id="district" class="flex-grow block mt-1 w-3/4" type="text" name="district" :value="$patient->user->profile->address->district"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="country" :value="__('Country')" class="w-1/4 text-right pr-4"/>
                            <x-select :options="$countries" :selectedOption="$patient->user->profile->address->country->id" class="flex-grow block mt-1 w-3/4" name="country" id="country-dropdown"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="city" :value="__('City')" class="w-1/4 text-right pr-4"/>
                            <x-select :options="[]" :selectedOption="$patient->user->profile->address->city->id" class="flex-grow block mt-1 w-3/4" name="city" id="city-dropdown"/>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <x-label for="postal_code" :value="__('Postal code')" class="w-1/4 text-right pr-4"/>
                            <x-input id="postal_code" class="flex-grow block mt-1 w-3/4" type="text" name="postal_code" :value="$patient->user->profile->address->postal_code"/>
                        </div>
                    </fieldset>

                    <div class="flex items-center justify-end w-full mt-6">
                        <a href="<?php echo route('patients');?>" class="mx-10">
                            {{ __('Cancel') }}
                        </a>
                        <x-button class="bg-green-500 hover:bg-green-400 focus:ring-4 focus:ring-green-500">
                            {{ __('Update') }}
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
                var country_id = '{{$patient->user->profile->address->country->id}}';
                var city_id = '{{$patient->user->profile->address->city->id}}';

                getCities(country_id);

                $('#country-dropdown').on('change', function() {
                    var country_id = this.value;
                    getCities(country_id);
                });

                function getCities(country_id) {
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
                                $('#city-dropdown option[value="'+ city_id +'"]').prop('selected', true);
                            });
                        }
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>
