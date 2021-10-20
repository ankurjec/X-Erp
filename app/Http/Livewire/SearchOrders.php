<?php

namespace App\Http\Livewire;
use App\Models\Order;

use Livewire\Component;
use Livewire\WithPagination;

class SearchOrders extends Component
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
        $query = Order::query();
        if($this->search){
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        return view('livewire.search-orders', [
            'orders' => $query->latest()->paginate(10),
        ]);
    }
}
