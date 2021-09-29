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
    <h1>Company Details</h1>
    <address contenteditable>
      <p>Jonathan Neal</p>
      <p>101 E. Chapman Ave<br>Orange, CA 92866</p>
      <p>(800) 555-1234</p>
    </address>
    <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
  </header>
  <article>
    <h1>Recipient</h1>
    <form name="invoiceForm" method="POST" action="{{route('invoice.store')}}">

      @csrf
      <address contenteditable>
        <input type="text" name="company_name" placeholder="Company Name" value="{{ $invoice->company->company_name }}" readonly><br>
        <input type="text" name="company_details" placeholder="Company Details" value="{{ $invoice->company->company_details }}" readonly><br>
        <input type="text" name="company_address" placeholder="Company Address" value="{{ $invoice->company->company_address }}" readonly><br>
        <input type="text" name="gst_no" placeholder="Company GST" value="{{ $invoice->company->gst_no }}" readonly><br>
      </address>

      <table class="meta">
        <tr>
          <th><span contenteditable>Invoice #</span></th>
          <td><input name="invoice_no" value="{{ $invoice->invoice_no }}" type="text" readonly></td>
        </tr>
        <tr>
          <th><span contenteditable>Date</span></th>
          <td><input name="invoice_date" value="{{ $invoice->invoice_date }}" type="text" readonly></td>
        </tr>
        <tr>
          <th><span contenteditable>Invoice Terms</span></th>
          <td><input name="invoice_terms" value="{{ $invoice->invoice_terms }}" type="text" readonly></td>
        </tr>

      </table>
      <table class="inventory">
        <thead>
          <tr>
            <th><span contenteditable>Item Name</span></th>
            <th><span contenteditable>Description</span></th>
            <th><span contenteditable>Rate</span></th>
            <th><span contenteditable>Quantity</span></th>
            <th><span contenteditable>Price</span></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($invoice->items as $item)
          <tr>
            <td><a class="cut">-</a><input type="text" name="item_name[]" value="{{ $item->item_name}}"></td>
            <td><input type="text" name="item_description[]" value="{{ $item->description}}"></td>
            <td><span data-prefix></span><input type="text" name="item_rate[]" value="{{ $item->rate}}"></td>
            <td><input type="text" name="item_quantity[]" value="{{ $item->quantity}}"></td>
            <td><span data-prefix>$</span><span>600.00</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a class="add">+</a>
      <table class="balance">
        <tr>
          <th><span contenteditable>Total</span></th>
          <td><span data-prefix>$</span><span>600.00</span></td>
        </tr>
        <tr>
          <th><span contenteditable>Amount Paid</span></th>
          <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
        </tr>
        <tr>
          <th><span contenteditable>Balance Due</span></th>
          <td><span data-prefix>$</span><span>600.00</span></td>
        </tr>

      </table>

  </article>
  <aside>
    <h1><span contenteditable>Additional Notes</span></h1>
    <div contenteditable>
      <p><textarea name="invoice_terms"></textarea></p>
    </div>
  </aside>
  <button type="submit" value="">Create</button>
  </form>
  @auth
  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
  </form>
  @endauth
@endsection