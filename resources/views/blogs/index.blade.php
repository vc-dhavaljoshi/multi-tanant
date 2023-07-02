<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-start mb-4">
                        <a href="{{ route('blog.create') }}">
                            <x-primary-button>
                                {{ __('Add New') }}
                            </x-primary-button>
                        </a>
                    </div>
                    @if(session('success'))
                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-green-600 bg-green-200 uppercase last:mr-0 mr-1">
                        {{ session('success') }}
                        </span>
                    @endif
                    @if(count($blogs))
                        <table class="table-fixed w-full border-collapse border border-spacing-0.5 border-slate-400 ...">
                            <thead>
                            <tr>
                                <th class="border border-slate-300 ...">Title</th>
                                <th class="border border-slate-300 ...">Content</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td class="border border-slate-300 ...">{{ $blog->title ?? '-' }}</td>
                                        <td class="border border-slate-300 ...">{{ $blog->content ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Record Found!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
