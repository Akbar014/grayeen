@extends('admin.master')
@section('title') Category Add @endsection
<!-- @section('category') active show-sub @endsection -->
@section('category') active @endsection


@section('content')
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
            <!-- <a class="breadcrumb-item" href="{{ url('/products') }}">Project</a> -->
            <span class="breadcrumb-item active">Category List</span>
        </nav>
    <div class="row">
        <div class="sl-pagebody col-md-6">
                <div class="card pd-20 pd-sm-40">
                    @if(Session::get('message'))
                        <p class="text-success pl-1">{{ Session::get('message') }}</p>
                    @endif
                    <form action="{{ url('/categories') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="cname" placeholder="Enter Category Name" required />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>    
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Category Image : <span class="tx-danger"></span></label>
                                            <input class="form-control" type="file" name="image" />
                                            @error('model')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-layout-footer mt-3">
                                <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Save </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
        <div class=" sl-pagebody col-md-6">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('delete'))
                    <p class="text-success pl-1">{{ Session::get('delete') }}</p>
                @endif
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Image </th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($categories as $data)
                        <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$data->cname}}</td>
                        <td><img src="{{ asset('images/' . $data->image) }}" alt="" style="height:50px;width:100px;"></td>
                        <td>
                            <form action="{{ route('categories.destroy', $data->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                            <button type="submit" class=" btn fa fa-trash text-danger show_confirmcat" ></button>
                            <a href="{{route('categories.edit',$data->id)}}" class="fa fa-edit"></a>
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
@endsection
