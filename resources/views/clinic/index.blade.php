<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Clinics') }}
        </h2>
    </x-slot>
    <div class="flex max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 items-center">

        <div class="flex-grow text-right">
            <a href="<?php echo route('clinic.create');?>" class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-500 dark:hover:bg-green-400 dark:focus:ring-green-500">Create</a>
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
                @if ($clinics->count())
                    <div class="grid gap-4 md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 mb-10">
                        @foreach ($clinics as $clinic)

                        <div class="group relative bg-white overflow-hidden hover:bg-green-100 border shadow-sm border-gray-200 p-3">
                            <a href="<?php echo route('clinic.edit', ['id' => $clinic->id]);?>" class="absolute right-8 hidden group-hover:block">
                                <svg class="h-6 w-6 text-black-500" <svg  width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /></svg>
                            </a>
                            <form method="POST" action="{{ route('clinic.destroy', $clinic->id) }}"  class="delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="absolute right-1 hidden group-hover:block">
                                    <svg class="h-6 w-6 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg>
                                </button>
                            </form>

                            <div class="m-2 text-justify text-sm">
                                <img src="{{asset($clinic->logo)}}"/>

                                <p class="text-right text-xs">Created:
                                    {{ $clinic->created_at }}
                                </p>
                                <h1 class="font-bold text-xl mb-1">{{ Str::title($clinic->name)}}</h1>
                                <address class="text-gray-600 text-base pt-3 font-normal">
                                    {{$clinic->address->line_1}},
                                    {{$clinic->address->line_2}},
                                    {{$clinic->address->district}},
                                    {{$clinic->address->city->name}},
                                    {{$clinic->address->country->name}} {{$clinic->address->postal_code}}
                                </address>
                            </div>
                            <div class="w-full text-right mt-4">
                                <a class="text-green-400 uppercase font-bold text-sm" href="<?php echo route('clinic.show', ['id' => $clinic->id]);?>">Details</a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{ $clinics->links() }}
                @else
                    <div class="flex h-full justify-center items-center py-8">
                        <div class="text-center">
                            <h1 class="text-xl">No clinic found!!!</h1>
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
