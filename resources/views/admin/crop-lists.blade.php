@extends('layouts.adminpanel')
@section('content')


<div class="container" style="padding-left: 250px;
padding-top: 20px;">
    <h3>Crop Lists</h3>
    {!! Form::open(['action' => 'AdminController@storeCrop', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <input type="hidden" name="csrfmiddlewaretoken" value="5tnOuV4sJLpYrXUJBDNJ1yySmdZWs3CVs98OzkJ0UC1Pi31PYnTRED0uBHhjtns6">
    <input type="hidden" name="farm" value="2">
    <input type="hidden" name="form_type" value="insert">
    <div class="col-md-8 col-12">
        <div class="box box-white">
            <h5 class="box-header">Crop Name</h5>
            <div class="box-body">
                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group">
                            {{Form::text('crop_name', '', ['class' => 'form-control', 'placeholder' => 'Name of Crop'])}}


                                            <i class="fa fa-camera-retro fa-lg"></i>  {{Form::file('default_cropImage')}}

                        </div>
                        <div class="col-12 text-right">
                            {{form::submit('Add Crop', ['class' => 'btn btn-primary'])}}
                         

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">


      <div class="row">
        <div class="col-md-12">
            <table>
                <thead>
                    <tr>
                        <th>Crop Names</th>
                    </tr>
                </thead>
                <tbody class="col-md-12">
                        @foreach($crops as $crop)
                    <tr>
                        <td>
                            <span>{{$crop->crop_name}}</span><br>
                            <img class="col-12 mlr0 mt15" style="display:block; width:100%; height: 100px;" src="/storage/uploads/croplists/{{$crop->default_cropImage}}">
                        </td>

                        <td>
                            {!!Form::open(['action' => ['AdminController@destroy', $crop->id], 'method' =>'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            <button class='btn btn-danger' type='submit' value='submit'><i class="fa fa-trash" aria-hidden="true"></i>
                            {!!Form::close()!!}
                       </td>

                    </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>

</div>
@endsection
