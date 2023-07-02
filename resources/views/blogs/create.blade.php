<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('blog.store') }}">
                        @csrf
                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <!-- Content -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Content')" />
                            <textarea id="name" class="block mt-1 w-full" name="blog_content" required autofocus autocomplete="name">{{ old('blog_content') }}</textarea>
                            <x-input-error :messages="$errors->get('blog_content')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button>
                                {{ __('submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
