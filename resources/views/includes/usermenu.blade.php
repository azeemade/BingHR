<div class="flex justify-between bg-white p-3 items-center">
    <div>
        <p class="text-lg font-medium">List Users</p>
    </div>
    <div>
        @include('includes.searchbar')
    </div>
</div>

<table class="table-auto w-full rounded-lg table-shadow mb-5">
    <thead>
        <tr class="bg-gray-200 text-gray-500 text-left border border-gray-200">
            <th class="p-3">Name</th>
            <th></th>
            <th>Create Date</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        @foreach ($users as $user)
            <tr class="border border-gray-200">
                <td class="flex p-3">
                    <div class="mr-3">
                        <img src="https://api.multiavatar.com/{{ $user->firstname }}.png" alt="user image" class="w-12 h-12">
                    </div>
                    <div>
                        <p class="font-medium">{{ $user->firstname }} {{ $user->lastname }}</p>
                        <p class="text-gray-500">{{ $user->email }}</p>
                    </div>
                </td>
                <td></td>
                <td>
                    {{ $user->created_at }}
                </td>
                <td>
                    {{ $user->role_type }}
                </td>
                <td>
                    <button class="mr-3">
                        <i class="bi bi-pencil text-gray-500"></i>
                    </button>
                    <button>
                        <i class="bi bi-trash text-gray-500"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>