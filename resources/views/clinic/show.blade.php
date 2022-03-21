<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clinic Details') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pt-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12 md:mx-2">
                        <!-- Profile Card -->
                        <div class="bg-white p-3 border-t-2 border-green-400">
                            <div class="image overflow-hidden">
                                <img class="h-auto w-full mx-auto" src="{{asset($clinic->logo)}}" alt="">
                            </div>
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{Str::title($clinic->name)}}</h1>
                            <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">
                                {{$clinic->address->line_1}},
                                {{$clinic->address->line_2}},
                                {{$clinic->address->district}},
                                {{$clinic->address->city->name}},
                                {{$clinic->address->country->name}} {{$clinic->address->postal_code}}
                            </p>
                            <ul class="bg-white text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Created Date</span>
                                    <span class="ml-auto">{{date('F j, Y', strtotime($clinic->created_at))}}</span>
                                </li>
                            </ul>
                        </div>

                        <!-- End of Records card -->
                    </div>
                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="bg-white p-3 shadow-sm rounded-sm border-t-2 border-green-400">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                </span>
                                <span class="tracking-wide">Members</span>
                            </div>
                            <div class="text-gray-700">
                                @livewire('user.index')
                            </div>
                        </div>

                        <div class="my-4"></div>

                        <!-- Experience and education -->
                        <div class="bg-white p-3 shadow-sm rounded-sm border-t-2 border-green-400">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                </span>
                                <span class="tracking-wide">Roles</span>
                            </div>
                            <div class="text-gray-700">
                                @livewire('role.index')
                            </div>
                        </div>

                        <div class="my-4"></div>

                        <!-- Experience and education -->
                        <div class="bg-white p-3 shadow-sm rounded-sm border-t-2 border-green-400">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                </span>
                                <span class="tracking-wide">Permissions</span>
                            </div>
                            <div class="text-gray-700">
                                @livewire('permission.index')
                            </div>
                        </div>
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
