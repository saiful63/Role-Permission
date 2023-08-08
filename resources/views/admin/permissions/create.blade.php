<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex p-2">
                     <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 bg-green-700 text-slate-100 hover:bg-green-500 rounded-md">Permission Index</a>
                </div>
                <div class="flex flex-col">

                    <form method="POST" action="{{ route('admin.permissions.store') }}">
                        @csrf
                        <div class="mb-6 w-96">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role name</label>
                            <input type="name" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name">
                            @error('name')
                               <span class="text-red-400 text-sm ">
                                {{ $message }}
                               </span>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
