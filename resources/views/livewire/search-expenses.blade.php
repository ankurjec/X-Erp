<div>
    <div>
        <input class="form-control" wire:model="search" type="search" placeholder="Search posts by Name...">

        <h1>Search Results:</h1>


    </div>
    <div class="table100 ver1">
        <table class="table table-bordered table-striped table-condensed table-responsive-sm">
            <tr>
                <th>Id #</th>
                <th>Type</th>
                <th>Payee</th>
                <th>Amount (Rs.)</th>
                <th>Paid/Unpaid</th>
                <th>Order</th>
                <th>Date</th>
                <th>Details</th>
                <!--<th>Total Paid (Rs.) <i class="fas fa-info-circle" title="This may include multiple expenses"></i></th>-->
                <th width="280px">Action</th>
            </tr>
            @forelse ($expenses as $key=>$expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->type_string }}</td>
                <td>
                    @if($expense->type == 'general_expense')
                    {{ $expense->user ? $expense->user->name : '' }}
                    @elseif($expense->type == 'vendor_payment')
                    {{ $expense->vendor ? $expense->vendor->name : '' }}
                    @elseif($expense->type == 'refunds')
                    {{ $expense->customer ? $expense->customer->name : '' }}
                    @endif
                   </td>
                <td>{{ moneyFormatIndia($expense->amount) }}</td>
                <td>{!! $expense->paid_flag ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-secondary">Unpaid</span>'!!}</td>
                <td>
                    @if($expense->order)
                    #{{ $expense->order->id }}-{{ substr($expense->order->name,0,20) }}
                    @endif
               </td>
               <td>
                   {{ $expense->created_at->format('d M Y') }}
               </td>
               <td>{{ $expense->details }}</td>
                <td>
                    <form class="delForm" action="{{ route('expenses.destroy',$expense->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('expenses.show',$expense->id) }}">Show</a>
                        @can('expense-edit')
                        <a class="btn btn-primary" href="{{ route('expenses.edit',$expense->id) }}">Edit</a>
                        @endcan
                        
                        @if(!$expense->paid_flag)
                        <a class="btn btn-success" href="payments/create?expense_id={{$expense->id}}" title="Add Payment Made">Add Payment</a>
                        @endif
                        
                        @csrf
                        @method('DELETE')
                        @can('expense-delete')
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
            {{$expenses->links()}}
        </div>
    </div></div>
