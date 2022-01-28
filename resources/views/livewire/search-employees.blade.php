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
            
            @forelse  ($employees as $key=>$employee)
            <tr>
                <td>{{  $key+1 }}</td>
                <td>{{ $employee->employee_name }}</td>
                <td>{{ $employee->details }}</td>
                <td>
                    <form class="delForm" action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>
                        @can('employees-edit')
                        <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('employees-delete')
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
            {{$employees->links()}}
        </div>
    </div>
</div>