@extends('customer.customerLayout')
@section('content')
	 <h2>Files List</h2>     
    @if (!$files->count())
    @else
        <div class="filesList">
            <ul>
                @foreach( $files as $file )
                    @if($file->status=='In Queue')
                        <li> 
                            {{$file->filename}}
                        </li>
                        <li> 
                            {{$file->uploaderName}}
                        </li>
                        <li> 
                            {{$file->agentName}}
                        </li>
                        <li> 
                            {{$file->status}}
                        </li>
                        <li> 
                            {{$file->deliveryAddress}}
                        </li>
                        <li> 
                            {{$file->harga}}
                        </li>
                        <li> 
                            {{$file->created_at}}
                        </li>
                        <li> 
                            {{$file->updated_at}}
                        </li>
                        <form id="cancelForm" onsubmit="#" action="/cancelOrder" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $file->id }}">
                            <div class="p-container">
                                    <input type="submit" onclick="#" value="Cancel" >
                                    <div class="clear"> </div>
                            </div>
                        </form>
                    @endif
                @endforeach

                @foreach( $files as $file )
                    @if($file->status!='In Queue')
                        <li> 
                            {{$file->id}}
                        </li>
                        <li> 
                            {{$file->filename}}
                        </li>
                        <li> 
                            {{$file->uploaderName}}
                        </li>
                        <li> 
                            {{$file->agentName}}
                        </li>
                        <li> 
                            {{$file->status}}
                        </li>
                        <li> 
                            {{$file->deliveryAddress}}
                        </li>
                        <li> 
                            {{$file->harga}}
                        </li>
                        <li> 
                            {{$file->created_at}}
                        </li>
                        <li> 
                            {{$file->updated_at}}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif
@endsection