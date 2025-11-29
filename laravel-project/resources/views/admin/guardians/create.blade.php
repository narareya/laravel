<x-admin.layout>

<section class="bg-gray-50 dark:bg-gray-900 p-4 sm:p-6">
    <div class="mx-auto max-w-3xl">
        <div class="relative p-6 bg-white rounded-lg shadow dark:bg-gray-800">

            <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">
                Add Guardians
            </h2>

            <form action="{{ route('admin.guardians.store') }}" method="POST">
                @csrf

                <div class="grid gap-4 mb-6 sm:grid-cols-2">

                    <x-admin.field label="Name" name="name" required value="{{ old('name') }}" />
                    
                    <x-admin.field label="Job" name="job" required value="{{ old('job') }}" />
                    
                    <x-admin.field label="Phone" name="phone" required value="{{ old('phone') }}" type="number" />

                    <x-admin.field label="Email" name="email" type="email" required value="{{ old('email') }}" />

                    {{-- GENDER --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Gender
                        </label>
                        <select name="gender"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5
                                   focus:ring-primary-500 focus:border-primary-500
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="">Select gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    {{-- ADDRESS --}}
                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Address
                        </label>
                        <textarea name="address" rows="4"
                            class="block w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 text-gray-900
                                   focus:ring-primary-500 focus:border-primary-500
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                    </div>
                </div>

                <button type="submit"
                    class="px-5 py-2.5 bg-primary-700 hover:bg-primary-800 text-white rounded-lg
                           focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Save
                </button>
            </form>

        </div>
    </div>
</section>

</x-admin.layout>
