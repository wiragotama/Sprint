@extends('admin.adminLayout')
@section('content')
	 <h2>Files List</h2>     
    @if (!$files->count())
    @else
        <div class="filesList">
            <ul>
                @foreach( $files as $file )
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
                        {{$file->created_at}}
                    </li>
                    <li> 
                        {{$file->updated_at}}
                    </li>
                    <li> 
                        {{$file->status}}
                    </li>

                @endforeach
            </ul>
        </div>
    @endif
@endsection