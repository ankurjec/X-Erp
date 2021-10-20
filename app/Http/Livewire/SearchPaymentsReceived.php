<?php

namespace App\Http\Livewire;
use App\Models\PaymentsReceived;

use Livewire\Component;
use Livewire\WithPagination;

class SearchPaymentsReceived extends Component
{

  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public $search;

    public function updatingSearch()
    {
      $this->resetPage();
   }

    public function render()
    //{
        //return view('livewire.search-payments-received');
   // }
//}


{
    $query = PaymentsReceived::query();
//     if($this->search){
//         $query->where('from', 'like', '%' . $this->search . '%');
//     }
//     return view('livewire.search-payments-received', [
//         'payments_received' => $query->paginate(10),
//     ]);
// }
// }
if ($this->search) {
    $query->whereHas('customer', function ($q) {
        $q->where('name', 'like', '%' . $this->search . '%');
    });
    $query->orWhereHas('order', function ($q) {
        $q->where('name', 'like', '%' . $this->search . '%');
    });
    $query->orWhereHas('customer', function ($q) {
        $q->where('name', 'like', '%' . $this->search . '%');
    });
}

$query->with('customer', 'order');
return view('livewire.search-payments-received', [
    'payments_received' => $query->latest()->paginate(10),
]);
}
}

