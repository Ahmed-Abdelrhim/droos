<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $phone;
    public $academic_year;
    public $password;
    public $password_confirmation;
    public $photo;


    protected function rules(): array
    {
        return [
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone_number',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|same:password',
            'academic_year' => 'required|between:1,3',
            'photo' => 'nullable|image|max:3024', // 3MB Max
        ];
    }

    protected $messages = [
        'name.required' => 'الأسم يجب ادخاله',
        'name.string' => 'الأسم يجب أن يكون من حروف',
        'name.min' => 'الأسم يجب أن يكون 4 حروف أو أكثر',
        'phone.required' => 'رقم الهاتف يجب ادخاله',
        'phone.unique' => 'رقم الهاتف موجود لطالب اخر',
        'email.required' => 'هذا الايميل يجب ادخاله',
        'email.email' => 'يجب ان تكتب ايميل صالح',
        'email.unique' => 'الايميل موجود لطالب اخر',
        'password.required' => 'الباسورد  يجب ادخاله',
        'password.min' => 'الباسورد يجب أن يكون من 6 حروف أو أكثر',
        'academic_year.required' => 'يجب أختيار السنة الدراسية',
        'password_confirmation.required' => 'تأكيد الباسورد  يجب ادخاله',
        'password_confirmation.min' => 'تأكيد الباسورد يجب أن يكون من 6 حروف أو أكثر',
        'password_confirmation.same' => 'تأكيد الباسورد يجب أن يكون من 6 حروف أو أكثر',
    ];



    public function render()
    {
        return view('livewire.register');
    }

    public function submit()
    {
        $this->validate();
        $image_name = null;
        if ($this->photo != null ) {
            $image_name = Str::random(4) . time() . $this->photo->guessExtension();
            $this->photo->storeAs('images/studentImages' , $image_name ,'public');
        }
        // dd($this->name, $this->email,$this->phone,$this->password,$this->academic_year);
        User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'academic_year' => $this->academic_year,
            'password' => bcrypt($this->password),
            'mac_address' => 0,
            'avatar' => $image_name,
        ]);
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->academic_year = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->photo = '';
        return redirect()->route('login');
        // dd($this->name, $this->email,$this->phone,$this->password,$this->academic_year);
    }
}
