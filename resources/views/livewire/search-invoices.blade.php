<div>
    <div>
        <input class="form-control" wire:model="search" type="search"
            placeholder="Search invoices by Customer Name...">

        <h1>Invoice Results:</h1>

    </div>
    <div class="table100 ver1">
        <table class="table table-bordered table-condensed table-responsive-sm" wire:loading.class='loading'
            wire:target='search'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Customer Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->customer->name }}</td>
                        <td colspan="2"><button
                                onclick="location.href='{{ route('invoices', ['id' => $invoice->id]) }}'"
                                type="button" class="btn btn-info">view</button>&nbsp;&nbsp;<button type="button"
                                class="btn btn-primary">Edit</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $invoices->links() }}
    </div>
</div>
