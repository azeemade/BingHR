<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog rounded-lg modal-lg relative w-auto pointer-events-none">
      <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
        
        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
          <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLgLabel">
            Edit User
          </h5>
          <button type="button"
            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
            data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body relative p-4">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-8">
                    <div class="mb-4">
                        <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md pl-5 py-2 ring-1 ring-slate-200 shadow-sm" type="text" aria-label="ID" placeholder="Employee ID *" value="{{ $user->id }}" name="id">
                        @error('id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 flex space-x-3">
                        <div class="w-full">
                            <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md pl-5 py-2 ring-1 ring-slate-200 shadow-sm" type="text" aria-label="fn" placeholder="First Name *" value="{{ $user->firstname }}" name="firstname">
                            @error('firstname')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md pl-5 py-2 ring-1 ring-slate-200 shadow-sm" type="text" aria-label="ln" placeholder="Last Name *" value="{{ $user->lastname }}" name="lastname">
                        </div>
                    </div>
                    <div class="mb-4 flex space-x-3">
                        <div class="w-full">
                            <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md pl-5 py-2 ring-1 ring-slate-200 shadow-sm" type="email" aria-label="EID" placeholder="Email ID *" value="{{ $user->email }}" name="email">
                        </div>
                        <div class="w-full">
                            <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md pl-5 py-2 ring-1 ring-slate-200 shadow-sm" type="tel" aria-label="MNO" placeholder="Mobile No *" value="{{ $user->mobile }}" name="mobile">
                        </div>
                        <div class="w-full">
                            @php
                                $roles = array("Super Admin", "Admin", "HR Admin", "Employee");
                            @endphp

                            <select name="roles" class="block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                @foreach($roles as $role)
                                    @foreach($user->getRoleNames() as $val)
                                        <option  value="{{ $role }}" {{$val == $role ? 'selected' : ''}}>{{ $role }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="w-full">
                            <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md pl-5 py-2 ring-1 ring-slate-200 shadow-sm" type="text" aria-label="un" placeholder="Username *" value="{{ $user->username }}" name="username">
                        </div>
                        <div class="w-full">
                            <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md pl-5 py-2 ring-1 ring-slate-200 shadow-sm" type="password" aria-label="PASS" placeholder="Password *" name="password" value="{{ $user->password }}">
                        </div>
                        <div class="w-full">
                            <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md pl-5 py-2 ring-1 ring-slate-200 shadow-sm" type="password" aria-label="CP" placeholder="Confirm Password *" name="password_confirmation" value="{{ $user->password }}">
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table-auto w-full rounded-lg table-shadow mb-5">
                        <thead>
                            <tr class="bg-sky-50 text-gray-500 text-left border border-gray-200">
                                <th class="p-3 font-medium text-sm">Module Permission</th>
                                <th class="font-medium text-sm">Read</th>
                                <th class="font-medium text-sm">Write</th>
                                <th class="font-medium text-sm">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($roles as $role)
                                @foreach($user->getAllPermissions() as $val)
                                    <tr class="border border-gray-200">
                                        <td class="p-3 text-sm">
                                            {{ $role }}
                                        </td>
                                        <td>
                                            <input type="checkbox" name="read" value="{{ $val }}">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="write" value="{{ $val }}">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="delete" value="{{ $val }}">
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="submit" class="inline-block px-6 py-2.5 bg-sky-300
                    text-white font-medium text-xs leading-tight rounded shadow-md
                    hover:bg-sky-500 hover:shadow-lg focus:bg-sky-800 focus:shadow-lg
                    focus:outline-none focus:ring-0 active:bg-sky-800 active:shadow-lg transition 
                    duration-150 ease-in-out mr-2" 
                    style="
                        background-color: #7dd3fc;
                        background-image: none;">
                        Save
                    </button>
                    <button type="button" class="inline-block px-6 py-2.5 bg-transparent
                    text-slate-200 font-medium text-xs leading-tight rounded 
                    shadow-md hover:border hover:shadow-lg focus:border 
                    focus:shadow-lg focus:outline-none focus:ring-0 active:border 
                    active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>