<x-mail::message>

<x-mail::panel>
    <h1 style="color:red">Welcome to the app </h1>
    <p style="color:blue">
        I hope this application is useful to you and your family. Enjoy !!
    </p>
</x-mail::panel>
{{-- color for button can be 'success','primary', and 'error' --}}
<x-mail::button url="https://google.com" color="success"> Go to Google </x-mail::button>
<x-mail::button url="https://x.com" color="primary"> Go to X </x-mail::button>
<x-mail::button url="https://youtube.com" color="error"> Go to Youtube </x-mail::button>

<x-mail::table>
| Item              | In Stock | Price |
| :---------------- | :------: | ----: |
| Python Hat        |   True   | 23.99 |
| SQL Hat           |   True   | 23.99 |
| Codecademy Tee    |  False   | 19.99 |
| Codecademy Hoodie |  False   | 42.99 |    
</x-mail::table>    


</x-mail::message>