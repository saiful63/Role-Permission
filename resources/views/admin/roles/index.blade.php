<x-admin-layout>


    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-end p-2">
                     <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Create Role</a>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">{role}
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $role->name }}
                                    </th>
                                    <td class="px-6 py-4 flex">
                                            <a href="{{ route('admin.roles.edit',$role->id) }}" class="px-4 py-2 rounded-md bg-green-700 font-medium text-white hover:underline">Edit</a>

                                            <form class="px-4 py-2 rounded-md bg-red-700 font-medium text-white mx-5" action="{{ route('admin.roles.destroy',$role->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                    </td>
                                </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
