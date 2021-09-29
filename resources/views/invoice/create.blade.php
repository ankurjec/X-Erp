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
            <h1 style="height:100px;">Invoice Details</h1>
            <address contenteditable>
                <p>Jonathan Neal</p>
                <p>101 E. Chapman Ave<br>Orange, CA 92866</p>
                <p>(800) 555-1234</p>
            </address>
            <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
        </header>
        @livewire('invoice.create-invoice')

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

@endsection