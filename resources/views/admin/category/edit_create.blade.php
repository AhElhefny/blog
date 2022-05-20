<x-admin.layout>
    <div class="col-md-6" style="top: 200px; left: 257px; position: relative;">
        <div class="card mb-4">
            @if(str_contains(request()->url(),'edit'))
                <x-admin.categoryForm
                    :cat="$category->name"
                    head="Edit"
                    :uri="$category->id.'/update'"
                    method="PATCH" />
            @else
                <x-admin.categoryForm  />
            @endif

        </div>
    </div>
</x-admin.layout>
