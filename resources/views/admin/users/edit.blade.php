<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <div>

                <form method="POST" action="{{ route('admin.users.assignRole',$user->id) }}">
                        @csrf
                        <div class="mb-6 w-96">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Permission name</label>
                            <select name="assignRole" data-te-select-init class="w-full">
                                @foreach ($roles as $role)
                                   <option  value="{{ $role->name }}">{{ $role->name }}</option>

                                @endforeach
                            </select>

                            @error('name')
                               <span class="text-red-400 text-sm ">
                                {{ $message }}
                               </span>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Assign</button>
                    </form>



            </div>


            </div>
        </div>
    </div>
</x-admin-layout>
