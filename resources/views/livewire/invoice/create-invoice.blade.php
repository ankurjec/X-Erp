<div>
    <article>
        <h1>Recipient</h1>
        <form name="invoiceForm" method="POST" action="{{route('invoice.store')}}">

            @csrf
            <address contenteditable>
                <select class="form-select" wire:model="custid" name="customer_id">
                    <option value="">Select Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select><br><br>
                <div>
                    <h5>Customer Details</h5>
                    <p>
                        <div wire:loading wire:target="custid" class="spinner-border text-primary spinner-border-sm"
                            role="status">

                        </div>
                        <input class="form-control" type="text" value="{{$cust ? $cust->detail: ''}}"
                            placeholder="Company Detail" name="company_details"><br>
                    </p>
                </div>
                <input class="form-control" type="text" value="{{$customer->name}} "
                placeholder="Company Detail" name="company_details"><br>

                <!--<input class="form-control" type="text" name="company_details" placeholder="Company Details">--><br>
                <input class="form-control" type="text" value="{{$cust ? $cust->address: ''}}"
                    placeholder="Company Address" name="company_address"><br>
                <input class="form-control" type="text" value="{{$cust ? $cust->gst: ''}}" name="gst_no"
                    placeholder="Company GST"><br>
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