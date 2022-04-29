@if ($message = Session::get('success'))
    <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

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
            <th class="p-3 font-medium">Name</th>
            <th></th>
            <th class="font-medium">Create Date</th>
            <th class="font-medium">Role</th>
            <th class="font-medium">Action</th>
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
                        <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                    </div>
                </td>
                @foreach($user->getRoleNames() as $val)
                    @php
                        $red = $blue = $green = $col = false;
                        if ($val == "Super Admin") {
                            $red = true;
                        } else if ($val == "Admin") {
                            $blue = true;
                        } else if ($val == "HR Admin") {
                            $green = true;
                        } else {
                            $col = true;
                        }
                    @endphp
                    <td class="px-3">
                        <div @class([
                            'px-1', 
                            'text-white',
                            'rounded-xl',
                            'text-sm',
                            'text-center',
                            'bg-red-500' => $red,
                            'bg-blue-500' => $blue,
                            'bg-green-500' => $green,
                            'bg-gray-400' => $col,
                        ])>
                            {{ $val }} 
                        </div>
                    </td>
                @endforeach
                <td class="text-sm">
                    {{ $user->created_at }}
                </td>
                <td class="text-sm">
                    {{ $user->role_type }}
                </td>
                <td>
                    <div class="flex">
                        <button class="mr-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                            <i class="bi bi-pencil text-gray-500"></i>
                        </button>
                        <form action="{{ route('user.destroy', $user->id) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button>
                                <i class="bi bi-trash text-gray-500"></i>
                            </button>
                        </form>
                        <x-modal :user="$user"></x-modal>
                        
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>