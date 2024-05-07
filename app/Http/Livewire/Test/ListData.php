<?php

namespace App\Http\Livewire\Test;

use App\Models\Test;
use Livewire\Component;
use Livewire\WithPagination;

class ListData extends Component
{
    use WithPagination;
    public function render()
    {
        $data = Test::paginate(10);
        
        return view('livewire.test.list-data',[
            'data' => $data
        ]);
    }
}
