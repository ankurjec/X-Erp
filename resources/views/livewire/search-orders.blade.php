<div>
    <div>
        <input class="form-control" wire:model="search" type="search" placeholder="Search Orders">

    </div>
        <div class="table100 ver1">
            <table class="table table-bordered table-condensed table-responsive-sm" wire:loading.class='loading' wire:target='search'>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Total Order Value (Rs.)</th>
                    <th>Total Received (Rs.)</th>
                    <th>Total Balance (Rs.)</th>
                    <th>Expenses (Rs.)</th>
                    <th>Profit/Loss (Rs.)</th>
                    <th width="280px">Action</th>
                </tr>
                @forelse ($orders as $key=>$order)
                <tr>
                    <td>{{$key + 1 }}</td>
                    <td>{{ $order->name }}</td>
                    <td>
                        @if($order->order_status == 'delivered')
                        <span class="badge badge-primary">{{ ucfirst($order->order_status) }}</span>
                        @elseif($order->order_status == 'completed')
                        <span class="badge badge-success">Completed with Payment</span>
                        @elseif($order->order_status == 'cancelled')
                        <span class="badge badge-danger">{{ ucfirst($order->order_status) }}</span>
                        @elseif($order->order_status == 'production_start')
                        <span class="badge badge-warning">{{ ucfirst($order->order_status) }}</span>
                        @elseif($order->order_status == 'sampling')
                        <span class="badge badge-dark">{{ ucfirst($order->order_status) }}</span>
                        @elseif($order->order_status == 'sent_quotation')
                        <span class="badge badge-light">{{ ucfirst($order->order_status) }}</span>
                        @else
                        <span class="badge badge-secondary">{{ ucfirst($order->order_status) }}</span>
                        @endif
                    </td>
                    <td>{{ moneyFormatIndia($order->total_order_value) }}</td>
                    <td>{{ moneyFormatIndia($order->total_received) }}</td>
                    <td>{{ moneyFormatIndia($order->total_remaining) }}</td>
                    <td>{{ moneyFormatIndia($order->total_expense) }}</td>
                    <td>{{ moneyFormatIndia($order->balance) }}</td>
                    <td>
                        <form class="delForm" action="{{ route('orders.destroy',$order->id) }}" method="POST">
                            <a class="btn btn-warning btn-sm" target="_blank" href="{{ route('expenses.index') }}?order_id={{ $order->id }}" title="View Order Expenses">Expenses</a>
                            <a class="btn btn-success btn-sm" target="_blank" href="{{ route('payments_received.index') }}?order_id={{ $order->id }}" title="View Payments Received of the Order">Payments Received</a>

                            <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Show</a>
                            @can('order-edit')
                            <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>
                            @endcan
        
        
                            @csrf
                            @method('DELETE')
                            @can('order-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center"><i>No Data Found!!</i></td></tr> 
            @endforelse            </table>
            </div>
        
            <div class="mt-4">
                {{$orders->links()}}
            </div>
    </div></div>
