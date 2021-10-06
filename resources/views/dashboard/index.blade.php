
@extends('layouts.admin')
@section('search')
<!--<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round home_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>-->
@endsection
@section('content')
<div class="app-content container center-layout mt-2" style="overflow: inherit;">
    	<div class="content-wrapper ">
		<div class="row ">
			<div class="col-md-4">
			</div>
			<div class="col-md-4" style="text-align: center;padding-top: 10px;">
				<img src="https://db.expand.ps/images/intro.png">
			</div>
			<div class="col-md-4">
			</div>
		</div>
		<div class="row ">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				&nbsp;<input id="searchContent" name="searchContent" class="form-control round ac1 hideMob home_search ui-autocomplete-input" placeholder="بحث" style="text-align: center;" autocomplete="off">
			</div>
			<div class="col-md-4">
			</div>
		</div>
		<div class="row">
		    <div class="col-sm-12">
		        &nbsp;
		    </div>
		</div>
				
		<div class="row " style="text-align: center;padding-top: 70px;">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<form id="menuFavorit">
			    				</form>
			</div>
			<div class="col-md-2">
			</div>
		</div>
	</div>
	</div>

    @stop
