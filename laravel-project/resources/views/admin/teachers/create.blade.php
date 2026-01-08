<x-admin.layout>
    <div class="px-4 py-4">
        <h1 class="text-3xl ml-40 font-bold text-white mb-4">
            Create New Teacher
        </h1>
    </div>

    <section class="bg-gray-50 dark:bg-gray-900 p-4 sm:p-2">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                
                <!-- Back Button -->
                <div class="p-4 border-b dark:border-gray-700">
                    <a href="{{ route('admin.teachers.index') }}" 
                       class="inline-flex items-center text-sm font-medium text-primary-700 hover:text-primary-800 dark:text-primary-500">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                        </svg>
                        Back to Teachers
                    </a>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form action="{{ route('admin.teachers.store') }}" method="POST">
                        @csrf

                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            
                            <!-- Teacher Name -->
                            <div class="md:col-span-2">
                                <x-admin.field 
                                    label="Teacher Name" 
                                    name="name" 
                                    required 
                                    value="{{ old('name') }}" 
                                    placeholder="e.g., John Doe"
                                />
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Subject Selection -->
                            <div class="md:col-span-2">
                                <label for="subject_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Subject <span class="text-red-600">*</span>
                                </label>
                                <select 
                                    id="subject_id"
                                    name="subject_id" 
                                    required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Select a subject</option>
                                    @forelse($subjects as $subject)
                                        <option value="{{ $subject->id }}" 
                                                {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @empty
                                        <option value="" disabled>No available subjects</option>
                                    @endforelse
                                </select>
                                @error('subject_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                                
                                @if($subjects->isEmpty())
                                    <div class="mt-2 p-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                                        <span class="font-medium">Warning!</span> All subjects have been assigned to teachers. Please create a new subject first.
                                    </div>
                                @endif
                            </div>

                            <!-- Email -->
                            <div>
                                <x-admin.field 
                                    label="Email" 
                                    name="email" 
                                    type="email"
                                    required 
                                    value="{{ old('email') }}" 
                                    placeholder="teacher@example.com"
                                />
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <x-admin.field 
                                    label="Phone" 
                                    name="phone" 
                                    required 
                                    value="{{ old('phone') }}" 
                                    placeholder="08123456789"
                                />
                                @error('phone')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="md:col-span-2">
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Address
                                </label>
                                <textarea 
                                    id="address"
                                    name="address" 
                                    rows="3"
                                    placeholder="Enter complete address..."
                                    class="block w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 text-gray-900 text-sm
                                           focus:ring-primary-500 focus:border-primary-500
                                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                           dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center space-x-4">
                            <button 
                                type="submit"
                                {{ $subjects->isEmpty() ? 'disabled' : '' }}
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 disabled:opacity-50 disabled:cursor-not-allowed">
                                Create Teacher
                            </button>
                            <a href="{{ route('admin.teachers.index') }}"
                               class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-300 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</x-admin.layout>