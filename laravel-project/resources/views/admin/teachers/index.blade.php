<x-admin.layout>
    <div class="px-4 py-4">
        <h1 class="text-3xl ml-40 font-bold text-white mb-4">
            {{ $title }}
        </h1>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12 mb-4">
        <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
    </div>
    @endif

    <section class="bg-gray-50 dark:bg-gray-900 p-4 sm:p-2">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                
                <!-- Search & Add Button -->
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center" method="GET" action="{{ route('admin.teachers.index') }}">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" 
                                       name="search" 
                                       id="simple-search" 
                                       value="{{ request('search') }}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                       placeholder="Search teachers...">
                            </div>
                        </form>
                    </div>
                    
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('admin.teachers.create') }}" 
                           class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Teacher
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">Subject</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Phone</th>
                                <th scope="col" class="px-4 py-3">Address</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teachers as $index => $teacher)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3 text-center">
                                    {{ $teachers->firstItem() + $index }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                                    {{ $teacher->name }}
                                </td>
                                <td class="px-4 py-3">
                                    @if($teacher->subject)
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                            {{ $teacher->subject->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500">No subject</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $teacher->email }}</td>
                                <td class="px-4 py-3">{{ $teacher->phone }}</td>
                                <td class="px-4 py-3">
                                    {{ Str::limit($teacher->address, 30) ?? '-' }}
                                </td>

                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="dropdown-button-{{ $teacher->id }}" 
                                            data-dropdown-toggle="dropdown-{{ $teacher->id }}" 
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" 
                                            type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    
                                    <div id="dropdown-{{ $teacher->id }}" 
                                         class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                            <li>
                                                <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                                                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Edit
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <form method="POST" 
                                                  action="{{ route('admin.teachers.destroy', $teacher->id) }}" 
                                                  onsubmit="return confirm('Are you sure you want to delete {{ addslashes($teacher->name) }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="block w-full text-left py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-400">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                        <p class="text-lg font-semibold">No teachers found</p>
                                        <p class="text-sm mt-1">Add your first teacher to get started</p>
                                        <a href="{{ route('admin.teachers.create') }}" 
                                           class="mt-4 text-primary-600 hover:text-primary-700 font-medium">
                                            + Add Teacher
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" 
                     aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $teachers->firstItem() ?? 0 }}–{{ $teachers->lastItem() ?? 0 }}
                        </span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $teachers->total() }}
                        </span>
                    </span>
                    <div>
                        {{ $teachers->links('vendor.pagination.tailwind') }}
                    </div>
                </nav>

            </div>
        </div>
    </section>
</x-admin.layout>