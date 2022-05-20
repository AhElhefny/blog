<x-admin.layout>
    <div class="card" style="margin: 25px; top: 100px; margin-bottom: 200px">
        <h5 class="card-header">All Categories</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Careated At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($categories as $c)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$c->id}}</strong></td>
                        <td>{{$c->name}}</td>
                        <td>
                            {{$c->created_at->diffForHumans()}}
                        </td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/admin/categories/{{$c->id}}/edit"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                    >
                                    <a class="dropdown-item" href="/admin/categories/{{$c->id}}/delete"
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
