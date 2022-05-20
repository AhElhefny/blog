@props(['name'])
<div class="mt-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           for="{{$name}}">
        {{$name}}
    </label>
    <textarea name="{{$name}}" class="w-full text-sm rounded-xl  focus:outline-none focus:ring "
              style="border: lightskyblue solid 1px" rows="5"
              placeholder="Quick, thing of something to say!"
              required
            id="{{$name}}"
    ></textarea>
    @error($name)
    <span class="text-red-500">{{$message}}</span>
    @enderror
</div>

