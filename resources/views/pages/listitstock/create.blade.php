{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

<div class="card">
 <div class="card-body">

			<div class="row">
				<div class="col-xl-3"></div>
				<div class="col-xl-7">
    

    PERHATIAN
FILE EXCEL HARUS BEREKSTENSI .XLS
HANYA ADA SATU SHEET DIDALAM SATU FILE EXCEL
BARIS PALING AWAL DIISIKAN DENGAN NAMA KOLOM
DOWNLOAD FORMAT XLS

    <div class="form-group row">
    <a href="{{URL::to('/')}}/file/example.png" target="_blank">
     <button class="btn"><i class="fa fa-download"></i> Download File</button>
 </a>
        </div>
                
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Pilih File:</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="file" name="file"  class="form-control" />
            </div>
        </div>
					<!--end::Input-->
					<!--begin::Input-->
            		<!--end::Input-->                    
				</div>
				<div class="col-xl-3"></div>
			</div>
		</div>
		<!--begin::Actions-->
		<div class="card-footer">
			<div class="row">
				<div class="col-xl-3"></div>
				<div class="col-xl-6">
                <input type="submit" name="send" class="btn btn-info" value="import" />
					<button type="reset" class="btn btn-clean font-weight-bold">Cancel</button>
				</div>
				<div class="col-xl-3"></div>
			</div>
		</div>
        </div>
		<!--end::Actions-->
	</form>

@endsection
