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
    $query = Payment::query();
    if($this->search){
        $query->where('expense_ids', 'like', '%' . $this->search . '%');
    }
    return view('livewire.search-payments-made', [
        'payments' => $query->orderBy('payment_date', 'DESC')->paginate(10),
    ]);
}
}
