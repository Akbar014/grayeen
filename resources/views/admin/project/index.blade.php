@extends('admin.master')
@section('title') Projects Add @endsection
@section('project') active show-sub @endsection
@section('projects.list') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">GreyScape</a>
        <a class="breadcrumb-item" href="{{ url('/products') }}">Project</a>
        <span class="breadcrumb-item active">All Projects</span>
    </nav>
    <div class="sl-pagebody">
        @if(Session::get('message'))
        <p class="text-success pl-1">{{ Session::get('message') }}</p>
        @endif
        <div class="row row-sm">
            <div class="col-sm-12 col-xl-12">
                @if ($project)
                    @foreach($project as $data)
                    <div class="card pd-20 mt-2" style="background: #0f2027;background: -webkit-linear-gradient(to right, #0f2027, #203a43, #2c5364);
                            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">{{$data->ptitle}}</h6>
                            <span href="#" class="tx-white-8 hover-white">{{$data->status}}</span>
                            <!-- <span href="#" class="tx-white-8 hover-white">{{$data->status}}</span> -->
                            <!-- <span href="#" class="tx-white-8 hover-white">{{$data->category->cname ?? 'Default'}}</span> -->
                        </div>
                        <!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="fa fa-sellsy" style="color: white; font-size: 50px"></i>
                            <!-- <h3 class="mg-b-0 tx-white tx-lato tx-bold">fdghdfgdf</h3> -->
                           <button> <a href="{{route('projects.show',$data->id)}}"class=" btn icon ion-document-text text-success "></a></button>
                               <button ><a class=" btn fa fa-edit text-info " href="{{route('projects.edit',$data->id)}}"> </a></button>
                                    <form action="{{ route('projects.destroy', $data->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class=" btn fa fa-trash text-danger show_confirmslide"> </button>
                                    </form>

                               
                            <!-- <span href="#" class="tx-white-8 hover-white">{{$data->status}}</span> -->
    
                        </div>
                        <h6>{{$data->pclient}}</h6>
                        @if ($data->priority== 3)
                            <h6>First </h6>
                        @elseif($data->priority==2)
                            <h6>Second</h6>
                        @elseif($data->priority==1)
                            <h6>Third</h6>
                        @else
                            <h6>Default</h6>
                        @endif
                    </div>
                    @endforeach
                @endif
                <!-- card -->
            </div>

        </div>
        <!-- row -->
    </div>

</div>


@endsection