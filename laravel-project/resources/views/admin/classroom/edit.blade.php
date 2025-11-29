<div id="editClassroomModal-{{ $classroom->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 items-center justify-center overflow-y-auto overflow-x-hidden bg-black/20">

    <div class="relative w-full max-w-md p-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg relative">

            <!-- Close Button -->
            <button type="button"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-900 dark:hover:text-white bg-transparent rounded-lg p-1.5"
                data-modal-hide="editClassroomModal-{{ $classroom->id }}">
                ✕
            </button>

            <!-- Modal Content -->
            <div class="p-6 space-y-5">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Classroom</h3>

                <form method="POST" action="{{ route('admin.classroom.update', $classroom->id) }}"
                    onsubmit="document.getElementById('editClassroomModal-{{ $classroom->id }}').classList.add('hidden')"
                    class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Class Name -->
                    <div class="flex flex-col">
                        <label class="mb-1 font-medium text-gray-700 dark:text-gray-200">Class Name</label>
                        <input type="text" name="name" class="input w-full border border-gray-300 rounded-lg p-2 dark:bg-gray-700 dark:text-white" value="{{ $classroom->name }}">
                    </div>

                    <!-- Teacher Select -->
                    <div class="flex flex-col">
                        <label class="mb-1 font-medium text-gray-700 dark:text-gray-200">Teacher</label>
                        <select name="teacher_id" class="input w-full border border-gray-300 rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                            @foreach($teachers as $teacher)
                            <option
                                value="{{ $teacher->id }}"
                                {{ $teacher->id == $classroom->teacher_id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full px-5 py-2.5 bg-primary-700 hover:bg-primary-800 text-white font-medium rounded-lg focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>