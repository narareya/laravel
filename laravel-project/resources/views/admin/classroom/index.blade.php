<x-admin.layout>
    <div class="px-4 py-4">
        <h1 class="text-3xl ml-40 font-bold text-white mb-4">
            {{ $title }}
        </h1>
    </div>
    <section class="bg-gray-50 dark:bg-gray-900 p-4 sm:p-2">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-visible">

                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Search">
                            </div>
                        </form>
                    </div>

                    <div class="w-full md:w-auto flex md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3">
                        <a href="{{ route('admin.classroom.create') }}" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Class Name</th>
                                <th class="px-4 py-3">Teacher</th>
                                <th class="px-4 py-3">Students</th>
                                <th class="px-4 py-3"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($classrooms as $classroom)
                            <tr class="border-b dark:border-gray-700" x-data="{ openEditModal: false }">
                                <td class="px-4 py-3 text-center">{{ $classroom->id }}</td>
                                <td class="px-4 py-3">{{ $classroom->name }}</td>
                                <td class="px-4 py-3">{{ $classroom->teacher->name ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    @foreach ($classroom->students as $student)
                                    {{ $student->name }}@if(!$loop->last), @endif
                                    @endforeach
                                </td>

                                <td class="px-4 py-3 flex items-center justify-end relative">
                                    <button data-dropdown-toggle="dropdown-{{ $classroom->id }}" class="inline-flex items-center">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>

                                    <div id="dropdown-{{ $classroom->id }}"
                                        class="hidden absolute right-0 mt-2 z-20 w-44 bg-white rounded shadow dark:bg-gray-700">
                                        <ul class="py-1">

                                            <li>
                                                <button type="button"
                                                    data-modal-target="editClassroomModal-{{ $classroom->id }}"
                                                    data-modal-toggle="editClassroomModal-{{ $classroom->id }}"
                                                    class="open-edit-modal block w-full text-left py-2 px-4 hover:bg-gray-100
                                                        dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Edit
                                                </button>

                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>

                <nav class="flex justify-between p-4 text-white">
                    <span class="text-sm">
                        Showing
                        <span class="font-semibold">{{ $classrooms->firstItem() }}–{{ $classrooms->lastItem() }}</span>
                        of
                        <span class="font-semibold">{{ $classrooms->total() }}</span>
                    </span>

                    <div>{{ $classrooms->links('vendor.pagination.tailwind') }}</div>
                </nav>


                {{-- Modals Edit --}}
                @foreach ($classrooms as $classroom)
                @include('admin.classroom.edit', ['classroom' => $classroom, 'teachers' => $teachers])
                @endforeach
            </div>
        </div>
    </section>
</x-admin.layout>