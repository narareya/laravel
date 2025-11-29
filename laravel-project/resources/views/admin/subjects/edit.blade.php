<div id="editSubjectModal-{{ $subject->id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 items-center justify-center overflow-y-auto overflow-x-hidden bg-black/20">

    <div class="relative w-full max-w-2xl p-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg relative">

            <!-- Close Button -->
            <button type="button"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-900 dark:hover:text-white bg-transparent rounded-lg p-1.5"
                data-modal-hide="editSubjectModal-{{ $subject->id }}">
                ✕
            </button>

            <!-- Modal Content -->
            <div class="p-6 space-y-5">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Teacher</h3>

                <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST" onsubmit="document.getElementById('editSubjectModal-{{ $subject->id }}').classList.add('hidden')">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-4 mb-6 sm:grid-cols-2">

                        <x-admin.field label="Name" name="name" required value="{{ old('name', $subject->name) }}" />

                        {{-- DESCRIPTION --}}
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Description
                            </label>
                            <textarea name="description" rows="4"
                                class="block w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 text-gray-900
                                   focus:ring-primary-500 focus:border-primary-500
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('description', $subject->description) }}</textarea>
                        </div>
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