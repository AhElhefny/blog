<x-admin.layout>
    <div class="postesWrapper mt-3">
        <div class="container">
            <table class="table table-bordered" id="posts-table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Body</th>
                    <th>Status</th>
                    <th>action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('#posts-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('postTable') !!}',
                    columns: [
                        { data: 'title', name: 'title' },
                        { data: 'excerpt', name: 'excerpt' },
                        { data: 'body', name: 'body' },
                        { data: 'status', name: 'status' },
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
            });
        </script>
    @endpush
</x-admin.layout>


