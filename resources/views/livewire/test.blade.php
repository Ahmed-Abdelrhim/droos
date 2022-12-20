


<section class="form-container">
    <div class="register">
        <p>الأيميل <span>*</span></p>
        <input placeholder="ادخل الأيميل" maxlength="50" class="box"
               wire:model="name">
        @error('name')
        <span class="text-danger" style="color: white">{{$message}}</span>
        @enderror
        <button wire:click="submit" class="btn btn-primary">submit</button>

    </div>

</section>
