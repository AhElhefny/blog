@props(['name','type'=>'text'])
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           for="{{$name}}">
        {{$name}}
    </label>
    <input class=" p-2 w-full text-sm rounded-xl focus:outline-none focus:ring"
           type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
           value="{{old($name)}}"
           style="border: lightskyblue solid 1px"
           required
    >
    @error($name)
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
</div>

