<?php

namespace App\Http\Livewire;
use App\Models\Payment;

use Livewire\Component;
use Livewire\WithPagination;

class SearchPaymentsMade extends Component
{

    use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public $search;

    public function updatingSearch()
    {
      $this->resetPage();
   }

    public function render()
    
{
    $query = Payment::with(['vendor','customer','final_beneficiary']);
    if($this->search){
        $query->where('expense_ids', 'like', '%' . $this->search . '%');
        
        $query->orWhereHas('vendor', function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        });

        $query->orWhereHas('customer', function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        });

        $query->orWhereHas('final_beneficiary', function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        });
    }
    return view('livewire.search-payments-made', [
        'payments' => $query->orderBy('payment_date', 'DESC')->paginate(10),
    ]);
}
}
