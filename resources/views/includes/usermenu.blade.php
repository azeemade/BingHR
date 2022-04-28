<div>
    <div>
        <p>List Users</p>
    </div>
    <div>
        @include('includes.searchbar')
    </div>
</div>

<table class="table-auto">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
            <th>Create Date</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                {{-- <div> --}}
                    <img src="" alt="">
                {{-- </div>
                <div> --}}
                    <p>{{ $user->firstname }} {{ $user->lastname }}</p>
                    <p>{{ $user->email }}</p>
                {{-- </div> --}}
            </tr>
            <tr></tr>
            <tr>{{ $user->created_at }}</tr>
            <tr>{{ $user->role_type }}</tr>
            <tr>
                <button>
                    <i class="bi bi-pencil"></i>
                </button>
                <button>
                    <i class="bi bi-trash"></i>
                </button>
            </tr>
        @endforeach
    </tbody>
</table>