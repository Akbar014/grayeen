@extends('admin.master')
@section('title') Slider Add @endsection
@section('slider') active @endsection


@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
        <span class="breadcrumb-item active">Slider</span>
    </nav>


    <div class="row">
        <div class=" sl-pagebody col-md-12">
            <a href="{{route('sliders.create')}}" class="btn btn-info">Add a new slide </a>
            <div class="card pd-20 pd-sm-40 mt-2">
                @if(Session::get('message'))
                <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col"> Position</th>
                                <th scope="col">Status</th>
                                <th scope="col">Image </th>
                                <th scope="col">Description </th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($slider as $data)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>
                                    <!-- position 0 for first and 1 for default -->
                                    @if($data->position==0)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="position" id="inlineRadio{{ $i }}" value="1" onclick="updatePosition({{ $data->id }}, 1)" checked>
                                        <label class="form-check-label" for="inlineRadio{{ $i }}">First</label>
                                    </div> <br>

                                    @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="position" id="inlineRadio{{ $i }}" value="0" onclick="updatePosition({{ $data->id }}, 0)">
                                        <label class="form-check-label" for="inlineRadio{{ $i }}">Default</label>
                                    </div>

                                    @endif
                                    <!-- position 0 for first and 1 for default -->
                                </td>
                                <td>
                                    <!-- status 1 for on and 0 for off  -->
                                    @if($data->status==1)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status{{ $i }}" id="inlineRadioOn{{ $i }}" checked>
                                        <label class="form-check-label" for="inlineRadioOn{{ $i }}">On</label>
                                    </div> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status{{ $i }}" id="inlineRadioOff{{ $i }}" value="0" onclick="updateStatus({{ $data->id }}, 0)">
                                        <label class="form-check-label" for="inlineRadioOff{{ $i }}">Off</label>
                                    </div>
                                    @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status{{ $i }}" id="inlineRadioOn{{ $i }}" value="1" onclick="updateStatus({{ $data->id }}, 1)">
                                        <label class="form-check-label" for="inlineRadioOn{{ $i }}">On</label>
                                    </div> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status{{ $i }}" id="inlineRadioOff{{ $i }}" checked>
                                        <label class="form-check-label" for="inlineRadioOff{{ $i }}">Off</label>
                                    </div>
                                    @endif
                                    <!-- status 1 for on and 0 for off  -->
                                </td>





                                <td><img src="{{ asset('images/' . $data->image) }}" alt="" style="height:50px;width:100px;"></td>
                                <td> {{$data->description}} </td>
                                <td>
                                    <form action="{{ route('sliders.destroy', $data->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" btn fa fa-trash text-danger show_confirmslide"></button>
                                        <a class=" btn fa fa-edit text-info" href="{{route('sliders.edit',$data->id)}}"></a>


                                    </form>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection