<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin area') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2 ">
                <a href="{{ route('admin.tables.index') }}"
                   class="px-4 py-2 bg-blue-700 hover:bg-blue-800 rounded-lg text-white text-l ">
                    Table
                </a>
            </div>

            <form action="{{ route('admin.tables.store') }}" method="POST">
                @csrf

                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Name
                        </label>
                        <input type="text" id="name" name="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Enter Table name" required>
                    </div>

                    <div class="mb-6">
                        <label for="status"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Status
                        </label>
                        <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="available">available</option>
                            <option value="occupied">occupied</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="location"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Location
                        </label>
                        <input type="number" min="1" max="15" id="location" name="location"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Table Location here" required>
                    </div>

                    <div class="mb-6">
                        <label for="guest_number"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Guest Number
                        </label>
                        <input type="number" min="1" max="6" id="guest_number" name="guest_number"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Table Guest Number here" required>
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
