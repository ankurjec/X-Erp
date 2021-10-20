<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use Livewire\Component;
use Livewire\WithPagination;

class SearchExpenses extends Component
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
        $query = Expense::query();
        if ($this->search) {
            $query->whereHas('user', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
            $query->orWhereHas('vendor', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
            $query->orWhereHas('customer', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $query->with(['user', 'vendor', 'order']);
        return view('livewire.search-expenses', [
            'expenses' => $query->latest()->paginate(10)
        ]);
    }
}
