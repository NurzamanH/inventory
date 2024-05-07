<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class ListData extends Component
{
    public $search;

    use WithPagination;
    public function render()
    {
        $data = Customer::when($this->search, function($query){
                            $query->where('name', 'LIKE', '%'.$this->search.'%');
                            $query->orWhere('phone', 'LIKE', '%'.$this->search.'%');
                            $query->orWhere('address', 'LIKE', '%'.$this->search.'%');
                        })
                        ->paginate(10);

        return view('livewire.customers.list-data',[
            'data' => $data
        ]);
    }
    public function delete($id)
    {
        if($id){
            Customer::where('id',$id)->delete();
            session()->flash('message', 'Pelanggan Deleted Successfully.');
        }
    }

}
