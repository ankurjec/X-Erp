<div>

    <div>
        <input class="form-control" wire:model="search" type="search" placeholder="Search posts by Receiver...">
        <h1>Search Results:</h1>
    </div>
    <div class="table100 ver1">
        <table class="table table-bordered table-striped table-condensed table-responsive-sm" wire:loading.class="loading" wire:target="search">
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Name</th>
                <th>Amount (Rs.)</th>
                <th>Order</th>
                <th>Invoice No</th>
                <th>Full / Partial / Advance</th>
                <th width="280px">Action</th>
            </tr>
            @forelse ($payments_received as $key=>$payment_received)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $payment_received->received_date ? $payment_received->received_date->format('d M Y') : '' }}</td>
                <td>{{ $payment_received->customer ? $payment_received->customer->name : 'Not Available' }}</td>
                <td>{{ moneyFormatIndia($payment_received->amount) }}</td>
                <td>
                    @if($payment_received->order)
                    #{{ $payment_received->order->id }}-{{ substr($payment_received->order->name,0,20) }}
                    @endif
               </td>
               <td>{{ $payment_received->invoice_no }}</td>
               <td>
                    @if($payment_received->full_partial_advance == 'advance')
                        <span class="badge badge-info">Advance</span>
                    @elseif($payment_received->full_partial_advance == 'partial')
                        <span class="badge badge-info">Partial</span>
                    @elseif($payment_received->full_partial_advance == 'full')
                        <span class="badge badge-success">Full Paid</span>
                   @else
                       <span class="badge badge-secondary">N/A</span>
                    @endif
               </td>
                <td>
                    <form class="delForm" action="{{ route('payments_received.destroy',$payment_received->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('payments_received.show',$payment_received->id) }}">Show</a>
                        @can('payments-received-edit')
                        <a class="btn btn-primary" href="{{ route('payments_received.edit',$payment_received->id) }}">Edit</a>
                        @endcan
    
    
                        @csrf
                        @method('DELETE')
                        @can('payments-received-delete')
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
        </div>
        <div class="mt-4">
            {{$payments_received->links()}}
        </div>
       </div>
