<div>
    <input wire:model="search" required type="text" name="search" id="" list="mylist" placeholder="Aramak "
    style="float: left;color: black;margin-right: 5px;"
    >
    @if($query)
        <datalist id="mylist" >
            @foreach($datalist as $rs)
                <option value="{{ $rs->title }}">{{ $rs->category->title }}</option>
            @endforeach
        </datalist>
    @endif


</div>