<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin area') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex m-2 p-2 pb-3 ">
                <a href="{{ route('admin.menus.create') }}"
                   class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white text-l ">
                    New Menu
                </a>
            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Image
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Menu
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Description
                        </th>
                        <th scope="col" class="py-3 px-6">
                            price
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50
                         dark:hover:bg-gray-600">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Image in here
                            </th>
                            <td class="py-4 px-6">
                                {{$menu->name}}
                            </td>
                            <td class="py-4 px-6">
                                {{ $menu->description }}
                            </td>
                            <td class="py-4 px-6">
                                {{ round($menu->price/100, 2) }}$
                            </td>
                            <td class="">
                                <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                   class="font-medium text-white bg-blue-600 rounded p-1.5 dark:bg-blue-500 text-white
                                    hover:bg-blue-800">
                                    Edit
                                </a>
                            </td>
                            <td class="pr-4">
                                <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="post"
                                      onsubmit="return confirm('Are you sure?!');">
                                    @csrf
                                    @method('delete')
                                    <button class="font-medium text-white bg-red-600 rounded p-1.5 dark:bg-red-500 text-white
                                    hover:bg-red-800" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="px-10">
        {{ $menus->links() }}
    </div>
</x-admin-layout>
