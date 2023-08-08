<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex p-2 mb-6">
                     <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-green-700 text-slate-100 hover:bg-green-500 rounded-md">Role Index</a>
                </div>
                <div class="flex flex-col">

                    <form method="POST" action="{{ route('admin.roles.update',$role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-6 w-96">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Role name</label>
                            <input type="name" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $role->name }}">
                            @error('name')
                               <span class="text-red-400 text-sm ">
                                {{ $message }}
                               </span>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    </form>

                </div>


            <div class="mt-6 p-2">
              <h2 class="text-2xl font-semibold">Role Permissions</h2>
              <div class="mt-2 p-2 flex">
                 @if($role->permissions)
                    @foreach ($role->permissions as $role_permission)
                        <form class="px-2 py-2 mx-1 rounded-md bg-red-700 font-medium text-white "
                        action="{{ route('admin.roles.permissions.revoke',[$role->id,$role_permission->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ $role_permission->name }}</button>
                        </form>
                    @endforeach
                 @endif
              </div>
            </div>

            <div>
                <form method="POST" action="{{ route('admin.roles.permissions',$role->id) }}">
                        @csrf
                        <div class="mb-6 w-96">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Permission name</label>
                            <select name="permission" data-te-select-init class="w-full">
                                @foreach ($permissions as $permission)
                                   <option  value="{{ $permission->name }}">{{ $permission->name }}</option>

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

            <div>

            </div>
            </div>
        </div>
    </div>
</x-admin-layout>
