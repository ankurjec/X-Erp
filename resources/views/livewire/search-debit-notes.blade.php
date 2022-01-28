<div>
    <div>
        <input class="form-control" wire:model="search" type="search" placeholder="Search Debit Notes">
    </div>
    <div class="table100 ver1">
        <table class="table table-bordered table-striped table-condensed table-responsive-sm" wire:loading.class="loading" wire:target="search">
            <tr>
                <th>Id #</th>
                <th>Type</th>
                <th>Payee</th>
                <th>Amount (Rs.)</th>
                <th>Date</th>
                <th>Details</th>
                <!--<th>Total Paid (Rs.) <i class="fas fa-info-circle" title="This may include multiple expenses"></i></th>-->
                <th width="280px">Action</th>
            </tr>
            @forelse ($debit_notes as $key=>$debit_note)
            <tr>
                <td>{{ $debit_note->id }}</td>
                <td>{{ $debit_note->type_string }}</td>
                <td>
                    @if($debit_note->type == 'general_expense')
                    {{ $debit_note->user ? $debit_note->user->name : '' }}
                    @elseif($debit_note->type == 'vendor_payment')
                    {{ $debit_note->vendor ? $debit_note->vendor->name : '' }}
                    @elseif($debit_note->type == 'refunds')
                    {{ $debit_note->customer ? $debit_note->customer->name : '' }}
                    @endif
                   </td>
                
               <td>
                {{ moneyFormatIndia($debit_note->amount) }}</td>

                <td> {{ $debit_note->created_at->format('d M Y') }}
               </td>
            <td>{{ $debit_note->details }}</td>

                <td>
                    <form class="delForm" action="{{ route('debit_note.destroy',$debit_note->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('debit_note.show',$debit_note->id) }}">Show</a>
                        @can('expense-edit')
                        <a class="btn btn-primary" href="{{ route('debit_note.edit',$debit_note->id) }}">Edit</a>
                        @endcan
                        
                     
                        
                        @csrf
                        @method('DELETE')
                        @can('debit_note-delete')
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
            {{$debit_notes->links()}}
        </div>
    </div></div>
