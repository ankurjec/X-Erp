<div>
    <div>
        <input class="form-control" wire:model="search" type="search" placeholder="Search Customers">

    </div>
    <div class="table100 ver1">
        <table class="table table-bordered table-condensed table-responsive-sm" wire:loading.class='loading' wire:target='search'>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            
            @forelse  ($customers as $key=>$customer)
            <tr>
                <td>{{  $key+1 }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->detail }}</td>
                <td>
                    <form class="delForm" action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
                        @can('customer-edit')
                        <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('customer-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @empty
    <tr>
        <td colspan="8" class="text-center"><i>No Data Found!!</i></td></tr> 
@endforelse
        </table>
        <div class="mt-4">
            {{$customers->links()}}
        </div>
    </div>
</div>