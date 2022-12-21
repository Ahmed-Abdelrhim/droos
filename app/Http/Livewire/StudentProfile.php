<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone_number;
    public $password;
    public $password_confirmation;
    public $avatar;



    public function rules():array
    {
        // .auth()->user()->id
        // .auth()->user()->id
        // |unique:users,phone_number,
        return [
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users,phone_number,'.auth()->user()->id,
            'phone_number' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone_number,'.auth()->user()->id,
            'password' => 'nullable|string|min:6',
            'password_confirmation' => 'nullable|string|min:6|same:password',
            'avatar' => 'nullable|image|max:3024', // 3MB Max
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
        'password_confirmation.required' => 'تأكيد الباسورد  يجب ادخاله',
        'password_confirmation.min' => 'تأكيد الباسورد يجب أن يكون من 6 حروف أو أكثر',
        'password_confirmation.same' => 'تأكيد الباسورد يجب أن يكون من 6 حروف أو أكثر',
    ];

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone_number = auth()->user()->phone_number;
    }

    public function render()
    {
        return view('livewire.student-profile');
    }

    public function submit()
    {
        $this->validate();
        $user = auth()->user();
        $image_name = null;
        if ($user->avatar != null)
            $image_name = $user->avatar;
        if ($this->avatar != null) {
            $image_name = Str::random(4) . time() . '.' . $this->avatar->guessExtension();
            $this->avatar->storeAs('images/studentImages',$image_name,'public');
        }
        try {
            DB::beginTransaction();
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'password' => bcrypt($this->password),
                'avatar' => $image_name,
            ]);
        } catch (\Exception $e) {
            session()->flash('error' ,'something went wrong');
            DB::rollBack();
        }
        DB::commit();
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->avatar = '';
        session()->flash('success','profile updated successfully');
    }
}



