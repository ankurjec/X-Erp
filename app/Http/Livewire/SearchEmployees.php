<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class SearchEmployees extends Component
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
        $query = Employee::query();
        if($this->search){
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        return view('livewire.search-employees', [
            'employees' => $query->latest()->paginate(10),
        ]);
    }
}
