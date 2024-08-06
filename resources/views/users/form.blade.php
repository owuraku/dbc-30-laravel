<form class="container-sm" action="{{$action}}" method="POST">
    <x-textfield name="fullname" label="User Name" type="text" :value="$user->fullname" placeholder="Enter a user name" />
    <x-textfield name="email" label="User Email" type="email" :value="$user->email" placeholder="Enter a user email" />
    @isset($edit)
        @method('PATCH')
    @endisset

    @unless(isset($edit))
    <x-textfield name="password" label="User Password" type="password" placeholder="Enter a user password" />
    <x-textfield name="password_confirmation" label="Confirm Password" type="password" placeholder="Confirm password" />
    @endunless

    @php
        $roles = [
            [
                'value'=>'super_admin',
                'label' => 'Super Administrator'
            ],
            [
                 'value'=>'admin',
                'label' => 'Administrator'
            ] 
        ];
    @endphp
    <x-select-field :options="$roles" name="role" label="Select Role" :value="$user->role"  />
    @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
