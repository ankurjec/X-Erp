<div>

    <div>
        <input class="form-control" wire:model="search" type="search" placeholder="Search Payments">
    </div>
    <div class="table100 ver1">
        <table class="table table-bordered table-striped table-condensed table-responsive-sm" wire:loading.class="loading" wire:target="search">
            <tr>
                <th>No</th>
                <th>Expense Ids</th>
                <th>Amount (Rs.)</th>
                <th>Payment Date</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($payments as $key=>$payment)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ json_encode($payment->expense_ids,true) }}</td>
                <td>{{ moneyFormatIndia($payment->amount) }}</td>
                <td>{{ $payment->payment_date->format('d M Y') }}</td>
                <td>
                    <form class="delForm" action="{{ route('payments.destroy',$payment->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('payments.show',$payment->id) }}">Show</a>
                        @can('payment-edit')
                        <a class="btn btn-primary" href="{{ route('payments.edit',$payment->id) }}">Edit</a>
                        @endcan
    
    
                        @csrf
                        @method('DELETE')
                        @can('payment-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    
        <div class="mt-4">
            {{$payments->links()}}
        </div></div>
