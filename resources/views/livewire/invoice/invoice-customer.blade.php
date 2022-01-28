<address>
    <select class="form-select" name="customer_id" wire:click="get_customer($event.target.value)">
        <option value="">Select Customer</option>
        @foreach($customers as $cust)
        <option value="{{$cust->id}}">{{$cust->name}}</option>
        @endforeach
    </select><br>
    <div>
        <h5>Customer Details</h5>
    <input class="form-control" type="text" value="{{$customer->name ?? ''}} "
    placeholder="Company Detail" name="company_details" readonly>
    <br>
    <input class="form-control" type="text" value="{{$customer->address ?? ''}}"
        placeholder="Company Address" name="company_address" readonly><br>
    <input class="form-control" type="text" value="{{$customer->gst ?? ''}}" name="gst_no"
        placeholder="Company GST" readonly><br>
    </div>
</address>

