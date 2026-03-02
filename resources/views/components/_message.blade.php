@if(session('message'))

<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
    class="bg-green-200 text-green-800 p-2 rounded mb-2">
    <p>
        {{session('message')}}
    </p>
</div>

@endif
