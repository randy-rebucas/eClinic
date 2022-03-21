<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Patients') }}
        </h2>
    </x-slot>
    <div class="flex max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 items-center">
        <form method="GET" action="{{ route('patients') }}" class="">
            <input type="search" name="searchkey" class="outline-none text-gray-600 focus:text-blue-600 rounded-md shadow-sm border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50" placeholder="search patient..." />
        </form>
        @if ($searchString)
            <div class="flex items-center justify-between md:flex-row">
                <label class="px-5">{{ $searchString }}</label>
                <a href="<?php echo route('patients');?>" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>
        @endif
        <div class="flex-grow text-right">
            <a href="<?php echo route('patient.create');?>" class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-500 dark:hover:bg-green-400 dark:focus:ring-green-500">Create</a>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                @if(session()->has('success'))
                    <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert" id="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if ($patients->count())
                    <div class="grid gap-4 md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 mb-10">
                        @foreach ($patients as $patient)
                        <div class="group relative bg-white overflow-hidden hover:bg-green-100 border shadow-sm border-gray-200 p-3">
                            <a href="<?php echo route('patient.edit', ['id' => $patient->id]);?>" class="absolute right-8 hidden group-hover:block">
                                <svg class="h-6 w-6 text-black-500" <svg  width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /></svg>
                            </a>
                            <form method="POST" action="{{ route('patient.destroy', $patient->id) }}"  class="delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="absolute right-1 hidden group-hover:block">
                                    <svg class="h-6 w-6 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg>
                                </button>
                            </form>

                            <div class="m-2 text-justify text-sm">
                                <p class="text-right text-xs group-hover:mr-10">Last Visit:
                                    @if ($patient->visits->count())
                                        {{ $patient->visits->last()->created_at }}
                                    @else
                                        ---
                                    @endif
                                </p>
                                <h1 class="font-bold text-xl mb-1">{{ Str::title($patient->user->profile->firstname. ' '. $patient->user->profile->lastname)}}</h1>
                                <p class="text-gray-800 text-sm">{{$patient->user->profile->mobile}}</p>
                                <address class="text-gray-600 text-base pt-3 font-normal">
                                    {{$patient->user->profile->address->line_1}},
                                    {{$patient->user->profile->address->line_2}},
                                    {{$patient->user->profile->address->district}},
                                    {{$patient->user->profile->address->city->name}},
                                    {{$patient->user->profile->address->country->name}} {{$patient->user->profile->address->postal_code}}
                                </address>
                            </div>
                            <div class="w-full text-right mt-4">
                                <a class="text-green-400 uppercase font-bold text-sm" href="<?php echo route('patient.show', ['id' => $patient->id]);?>">Details</a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- {{ $patients->links() }} --}}
                    {{ $patients->onEachSide(5)->links() }}
                @else
                    <div class="flex h-screen justify-center items-center">
                        <div class="text-center">
                            <h1 class="text-xl">No patient found!!!</h1>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(function () {
                if($('#alert').length){
                    $('#alert').delay(3000).fadeOut();
                }

                $('.delete').submit(function() {
                    if( !confirm('Are you sure that you want to submit the form') ){
                        event.preventDefault();
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
