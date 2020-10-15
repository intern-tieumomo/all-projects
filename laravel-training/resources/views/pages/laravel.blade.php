@extends('layouts.master')

@section('content')
<h2><?php echo $str; ?></h2>
<h3>{{ $name }}</h3>
<h4>{!! $name !!}</h4>
{{-- Note --}}

{{-- @if($if != "")
	{{ $if }}
@else
	{{ "No if" }}
@endif

{{$if or "No if"}}
<br>
@for($i = 1; $i <= 10; $i++)
	{{ $i." " }}
@endfor --}}

<?php $name = ["P", "H", "Q"] ?>
{{-- @if(!empty($name))
	@foreach ($name as $value)
		{{ $value }}
	@endforeach
@else
	{{ "null" }}
@endif --}}

@forelse($name as $value)
	@continue($value == 'H')
	@break($value == 'P')
	{{ $value }}
@empty
	{{ "null" }}
@endforelse
@endsection