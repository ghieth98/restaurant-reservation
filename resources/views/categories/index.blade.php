<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-y-6">
            @foreach ($categories as $category)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48"
                         src="https://cdn.pixabay.com/photo/2014/11/05/15/57/salmon-518032_960_720.jpg"
                         alt="Image"/>
                    {{--                    <img class="w-full h-48" src="{{ Storage::url($category->image) }}" alt="Image" />--}}
                    <div class="px-6 py-4">

                        <a href="{{ route('categories.show', $category->id) }}">
                            <h4
                                class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase">
                                {{ $category->name }}</h4>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="px-28">
        {{ $categories->links() }}
    </div>
</x-guest-layout>
