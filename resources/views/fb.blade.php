<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Facebook') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route("facebook.store") }}" method="post">
                @csrf
                <label for="">Search keywords:</label>
                <input type="search" name="search" id="search" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-2">
            </form>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="box flex justify-center" style="flex-wrap: wrap">
                            @forelse ($response as $data)
                            <div class="flex md:w-1/2 w-full mb-6">
                                <a href="{{ \Arr::get($data, 'permalink') }}" target="_blank" class="w-full">
                                    <div class="flex flex-col md:flex-row rounded-lg bg-white shadow-lg max-w-[550px]">
                                    @if (\Arr::get($data, 'content.image'))
                                        <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ \Arr::get($data, 'content.image') }}" alt="" />                                        
                                    @endif
                                    <div class="p-6 flex flex-col justify-start">
                                        <h5 class="text-gray-900 text-xl font-medium mb-2">
                                            {{ \Arr::get($data, 'user.name') }} || {{ \Arr::get($data, 'group.name') }}
                                        </h5>
                                        <p class="text-gray-700 text-base mb-4">
                                            {{ \Str::limit(\Arr::get($data, 'content.text'), 50, '...') }}
                                        </p>
                                        <p class="text-gray-600 text-xs">{{ \Arr::get($data, 'time') }} ago</p>
                                    </div>
                                    </div>
                                </a>
                            </div>
                            @empty
                                <p>result not found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

