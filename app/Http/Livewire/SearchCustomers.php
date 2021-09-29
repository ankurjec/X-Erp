<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCustomers extends Component
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
        $query = Customer::query();
        if($this->search){
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        return view('livewire.search-customers', [
            'customers' => $query->paginate(10),
        ]);
    }
}
