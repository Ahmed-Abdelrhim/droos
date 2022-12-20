<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $phone;
    public $academic_year;
    public $password;
    public $password_confirmation;

    protected function rules(): array
    {
        return [
            'name' => 'required|string|min:4',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|string|min:6',
             'password_confirmation' => 'required|string|min:6|same:password',
            'academic_year' => 'required|between:1,3',
        ];
    }


    public function render()
    {
        return view('livewire.register');
    }

    public function submit()
    {
        $this->validate();

        dd($this->name, $this->email,$this->phone,$this->password,$this->academic_year);
    }
}
