<?php

namespace App\Http\Livewire\Attendances;

use App\Models\Attendance;
use Livewire\Component;
use Livewire\WithPagination;

class ListData extends Component
{
    public $search;
    use WithPagination;
    public function render()
    {
        $data = Attendance::when($this->search, function($query){
                                $query->where('name', 'LIKE', '%'.$this->search.'%');
                            })
                            ->paginate(10);
        return view('livewire.attendances.list-data',[
            'data' => $data
        ]);
    }
}
