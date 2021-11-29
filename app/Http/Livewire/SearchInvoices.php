<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Invoice;

class SearchInvoices extends Component
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
        $query = Invoice::query();
        if($this->search){
            $query->whereHas('customer', function ($query){
                $query->where('name', 'like', '%'.$this->search.'%');
            });
        }
        return view('livewire.search-invoices', [
            'invoices' => $query->latest()->paginate(10),
        ]);
    }
}
