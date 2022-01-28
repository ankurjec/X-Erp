<?php

namespace App\Http\Livewire;

use App\Models\DebitNote;
use Livewire\Component;
use Livewire\WithPagination;

class SearchDebitNotes extends Component
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
        $query = DebitNote::with(['loan','order']);
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
        return view('livewire.search-debit-notes', [
            'debit_notes' => $query
                    //->orderBy('paid_flag', 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10)
        ]);
    }
}
