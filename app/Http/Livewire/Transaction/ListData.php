<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class ListData extends Component
{
    public $search;
    use WithPagination;
    public function render()
    {
        $data = Transaction::when($this->search, function($query){
                                $query->where('name', 'LIKE', '%'.$this->search.'%');
                                $query->orWhere('phone', 'LIKE', '%'.$this->search.'%');
                            })
                            ->paginate(10);

        return view('livewire.transaction.list-data',[
            'data' => $data
        ]);
    }
}
