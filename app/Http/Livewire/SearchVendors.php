<?php

namespace App\Http\Livewire;

use App\Models\Vendor;

use Livewire\Component;
use Livewire\WithPagination;
class SearchVendors extends Component
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
          $query = Vendor::query();
          if($this->search){
              $query->where('name', 'like', '%' . $this->search . '%');
          }
          return view('livewire.search-vendors', [
              'vendors' => $query->paginate(10),
          ]);
      }
  }
  