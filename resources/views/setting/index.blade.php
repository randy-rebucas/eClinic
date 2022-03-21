<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pt-5">
                <div x-data="{ tab: 'profile' }" class="">

                    <nav class="flex flex-col sm:flex-row">
                        <a class="text-gray-600 py-4 px-6 block hover:text-green-500 focus:outline-none" :class="{ 'text-green-500 border-b-2 font-medium border-green-500': tab === 'profile' }" x-on:click.prevent="tab = 'profile'" href="#">Profile</a>
                        <a class="text-gray-600 py-4 px-6 block hover:text-green-500 focus:outline-none" :class="{ 'text-green-500 border-b-2 font-medium border-green-500': tab === 'clinic' }" x-on:click.prevent="tab = 'clinic'" href="#">Clinic</a>
                        {{-- <a class="text-gray-600 py-4 px-6 block hover:text-green-500 focus:outline-none" :class="{ 'text-green-500 border-b-2 font-medium border-green-500': tab === 'account' }" x-on:click.prevent="tab = 'account'" href="#">Account</a> --}}
                    </nav>
                    <!-- nav -->
                    <!-- content -->
                    <div x-show="tab === 'profile'" class="mt-5">
                        @if ($errors->any())
                            <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('user.update', $user->id) }}" class="flex flex-wrap">
                            @csrf
                            @method('PUT')
                            <fieldset class="flex-grow w-2/4">
                                <legend>Profile information</legend>

                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="firstname" :value="__('Firstname')" class="w-1/4 text-right pr-4"/>

                                    <x-input id="firstname" class="flex-grow block mt-1 w-3/4" type="text" name="firstname" :value="$user->profile->firstname" autofocus />
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="lastname" :value="__('Lastname')" class="w-1/4 text-right pr-4"/>

                                    <x-input id="lastname" class="flex-grow block mt-1 w-3/4" type="text" name="lastname" :value="$user->profile->lastname" />
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="mi" :value="__('Middle Initial')" class="w-1/4 text-right pr-4"/>

                                    <x-input id="mi" class="flex-grow block mt-1 w-3/4" type="text" name="mi" :value="$user->profile->mi" />
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="gender" :value="__('Gender')" class="w-1/4 text-right pr-4"/>
                                    <x-select :options="$gender" :selectedOption="$user->profile->gender" class="flex-grow block mt-1 w-3/4" name="gender" id="gender"/>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="dob" :value="__('Date of birth')" class="w-1/4 text-right pr-4"/>
                                    <x-input id="dob" class="flex-grow block mt-1 w-3/4" type="date" name="dob" :value="$user->profile->dob" />
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="mobile" :value="__('Mobile')" class="w-1/4 text-right pr-4"/>
                                    <x-input id="mobile" class="flex-grow block mt-1 w-3/4" type="text" name="mobile" :value="$user->profile->mobile" />
                                </div>
                                <legend>Sensitive information</legend>
                                <!-- Name -->
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="name" :value="__('Displayname')" class="w-1/4 text-right pr-4"/>
                                    <x-input id="name" class="flex-grow block mt-1 w-3/4" type="text" name="name" :value="$user->name"/>
                                </div>
                                <!-- Email Address -->
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="email" :value="__('Email')" class="w-1/4 text-right pr-4" />
                                    <x-input id="email" class="flex-grow block border-0 bg-transparent shadow-none border-transparent focus:border-transparent focus:ring-transparent mt-1 w-3/4" type="email" name="email" :value="$user->email" readonly/>
                                </div>
                            </fieldset>
                            <fieldset class="flex-grow w-2/4">
                                <legend>Address</legend>

                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="line_1" :value="__('Line 1')" class="w-1/4 text-right pr-4"/>
                                    <x-input id="line_1" class="flex-grow block mt-1 w-3/4" type="text" name="line_1" :value="$user->profile->address->line_1"/>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="line_2" :value="__('Line 2')" class="w-1/4 text-right pr-4"/>
                                    <x-input id="line_2" class="flex-grow block mt-1 w-3/4" type="text" name="line_2" :value="$user->profile->address->line_2"/>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="district" :value="__('District')" class="w-1/4 text-right pr-4"/>
                                    <x-input id="district" class="flex-grow block mt-1 w-3/4" type="text" name="district" :value="$user->profile->address->district"/>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="country" :value="__('Country')" class="w-1/4 text-right pr-4"/>
                                    <x-select :options="$countries" :selectedOption="$user->profile->address->country->id" class="flex-grow block mt-1 w-3/4" name="country" id="country-dropdown"/>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="city" :value="__('City')" class="w-1/4 text-right pr-4"/>
                                    <x-select :options="[]" :selectedOption="$user->profile->address->city->id" class="flex-grow block mt-1 w-3/4" name="city" id="city-dropdown"/>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="postal_code" :value="__('Postal code')" class="w-1/4 text-right pr-4"/>
                                    <x-input id="postal_code" class="flex-grow block mt-1 w-3/4" type="text" name="postal_code" :value="$user->profile->address->postal_code"/>
                                </div>
                                <legend>Change password</legend>
                                <!-- Password -->
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="prev_password" :value="__('Previous Password')" class="w-1/4 text-right pr-4"/>
                                    <x-input id="prev_password" class="flex-grow block mt-1 w-3/4" type="password" name="prev_password" />
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <x-label for="new_password" :value="__('New Password')" class="w-1/4 text-right pr-4"/>
                                    <x-input id="new_password" class="flex-grow block mt-1 w-3/4" type="password" name="new_password" />
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
                      <div x-show="tab === 'clinic'">
                            @livewire('clinic.index-clinic', ['clinics' => $user->clinics])
                      </div>
                      {{-- <div x-show="tab === 'account'">
                        <h3>Account</h3>
                        <p>
                          close
                        </p>
                      </div> --}}
                </div>
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
                var country_id = '{{$user->profile->address->country->id}}';
                var city_id = '{{$user->profile->address->city->id}}';

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
