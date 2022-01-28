@extends('layouts.invoice')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <header>
            <h1>Invoice Details</h1>
            <address contenteditable>
                <p>Jonathan Neal</p>
                <p>101 E. Chapman Ave<br>Orange, CA 92866</p>
                <p>(800) 555-1234</p>
            </address>
            <span><img alt="" src="/invoice/logo.png"><input type="file" accept="image/*"></span>
        </header>
        
        <article>
                <h1>Recipient</h1>
                <form name="invoiceForm" method="POST" action="{{route('invoices.store')}}">        
                    @csrf

                    @livewire('invoice.invoice-customer')
        
                    <table class="meta">
                        <tr>
                            <th>Invoice No.</th>
                            <td><input class="form-control xs-1" name="invoice_no" type="text"></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input class="form-control name="invoice_date" type="date"></td>
                        </tr>
                        <tr>
                            <th>Amount Due</th>
                            <td><input name="due_amount" class="form-control mb-2" type="number"></td>
                        </tr>        
                    </table>

                    <table class="table table-bordered inventory" id="items">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Description</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><button type="button" class="cut btn btn-secondary btn-sm">-</button><input type="text" name="item_name[]" class="form-control"></td>
                                <td><input type="text" name="item_description[]" class="form-control"></td>
                                <td><input type="text" name="item_rate[]" class="form-control"></td>
                                <td><input type="text" name="item_quantity[]" class="form-control"></td>
                                <td></td>
                            </tr>                            
                        </tbody>
                    </table>
                    <button type="button" class="badge bg-warning text-dark add-row">+</button>
                    <table class="balance">
                        <tr>
                            <th>Total</th>
                            <td></td>
                        </tr>
                        {{-- <tr>
                            <th>Amount Paid</th>
                            <td>0.00</td>
                        </tr> --}}
                        <tr>
                            <th>Balance Due</th>
                            <td></td>
                        </tr>
        
                    </table>
        
                    <div>
                        <h4>Additional Notes</h4>
                        <div contenteditable>
                            <p><textarea name="invoice_terms"></textarea></p>
                        </div>
                    </div>
        
        </article>
        <button type="submit" id="saveInvoice" class="btn btn-primary">Create</button>
        </form>

@endsection

@section('script')
        @parent
<!-- Script to add table row -->
<script>
    let lineNo = 1;
    $(document).ready(function() {
        $(".add-row").click(function() {
            markup = `<tr>
            <td><button type="button" class="cut btn btn-secondary btn-sm">-</button><input type="text" name="item_name[]" class="form-control"></td>
            <td><input type="text" name="item_description[]" class="form-control"></td>
            <td><input type="text" name="item_rate[]" class="form-control"></td>
            <td><input type="text" name="item_quantity[]" class="form-control"></td>
            <td>
                <span></span>
            </td>
        </tr>`;


            tableBody = $("#items tbody");
            tableBody.append(markup);
            lineNo++;
        });

        $("#saveInvoice").click(function() {
            $.ajax({
                url: "{{route('invoices.store')}}",
                method: "POST",
                data: $("#invoice-data").serialize(),
                dataType: "json",
                success: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>
@endsection