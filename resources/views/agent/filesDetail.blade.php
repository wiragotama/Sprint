@extends('agent.agentLayout')
@section('content')
     <!-- Home Section -->
    <section id="home">
        <div class="container">
            @if ($message!=null)
                <div class="col-lg-12 text-center" style="border: medium solid #FF9900; background-color:#FF9900">
                    <h5 class="section-heading" style="color:black"> {{$message}} </h5>
                </div>
            @endif
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color:white">Print Queue</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <table class="table table-bordered" style="width:100%">
                    <tr>
                        <b><td style="color:white"><b>ID</b></td>
                        <b><td style="color:white"><b>File Name</b></td>      
                        <b><td style="color:white"><b>Uploader Name</b></td>
                        <b><td style="color:white"><b>Agent Name</b></td>
                        <b><td style="color:white"><b>Created Time</b></td>      
                        <b><td style="color:white"><b>Delivery Address</b></td>
                        <b><td style="color:white"><b>Total Harga</b></td>      
                        <b><td style="color:white"><b>Download</b></td>
                        <b><td style="color:white"><b>Status</b></td>
                        <b><td style="color:white"><b>Update</b></td>
                    </tr>
                    @foreach( $files as $file )
                    @if($file->status=='In Queue')
                        <tr>
                        <form id="updateForm" onsubmit="#" action="/updateQueue" method="POST">
                            <td style="color:white">{{$file->id}}</td>
                            <td style="color:white">{{$file->filename}}</td>        
                            <td style="color:white">{{$file->uploaderName}}</td>
                            <td style="color:white">{{$file->agentName}}</td>
                            <td style="color:white">{{$file->created_at}}</td>        
                            <td style="color:white">{{$file->deliveryAddress}}</td>
                            <td style="color:white">{{$file->harga}}</td>        
                            @if($file->filePath!='NA')
                            <td style="color:white"> <a href="./getFile?id={{$file->id}}"> Link </a></td>
                            @else
                            <td style="color:white"> {{$file->filePath}} </td>
                            @endif
                            <td style="color:white"> {{$file->status}} </td>
                            <td>
                                
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $file->id }}">
                            <div class="p-container">
                                <input type="submit" onclick="#" value="Print" >
                            </div>
                            </td>
                        </form>
                        </tr>
                      @endif
                    @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color:white">Printed - On Delivery</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <table class="table table-bordered" style="width:100%">
                    <tr>
                        <b><td style="color:white"><b>ID</b></td>
                        <b><td style="color:white"><b>File Name</b></td>      
                        <b><td style="color:white"><b>Uploader Name</b></td>
                        <b><td style="color:white"><b>Agent Name</b></td>
                        <b><td style="color:white"><b>Created Time</b></td>      
                        <b><td style="color:white"><b>Last Update</b></td>
                        <b><td style="color:white"><b>Delivery Address</b></td>
                        <b><td style="color:white"><b>Total Harga</b></td>      
                        <b><td style="color:white"><b>Status</b></td>
                        <b><td style="color:white"><b>Update</b></td>
                    </tr>
                    @foreach( $files as $file )
                    @if($file->status=='Printed')
                        <form id="updateForm" onsubmit="#" action="/updatePrinted" method="POST">
                            <td style="color:white">{{$file->id}}</td>
                            <td style="color:white">{{$file->filename}}</td>        
                            <td style="color:white">{{$file->uploaderName}}</td>
                            <td style="color:white">{{$file->agentName}}</td>
                            <td style="color:white">{{$file->created_at}}</td>    
                            <td style="color:white">{{$file->updated_at}}</td> 
                            <td style="color:white">{{$file->deliveryAddress}}</td>
                            <td style="color:white">{{$file->harga}}</td>        
                            <td style="color:white">{{$file->status}}</td>
                            <td>
                                
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $file->id }}">
                            <div class="p-container">
                                <input type="submit" onclick="#" value="Delivered" >
                            </div>
                            </td>
                        </form>
                        </tr>
                      @endif
                    @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
            </div>
        </div>

        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color:white">Printing History</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <table class="table table-bordered" style="width:100%">
                    <tr>
                        <b><td style="color:white"><b>ID</b></td>
                        <b><td style="color:white"><b>File Name</b></td>      
                        <b><td style="color:white"><b>Uploader Name</b></td>
                        <b><td style="color:white"><b>Agent Name</b></td>
                        <b><td style="color:white"><b>Created Time</b></td>      
                        <b><td style="color:white"><b>Last Update</b></td>
                        <b><td style="color:white"><b>Delivery Address</b></td>
                        <b><td style="color:white"><b>Total Harga</b></td>      
                        <b><td style="color:white"><b>Status</b></td>
                    </tr>
                    @foreach( $files as $file )
                    @if($file->status=='Delivered')
                          <tr>
                            <td style="color:white">{{$file->id}}</td>
                            <td style="color:white">{{$file->filename}}</td>        
                            <td style="color:white">{{$file->uploaderName}}</td>
                            <td style="color:white">{{$file->agentName}}</td>
                            <td style="color:white">{{$file->created_at}}</td>        
                            <td style="color:white">{{$file->updated_at}}</td>
                            <td style="color:white">{{$file->deliveryAddress}}</td>
                            <td style="color:white">{{$file->harga}}</td>        
                            <td style="color:white">{{$file->status}}</td>
                          </tr>
                      @endif
                    @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
            </div>
        </div>
    </section>
@endsection