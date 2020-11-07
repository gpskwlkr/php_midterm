@extends('base')
@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif

<form  method="post" enctype="multipart/form-data" action = "{{route("employees.update", $employee->id)}}">
    @csrf
    @method("PUT")
    <div class="box-body">
        <div class="form-group">
            <label for="name">Employee Name</label>
            <input type="text" class="form-control"  placeholder="Name" name="name" value="{{old('name', $employee->name)}}">
        </div>
        <div class="form-group">
            <label for="surname">Employee Surname</label>
            <input type="text" class="form-control"  placeholder="Surname" name="surname" value="{{old('surname', $employee->surname)}}">
        </div>
        <div class="form-group">
            <label for="position">Employee Position</label>
            <input type="text" class="form-control"  placeholder="position" name="position" value="{{old('position', $employee->position)}}">
        </div>
        <div class="form-group">
            <label for="phone">Employee Phone</label>
            <input type="text" class="form-control"  placeholder="phone" name="phone" value="{{old('phone', $employee->phone)}}">
        </div>
        <div class="form-group">
            <label for="is_hired">Employee Status</label>
            <select name="is_hired" id="" class="form-control">
                <option value="1">Hired</option>
                <option value="2">Not hired</option>
            </select>
        </div>
    </div>
    <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
<form>
    <button formaction="{{ route('employees.index') }}" class="btn btn-primary">Go back</button>
</form>
</html>
