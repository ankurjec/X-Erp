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
        <header >
            <h1 style="height:100px;">Invoice Details</h1>
            <address contenteditable>
                <p>Jonathan Neal</p>
                <p>101 E. Chapman Ave<br>Orange, CA 92866</p>
                <p>(800) 555-1234</p>
            </address>
            <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
        </header>
        <div id="content">
            <article>
                <h1>Recipient</h1>
                <form name="invoiceForm" method="POST" action="{{route('invoice.store')}}">
        
                    @csrf
                    <address contenteditable>
                        {{-- <select class="form-select" wire:model="custid" name="customer_id">
                            <option value="">Select Customer</option>
                            @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select><br><br> --}}
                        <div>
                                            <h5>Customer Details</h5>
                            <p>
                                <div wire:loading wire:target="custid" class="spinner-border text-primary spinner-border-sm"
                                    role="status">
        
                                </div>
                                <input class="form-control" type="text" value=""
                                    placeholder="{{$item->item_name}}"><br>
                            </p>
                        </div>
        
                        <!--<input class="form-control" type="text" name="company_details" placeholder="Company Details">--><br>
                        <input class="form-control" type="text" value=""
                            placeholder="{{$item->description}}"><br>
                        <input class="form-control" type="text" value="" name="gst_no"
                            placeholder="{{$item->rate}}">
                            <input class="form-control" type="text" value="" name="gst_no"
                            placeholder="{{$item->quantity}}">
                            <br>
                    </address>
        
                    <table class="meta">
                        <tr>
                            <th>Invoice No.</th>
                            <td><input class="form-control xs-1" name="invoice_no" type="text"></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input name="invoice_date" type="date"></td>
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
                                <td><a class="cut">-</a><input type="text" name="item_name[]"></td>
                                <td><input type="text" name="item_description[]"></td>
                                <td><input type="text" name="item_rate[]"></td>
                                <td><input type="text" name="item_quantity[]"></td>
                                <td>600.00</td>
                            </tr>
                            <tr>
                                <td><a class="cut">-</a><input type="text" name="item_name[]"></td>
                                <td><input type="text" name="item_description[]"></td>
                                <td><input type="text" name="item_rate[]"></td>
                                <td><input type="text" name="item_quantity[]"></td>
                                <td>600.00</td>
                            </tr>
                            <tr>
                                <td><a class="cut">-</a><input type="text" name="item_name[]"></td>
                                <td><input type="text" name="item_description[]"></td>
                                <td><input type="text" name="item_rate[]"></td>
                                <td><input type="text" name="item_quantity[]"></td>
                                <td>
                                    <span>600.00</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="badge bg-warning text-dark add-row">+</a>
                    <table class="balance">
                        <tr>
                            <th>Total</th>
                            <td>600.00</td>
                        </tr>
                        <tr>
                            <th>Amount Paid</th>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th>Balance Due</th>
                            <td>600.00</td>
                        </tr>
        
                    </table>
                    <button type="submit" class="badge bg-info text-dark" type="submit">Save</button>
        
                    <aside>
                        <h1>Additional Notes</h1>
                        <div contenteditable>
                            <p><textarea name="invoice_terms"></textarea></p>
                        </div>
                    </aside>
        
        </div>
        <!-- Script to add table row -->
        <script>
            let lineNo = 1;
            $(document).ready(function() {
                $(".add-row").click(function() {
                    markup = `<tr>
                    <td><a class="cut">-</a><input type="text" name="item_name[]"></td>
                    <td><input type="text" name="item_description[]"></td>
                    <td><input type="text" name="item_rate[]"></td>
                    <td><input type="text" name="item_quantity[]"></td>
                    <td>
                        <span>600.00</span>
                    </td>
                </tr>`;


                    tableBody = $("#items tbody");
                    tableBody.append(markup);
                    lineNo++;
                });
            });
        </script>

        <button type="submit" id="saveInvoice">Create</button>
        </form>
        <button id="cmd">Generate PDF</button>
        <div id="editor"></div>

        @endsection

        @section('js')

        <script>
              var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 25, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });

    // This code is collected but useful, click below to jsfiddle link.
</script>
@endsection
