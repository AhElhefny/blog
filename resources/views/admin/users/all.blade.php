<x-admin.layout>
    <div class="card" style="margin: 25px;">
        <h5 class="card-header">All Users</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Careated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($allUser as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td><span class="badge bg-label-{{($user->status=='waiting')?'danger':'primary'}}  me-1">{{$user->status}}</span></td>
                        <td>
                            {{$user->created_at->diffForHumans()}}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/admin/users/{{$user->id}}/edit"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                    >
                                    <a class="dropdown-item" href="/admin/users/{{$user->id}}/changeRole"
                                    ><i class="bx bx-edit-alt me-1"></i> Change Role</a
                                    >
                                    <a class="dropdown-item" href="/admin/users/{{$user->id}}/changeStatus"
                                    ><i class="bx bx-edit-alt me-1"></i> Change Status</a
                                    >
                                    <a class="dropdown-item" href="/admin/users/{{$user->id}}/delete"
                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                    >
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-admin.layout>


