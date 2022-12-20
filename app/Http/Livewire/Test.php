<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $name;
    protected function rules()
    {
        return [
            'name' => 'required|min:6',
        ];
    }

    public function submit()
    {
        return 'done';
        $this->validate();
    }
    public function render()
    {
        return view('livewire.test');
    }

}
