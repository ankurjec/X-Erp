<div>
    <div>
        <input class="form-control" wire:model="search" type="search" placeholder="Search Credit Notes">
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
            @forelse ($credit_notes as $key=>$credit_note)
            <tr>
                <td>{{ $credit_note->id }}</td>
                <td>{{ $credit_note->type_string }}</td>
                <td>
                    @if($credit_note->type == 'general_expense')
                    {{ $credit_note->user ? $credit_note->user->name : '' }}
                    @elseif($credit_note->type == 'vendor_payment')
                    {{ $credit_note->vendor ? $credit_note->vendor->name : '' }}
                    @elseif($credit_note->type == 'refunds')
                    {{ $credit_note->customer ? $credit_note->customer->name : '' }}
                    @endif
                   </td>
                
               <td>
                {{ moneyFormatIndia($credit_note->amount) }}</td>

                <td> {{ $credit_note->created_at->format('d M Y') }}
               </td>
            <td>{{ $credit_note->details }}</td>

                <td>
                    <form class="delForm" action="{{ route('credit_note.destroy',$credit_note->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('credit_note.show',$credit_note->id) }}">Show</a>
                        @can('expense-edit')
                        <a class="btn btn-primary" href="{{ route('credit_note.edit',$credit_note->id) }}">Edit</a>
                        @endcan
                        
                     
                        
                        @csrf
                        @method('DELETE')
                        @can('credit_note-delete')
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
            {{$credit_notes->links()}}
        </div>
    </div></div>
