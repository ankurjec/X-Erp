<?php

namespace App\Http\Livewire;

use App\Models\CreditNote;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCreditNotes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $order_id;

    protected $queryString = ['order_id'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()

    {
        $query = CreditNote::with(['loan','order']);
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
            $query->orWhere('amount',$this->search);
        }

        if ($this->order_id) {
            $query->where('order_id', $this->order_id);
        }

        $query->with(['user', 'vendor', 'order']);
        return view('livewire.search-credit-notes', [
            'credit_notes' => $query
                    //->orderBy('paid_flag', 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10)
        ]);
    }
}
