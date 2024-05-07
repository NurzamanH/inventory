<?php

namespace App\Http\Livewire\Users;

use App\Models\Customer;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListData extends Component
{
    public $search;

    use WithPagination;
    public function render()
    {
        $data = User::when($this->search, function($query){
                            $query->where('name', 'LIKE', '%'.$this->search.'%');
                            $query->orWhere('type', 'LIKE', '%'.$this->search.'%');
                        })
                        ->paginate(10);

        return view('livewire.users.list-data',[
            'data' => $data
        ]);
    }
}
