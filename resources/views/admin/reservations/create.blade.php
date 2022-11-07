<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin area') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2 ">
                <a href="{{ route('admin.reservations.index') }}"
                   class="px-4 py-2 bg-blue-700 hover:bg-blue-800 rounded-lg text-white text-l ">
                    Reservation
                </a>
            </div>

            <form action="{{ route('admin.reservations.store') }}" method="POST">
                @csrf

                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            First Name
                        </label>
                        <input type="text" id="first_name" name="first_name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter first name" >
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Last Name
                        </label>
                        <input type="text" id="last_name" name="last_name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter last name" >
                    </div>
                    <div>
                        <label for="email"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Email
                        </label>
                        <input type="email" id="email" name="email"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Email Here" >
                    </div>
                    <div>
                        <label for="phone_number"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Phone Number
                        </label>
                        <input type="number" id="phone_number" name="phone_number"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Phone Number Here" >
                    </div>
                    <div>
                        <label for="reservation_date"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Reservation Date
                        </label>
                        <input id="reservation_date" name="reservation_date" type="datetime-local"
{{--                               value="{{ old('reservation_date',\Carbon\Carbon::parse($reservation->reservation_date)--}}
{{--                                        ->format('d M, Y')) }}"--}}
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Reservation date Here">
                    </div>
                    <div>
                        <label for="table_id"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Table
                        </label>
                        <select name="table_id" id="table_id" class="form-multiselect bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @foreach($tables as $id=>$entry)
                                <option value="{{ $id }} {{ old('table_id') == $id ? 'selected' : '' }}">
                                    {{ $entry }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="guest_number"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Guest Number
                        </label>
                        <input type="number" id="guest_number" name="guest_number" min="1" max="10"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Guest Number Here" >
                    </div>
                </div>
                <button type="submit"
                        class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                         focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto
                         px-5 py-2.5 ml-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
