<?php

namespace App\Http\Livewire;
use App\Models\Customer;
use App\Models\Item;

use Livewire\Component;
use DB;
class DisplayInvoice extends Component
// {
//     public function render()
//     {
//         return view('livewire.display-invoice');
//     }
// }


{
    public $cust;
    public $custid;

    public function updatedCustid(){
        $this->cust = Item::find($this->custid);
              //  $items = DB::select('select * from items');

    }
    public function render()
    {
        return view('livewire.display-invoice',[
            'items' => Item::select('id','item_name')->get()
        ]);
    }
}
