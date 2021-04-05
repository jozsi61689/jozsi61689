@extends('layouts.default')
@section('content')
<h3 style="text-align: center">Feladatok beállítása</h3><br>
    <form name="ticket-form" class="form-horizontal" role="form" method="POST" action="{{ url('/setTimer') }}">
        {{ csrf_field() }}
        <div class="form-group" >  
            <label class="col-md-3 control-label" for="partner_ID" >Ügyfél: </label>
            <div class="col-md-4 ">
                <select class="form-control" name="partner_ID" id="partner_ID">
@foreach($partners as $partner) 
                    <option value="{{ $partner->partner_ID }}" >{{ $partner->partner_name }}</option>
@endforeach
                </select>
            </div>          
        </div>
        <div class="form-group" >            
            <label for="topic" class="col-md-3 control-label" >Tevékenységi kör: </label>
            <div class="col-md-4 ">
                <select class="form-control" name="topic" id="topic">
                    <option value="IT-szerviz" selected>IT-szerviz</option>
                    <option value="Printer-szerviz" >Printer-szerviz</option>
                </select>
            </div>         
        </div>
        
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-3 control-label">Feladat megnevezése:</label>
    
            <div class="col-md-8">
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
    
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
            
        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="col-md-3 control-label">Feladat leírása:</label>
    
            <div class="col-md-8">
                <textarea id="content" class="form-control" name="content" rows="5">{{ old('content') }}</textarea>
    
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
        </div>
                        
        <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
            <label for="start_time" class="col-md-3 control-label">Indítás időpontja:</label>
    
                <div class="col-md-2 input-group" style="margin-left: 15px">
                    <input name="start_time" style="margin-left: 15px"  type="date" class="form-control" value="{{ old('start_time') }}" required>
                </div>
        </div>

        <div class="form-group">
            <label for="dead" class="col-md-3 control-label">Ismétlődés:</label>    
        </div>
                
        <div class="centre-2 input-group">                
            <input style="width:20%;" class="col-md-6 form-control " type="radio" name="repeat_cycle" value='days' checked/>
            <input style="width:30%" class="form-control " placeholder=""  name="days" type="text"  value='1'/>
            <label for="dead" style="width:40%" class="control-label">naponta</label>    
        </div>
        <div class="centre-2 input-group">                
            <input style="width:20%;" class="col-md-6 form-control " type="radio" name="repeat_cycle" value='weeks'/>
            <input style="width:30%" class="form-control " placeholder=""  name="weeks" type="text"  value='1'/>
            <label for="dead" style="width:38%" class="control-label">hetente</label>    
        </div>
        <div class="centre-2 input-group">                
            <input style="width:20%;" class="col-md-6 form-control " type="radio" name="repeat_cycle" value='months'/>
            <input style="width:30%" class="form-control " placeholder=""  name="months" type="text" value='1'/>
            <label for="dead" style="width:40%" class="control-label">havonta</label>    
        </div>
    
        <div class="centre">
                <button type="submit" class="btn btn-warning">Rögzít</button>
        </div>
    </form>

@stop