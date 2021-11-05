<div>
    <div>
        <input class="form-control" wire:model="search" type="search" placeholder="Search posts by Name...">
        <h1>Search Results:</h1>
    </div>
    <div class="table100 ver1">
        <table class="table table-bordered table-striped table-condensed table-responsive-sm" wire:loading.class="loading" wire:target="search">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($vendors as $key=>$vendor)
            <tr>
                <td>{{$key +1 }}</td>
                <td>{{ $vendor->name }}</td>
                <td>{{ $vendor->detail }}</td>
                <td>
                    <form class="delForm" action="{{ route('vendors.destroy',$vendor->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('vendors.show',$vendor->id) }}">Show</a>
                        @can('vendor-edit')
                        <a class="btn btn-primary" href="{{ route('vendors.edit',$vendor->id) }}">Edit</a>
                        @endcan
    
    
                        @csrf
                        @method('DELETE')
                        @can('vendor-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="mt-4">
        {{$vendors->links()}}
    </div>
</div>
