<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use Livewire\Component;
use Livewire\WithPagination;

class Inventories extends Component
{
    public $products, $name, $email, $user_id, $search;
    public $updateMode = false;

    use WithPagination;
    public function render()
    {
        $data = Inventory::when($this->search, function($query){
                            $query->where('name', 'LIKE', '%'.$this->search.'%');
                        })
                        ->paginate(5);
        return view('livewire.inventories',[
            'data' => $data
        ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Inventory::create($validatedDate);

        session()->flash('message', 'Products Created Successfully.');

        $this->resetInputFields();

        $this->emit('productStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = Inventory::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = Inventory::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Products Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Inventory::where('id',$id)->delete();
            session()->flash('message', 'Products Deleted Successfully.');
        }
    }
}
